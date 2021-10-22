<?php
declare(strict_types=1);

namespace Dariam\Blog\Model\Post;

class Repository
{
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
            1 => $this->makeEntity()->setPostId(1)
                ->setName('Post 1')
                ->setUrl('post-1')
                ->setContent('Post 1 Content')
                ->setAuthor('Robert Downey Jr.')
                ->setCreatedAt('2019.11.28'),
            2 => $this->makeEntity()->setPostId(2)
                ->setName('Post 2')
                ->setUrl('post-2')
                ->setContent('Post 2 Content')
                ->setAuthor('Chris Evans')
                ->setCreatedAt('2019.12.01'),
            3 => $this->makeEntity()->setPostId(3)
                ->setName('Post 3')
                ->setUrl('post-3')
                ->setContent('Post 3 Content')
                ->setAuthor('Scarlett Johansson')
                ->setCreatedAt('2019.12.02'),
            4 => $this->makeEntity()->setPostId(4)
                ->setName('Post 4')
                ->setUrl('post-4')
                ->setContent('Post 4 Content')
                ->setAuthor('Zoe Saldana')
                ->setCreatedAt('2020.02.02'),
            5 => $this->makeEntity()->setPostId(5)
                ->setName('Post 5')
                ->setUrl('post-5')
                ->setContent('Post 5 Content')
                ->setAuthor('Chris Pratt')
                ->setCreatedAt('2020.10.02'),
            6 => $this->makeEntity()->setPostId(6)
                ->setName('Post 6')
                ->setUrl('post-6')
                ->setContent('Post 6 Content')
                ->setAuthor('Chris Hemsworth')
                ->setCreatedAt('2020.12.04')
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIds
     * @return Entity[]
     */
    public function getByIds(array $postIds)
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}