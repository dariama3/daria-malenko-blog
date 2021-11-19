<?php
declare(strict_types=1);

namespace Dariam\Blog\Model\Category;

class Repository extends \Dariam\Framework\Database\AbstractRepository
{
    public const TABLE = 'category';

    public const ENTITY = Entity::class;

    /**
     * @param string $url
     * @return Entity|object|null
     */
    public function getByUrl(string $url): ?Entity
    {
        return $this->fetchOne(
            $this->select()->where('url = :url'),
            [
                ':url' => $url
            ]
        );
    }
}
