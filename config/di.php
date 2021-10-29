<?php
declare(strict_types=1);

use Dariam\Framework\Database\Adapter\MySQL;

return [
    \Dariam\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        MySQL::class
    ),
    MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySQL::DB_NAME     => 'dariam_blog',
            MySQL::DB_USER     => 'dariam_blog_user',
            MySQL::DB_PASSWORD => '45RNSEhr',
            MySQL::DB_HOST     => 'mysql',
            MySQL::DB_PORT     => '3306'
        ]
    ),
    \Dariam\Framework\Http\RequestDispatcher::class => DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Dariam\Cms\Router::class),
            \DI\get(\Dariam\Blog\Router::class),
            \DI\get(\Dariam\ContactUs\Router::class),
            \DI\get(\Dariam\Install\Router::class),
        ]
    )
];
