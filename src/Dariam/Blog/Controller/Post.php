<?php
declare(strict_types=1);

namespace Dariam\Blog\Controller;

use Dariam\Framework\Http\ControllerInterface;

class Post implements ControllerInterface
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

    public function execute(): string
    {
        $data = $this->request->getParameter('post');
        $page = 'post.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
