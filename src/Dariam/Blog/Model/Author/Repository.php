<?php
declare(strict_types=1);

namespace Dariam\Blog\Model\Author;

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
            1 => $this->makeEntity()->setAuthorId(1)
                ->setName('Robert Downey Jr.')
                ->setUrl('robert-downey-jr'),
            2 => $this->makeEntity()->setAuthorId(2)
                ->setName('Chris Evans')
                ->setUrl('chris-evans'),
            3 => $this->makeEntity()->setAuthorId(3)
                ->setName('Scarlett Johansson')
                ->setUrl('scarlett-johansson'),
            4 => $this->makeEntity()->setAuthorId(4)
                ->setName('Chris Hemsworth')
                ->setUrl('chris-hemsworth'),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $authors = array_filter(
            $this->getList(),
            static function ($author) use ($url) {
                return $author->getUrl() === $url;
            }
        );

        return array_pop($authors);
    }

    /**
     * @param int $authorId
     * @return ?Entity
     */
    public function getById(int $authorId): ?Entity
    {
        $authors = array_filter(
            $this->getList(),
            static function ($author) use ($authorId) {
                return $author->getAuthorId() === $authorId;
            }
        );

        return array_pop($authors);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}