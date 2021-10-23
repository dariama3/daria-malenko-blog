<?php
declare(strict_types=1);

namespace Dariam\ContactUs\Controller;

use Dariam\Framework\Http\ControllerInterface;
use Dariam\Framework\Http\Response\Raw;
use Dariam\Framework\View\Block;

class Form implements ControllerInterface
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
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Dariam/ContactUs/view/contact-us.php'
        );
    }
}