<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Category\Entity as CategoryEntity;
use Dariam\Blog\Model\Category\Repository as CategoryRepository;
use Dariam\Blog\Model\Post\Repository as PostRepository;

class CategoryList extends \Dariam\Framework\View\Block
{
    private \Dariam\Blog\Model\Category\Repository $categoryRepository;

    protected string $template = '../src/Dariam/Blog/view/category_list.php';

    /**
     * @param \Dariam\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Dariam\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryEntity[]
     */
    public function getCategories(): array
    {
        $select = $this->categoryRepository->select()
            ->distinct(true)
            ->fields(CategoryRepository::TABLE . '.*', true)
            ->innerJoin(PostRepository::TABLE_CATEGORY_POST, '', 'USING(`category_id`)');

        return $this->categoryRepository->fetchEntities($select);
    }
}
