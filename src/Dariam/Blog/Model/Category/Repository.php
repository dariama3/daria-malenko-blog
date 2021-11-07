<?php
declare(strict_types=1);

namespace Dariam\Blog\Model\Category;

class Repository
{
    public const TABLE = 'category';

    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Avengers')
                ->setUrl('avengers')
                ->setPostsIds([1, 2, 3]),
            2 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Star Wars')
                ->setUrl('star-wars')
                ->setPostsIds([3, 4, 5]),
            3 => $this->makeEntity()
                ->setCategoryId(1)
                ->setName('Pokemon')
                ->setUrl('pokemon')
                ->setPostsIds([2, 4, 6]),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $categories = array_filter(
            $this->getList(),
            static function ($category) use ($url) {
                return $category->getUrl() === $url;
            }
        );

        return array_pop($categories);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
