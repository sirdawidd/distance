<?php declare(strict_types=1);

use App\Domain\Service\Distance\AddService;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    $container['addService'] = function ($c) {
        return new AddService();
    };
};