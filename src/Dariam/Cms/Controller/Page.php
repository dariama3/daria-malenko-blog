<?php
declare(strict_types=1);

namespace Dariam\Cms\Controller;

class Page implements \Dariam\Framework\Http\ControllerInterface
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
        $page = $this->request->getParameter('page') . '.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
