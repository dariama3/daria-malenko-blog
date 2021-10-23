<?php
declare(strict_types=1);

namespace Dariam\Blog\Controller;

use Dariam\Framework\Http\ControllerInterface;

class Post implements ControllerInterface
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

    public function execute(): string
    {
        return (string) $this->renderer->setContent(\Dariam\Blog\Block\Post::class);
    }
}
