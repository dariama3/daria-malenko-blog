<?php
declare(strict_types=1);

namespace Dariam\Install\Command;

use Dariam\Blog\Model\Author\Repository as AuthorRepository;
use Dariam\Blog\Model\Category\Repository as CategoryRepository;
use Dariam\Blog\Model\Post\Repository as PostRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateData extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'install:generate-data';

    private \Dariam\Framework\Database\Adapter\AdapterInterface $adapter;

    private OutputInterface $output;

    private int $numberOfPosts = 0;

    private const AUTHOR_COUNT = 20;
    private const STATISTIC_DAYS = 2;

    /**
     * @param \Dariam\Framework\Database\Adapter\AdapterInterface $adapter
     * @param string|null $name
     */
    public function __construct(
        \Dariam\Framework\Database\Adapter\AdapterInterface $adapter,
        string $name = null
    ) {
        parent::__construct($name);
        $this->adapter = $adapter;
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setDescription('Generate demo data for blog testing');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->output = $output;
        $this->generateData();
        $output->writeln('Completed!');

        return self::SUCCESS;
    }

    /**
     * Generate test data.
     *
     * @return void
     */
    private function generateData(): void
    {
        $this->profile([$this, 'truncateTables']);
        $this->profile([$this, 'generateAuthors']);
        $this->profile([$this, 'generatePosts']);
        $this->profile([$this, 'generateCategories']);
        $this->profile([$this, 'generateCategoryPosts']);
        $this->profile([$this, 'generateDailyStatistics']);
    }

    /**
     * Truncate (empty) tables before inserting new data.
     *
     * @return void
     */
    private function truncateTables(): void
    {
        $tables = [
            AuthorRepository::TABLE,
            CategoryRepository::TABLE,
            PostRepository::TABLE,
            PostRepository::TABLE_CATEGORY_POST,
            PostRepository::TABLE_DAILY_STATISTICS,
        ];
        $connection = $this->adapter->getConnection();
        $connection->query('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table) {
            $connection->query("TRUNCATE TABLE `$table`");
            $this->output->writeln("Truncated table: $table");
        }

        $connection->query('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Insert authors.
     *
     * @return void
     */
    private function generateAuthors(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO author (`name`, `url`)
                VALUES (:name, :url);
            SQL);

        for ($i = 1; $i <= self::AUTHOR_COUNT; $i++) {
            $name = $this->getRandomName() . ' ' . $this->getRandomSecondName();

            $statement->bindValue(':name', $name);
            $statement->bindValue(':url', str_replace(' ', '-', strtolower($name)));
            $statement->execute();
        }
    }

    /**
     * Insert posts.
     *
     * @return void
     */
    private function generatePosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO post (`name`, `url`, `content`, `author_id`)
                VALUES (:name, :url, :content, :author_id);
            SQL);

        $postId = 1;

        for ($authorId = 1; $authorId <= self::AUTHOR_COUNT; $authorId++) {
            $numberOfPosts = random_int(5, 20);

            for ($i = 1; $i <= $numberOfPosts; $i++) {
                $name = "Post $postId";

                $statement->bindValue(':name', $name);
                $statement->bindValue(':url', str_replace(' ', '-', strtolower($name)));
                $statement->bindValue(':content', "$name content");
                $statement->bindValue(':author_id', $authorId, \PDO::PARAM_INT);
                $statement->execute();

                $postId++;
            }
        }

        $this->numberOfPosts = $postId - 1;
    }

    /**
     * Insert 10 categories.
     *
     * @return void
     */
    private function generateCategories(): void
    {
        $categories = [
            'Avengers',
            'Justice League',
            'Teen Titans',
            'Star Wars',
            'Pokemon',
            'Gothic',
            'Skyrim',
            'The Witcher',
            'Need For Speed',
            'Magento',
        ];
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category (`name`, `url`)
                VALUES (:name, :url);
            SQL);

        foreach ($categories as $category) {
            $statement->bindValue(':name', $category);
            $statement->bindValue(':url', str_replace(' ', '-', strtolower($category)));
            $statement->execute();
        }
    }

    /**
     * Insert category-post relations for 7 random categories.
     *
     * @return void
     */
    private function generateCategoryPosts(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO category_post (`post_id`, `category_id`)
                VALUES (:post_id, :category_id);
            SQL);
        // Get only 7 random categories of total 10
        $categoryIds = array_rand(array_flip(range(1, 10)), 7);

        for ($i = 1; $i <= $this->numberOfPosts; $i++) {
            $postCategories = (array) array_rand(array_flip($categoryIds), random_int(1, 3));

            foreach ($postCategories as $categoryId) {
                $statement->bindValue(':post_id', $i, \PDO::PARAM_INT);
                $statement->bindValue(':category_id', $categoryId, \PDO::PARAM_INT);
                $statement->execute();
            }
        }
    }

    /**
     * Insert posts daily statistic.
     *
     * @return void
     */
    private function generateDailyStatistics(): void
    {
        $statement = $this->adapter->getConnection()
            ->prepare(<<<SQL
                INSERT INTO `daily_statistics` (`post_id`, `date`, `views`)
                VALUES (:post_id, :date, :views);
            SQL);

        for ($day = self::STATISTIC_DAYS; $day >= 1; $day--) {
            $date = date('Y-m-d', strtotime("-$day days"));

            for ($postId = 1; $postId <= $this->numberOfPosts; $postId++) {
                $statement->bindValue(':post_id', $postId, \PDO::PARAM_INT);
                $statement->bindValue(':date', $date);
                $statement->bindValue(':views', random_int(0, 100), \PDO::PARAM_INT);
                $statement->execute();
            }
        }
    }

    /**
     * @return string
     */
    private function getRandomName(): string
    {
        static $randomNames = [
            'Robert',
            'Chris',
            'Scarlett',
            'Mark',
            'Jeremy',
            'Don',
            'Paul',
            'Benedict',
            'Chadwick',
            'Brie',
            'Tom',
            'Karen',
            'Cobie',
            'Stellan',
            'Samuel',
            'Gwyneth',
            'Elizabeth',
            'Sebastian',
        ];

        return $randomNames[array_rand($randomNames)];
    }

    /**
     * @return string
     */
    private function getRandomLastName(): string
    {
        static $randomLastNames = [
            'Downey Jr',
            'Evans',
            'Johansson',
            'Hemsworth',
            'Ruffalo',
            'Renner',
            'Cheadle',
            'Rudd',
            'Cumberbatch',
            'Boseman',
            'Larson',
            'Holland',
            'Gillan',
            'Hiddleston',
            'Smulders',
            'Skarsgard',
            'L Jackson',
            'Paltrow',
            'Olsen',
            'Stan',
        ];

        return $randomLastNames[array_rand($randomLastNames)];
    }

    /**
     * @param callable $callback
     * @return void
     */
    private function profile(callable $callback): void
    {
        $start = microtime(true);
        $callback();
        $totalTime = number_format(microtime(true) - $start, 4);
        $this->output->writeln("Executing <info>$callback[1]</info> took <info>$totalTime</info>");
    }
}