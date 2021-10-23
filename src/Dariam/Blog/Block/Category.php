<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Category\Entity as CategoryEntity;
use Dariam\Blog\Model\Post\Entity as PostEntity;

class Category extends \Dariam\Framework\View\Block
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Dariam/Blog/view/category.php';

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
    }

    /**
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
     * @return PostEntity[]
     */
    public function getCategoryPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getPostsIds()
        );
    }
}
