<?php declare(strict_types=1);

namespace App\Domain\Service\Distance;

use App\Domain\Entity\Distance\DistanceEntity;

class AddService
{
    public function add(string $unit, DistanceEntity $distance1, DistanceEntity $distance2): float
    {
        if ($distance1->getUnit() !== $unit) {
            $distance1->convertTo($unit);
        }
        if ($distance2->getUnit() !== $unit) {
            $distance2->convertTo($unit);
        }
        return $distance2->getDistance() + $distance2->getDistance();
    }
}