<?php declare(strict_types=1);

use App\Action\Distance\AddAction;
use Slim\App;

return function (App $app) {
    $app->get(
        '/distance/{unit:[Metres|Yards]+}/add/{distance1:[0-9]+}/{unit1:[Metres|Yards]+}/{distance2:[0-9]+}/{unit2:[Metres|Yards]+}',
        AddAction::class
    );
};