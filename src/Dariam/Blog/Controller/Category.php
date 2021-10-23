<?php
declare(strict_types=1);

namespace Dariam\Blog\Controller;

use Dariam\Framework\Http\ControllerInterface;
use Dariam\Framework\Http\Response\Raw;

class Category implements ControllerInterface
{
    private \Dariam\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Dariam\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Dariam\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\Dariam\Blog\Block\Category::class);
    }
}
