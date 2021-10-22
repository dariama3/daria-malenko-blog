<?php
declare(strict_types=1);

namespace Dariam\Blog;

use Dariam\Blog\Controller\Category;
use Dariam\Blog\Controller\Post;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Blog\Model\Category\Repository $categoryRepository;

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';
    }
}
