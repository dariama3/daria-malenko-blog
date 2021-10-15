<?php
declare(strict_types=1);

namespace Dariam\Blog;

use Dariam\Blog\Controller\Category;
use Dariam\Blog\Controller\Post;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    private \Dariam\Framework\Http\Request $request;

    /**
     * @param \Dariam\Framework\Http\Request $request
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetCategoryByUrl($requestUrl)) {
            $this->request->setParameter('category', $data);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';
    }
}
