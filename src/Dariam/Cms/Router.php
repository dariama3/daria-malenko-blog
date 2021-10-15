<?php
declare(strict_types=1);

namespace Dariam\Cms;

use Dariam\Cms\Controller\Page;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === '') {
            return Page::class;
        }

        return '';
    }
}
