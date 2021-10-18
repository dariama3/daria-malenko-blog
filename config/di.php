<?php
declare(strict_types=1);

return [
    \Dariam\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Dariam\Cms\Router::class),
            \DI\get(\Dariam\Blog\Router::class),
            \DI\get(\Dariam\ContactUs\Router::class),
        ]
    )
];
