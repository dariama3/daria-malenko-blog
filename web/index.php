<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';

$requestDispatcher = new \Dariam\Framework\Http\RequestDispatcher([
    new \Dariam\Cms\Router(),
    new \Dariam\Catalog\Router(),
    new \Dariam\ContactUs\Router(),
]);
$requestDispatcher->dispatch();

exit;

switch ($requestUri) {
    default:
        break;
}
