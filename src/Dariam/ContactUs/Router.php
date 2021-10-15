<?php
declare(strict_types=1);

namespace Dariam\ContactUs;

use Dariam\ContactUs\Controller\Form;

class Router implements \Dariam\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return Form::class;
        }

        return '';
    }
}
