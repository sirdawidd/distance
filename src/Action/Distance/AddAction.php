<?php declare(strict_types=1);

namespace App\Action\Distance;

use App\Domain\Entity\Distance\DistanceEntity;
use App\Domain\Service\Distance\AddService;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AddAction
{
    /** @var AddService */
    private $addService;

    public function __construct(Container $container)
    {
        $this->addService = $container->get('addService');
    }

    public function __invoke(Request $request, Response $response, $args): Response
    {
        $distance = $this->addService->add(
            $args['unit'],
            new DistanceEntity($args['distance1'], $args['unit1']),
            new DistanceEntity($args['distance2'], $args['unit2'])
        );

        return $response->withJson(['distance' => $distance, 'unit' => $args['unit']]);
    }
}