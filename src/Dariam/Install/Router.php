<?php
declare(strict_types=1);

namespace Dariam\Install;

use Dariam\Install\Controller\Index;

class Router implements \Dariam\Framework\Http\RouterInterface
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

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return Index::class;
        }

        return '';
    }
}
