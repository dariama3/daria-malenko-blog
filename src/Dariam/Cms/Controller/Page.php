<?php
declare(strict_types=1);

namespace Dariam\Cms\Controller;

use Dariam\Framework\Http\Response\Raw;
use Dariam\Framework\View\Block;

class Page implements \Dariam\Framework\Http\ControllerInterface
{
    private \Dariam\Framework\Http\Request $request;

    private \Dariam\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Dariam\Framework\Http\Request $request
     * @param \Dariam\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Dariam\Framework\Http\Request $request,
        \Dariam\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Dariam/Cms/view/' . $this->request->getParameter('page') . '.php'
        );
    }
}
