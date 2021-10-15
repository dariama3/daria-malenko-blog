<?php
declare(strict_types=1);

namespace Dariam\Blog;

use Dariam\Blog\Controller\Category;
use Dariam\Blog\Controller\Post;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
//        require_once '../src/data.php';
//
//        if ($data = blogGetCategoryByUrl($requestUrl)) {
//            return Category::class;
//        }
//
//        if ($data = blogGetPostByUrl($requestUrl)) {
//            return Post::class;
//        }

        return '';
    }
}
