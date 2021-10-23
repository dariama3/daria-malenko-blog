<?php
declare(strict_types=1);

namespace Dariam\Blog\Block;

use Dariam\Blog\Model\Post\Entity as PostEntity;

class Post extends \Dariam\Framework\View\Block
{
    private \Dariam\Framework\Http\Request $request;

    protected string $template = '../src/Dariam/Blog/view/post.php';

    /**
     * @param \Dariam\Framework\Http\Request $request
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }
}
