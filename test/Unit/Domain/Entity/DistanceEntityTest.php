<?php declare(strict_types=1);

namespace App\Test\Unit\Domain\Entity;

use App\Domain\Entity\Distance\DistanceEntity;
use PHPUnit\Framework\TestCase;

class DistanceEntityTest extends TestCase
{

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unit parameter should not be empty.
     */
    public function testGetExceptionOnInvalidInputData()
    {
        new DistanceEntity(0,'');
    }

    public function testYardsToMetersConversion()
    {
        $distanceEntity = new DistanceEntity(1,'Yards');
        $distanceEntity->convertTo('Metres');
        $this->assertEquals(0.91, $distanceEntity->getDistance());
    }

    public function testMetresToYardsConversion()
    {
        $distanceEntity = new DistanceEntity(1,'Metres');
        $distanceEntity->convertTo('Yards');
        $this->assertEquals(1.09, $distanceEntity->getDistance());
    }
}