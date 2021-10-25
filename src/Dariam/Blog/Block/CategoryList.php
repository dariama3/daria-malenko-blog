<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Category\Entity as CategoryEntity;

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
        return $this->categoryRepository->getList();
    }
}
