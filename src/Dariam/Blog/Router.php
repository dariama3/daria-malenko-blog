<?php
declare(strict_types=1);

namespace Dariam\Blog;

use Dariam\Blog\Controller\Category;
use Dariam\Blog\Controller\Post;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Blog\Model\Category\Repository $categoryRepository;

    private \Dariam\Blog\Model\Post\Repository $postRepository;

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Blog\Model\Category\Repository $categoryRepository
     * @param \Dariam\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Blog\Model\Category\Repository $categoryRepository,
        \Dariam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            $this->request->setParameter('posts', $this->postRepository->getByIds($category->getPostsIds()));
            return Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return Post::class;
        }

        return '';
    }
}
