<?php
declare(strict_types=1);

namespace Dariam\Framework\View;

use Dariam\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private \Dariam\Framework\View\Renderer $renderer;

    /**
     * @param \Dariam\Framework\View\Renderer $renderer
     */
    public function __construct(
        \Dariam\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }
}
