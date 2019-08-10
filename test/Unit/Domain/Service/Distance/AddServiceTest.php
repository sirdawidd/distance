<?php declare(strict_types=1);

namespace App\Test\Unit\Domain\Service\Distance;

use App\Domain\Entity\Distance\DistanceEntity;
use App\Domain\Service\Distance\AddService;
use PHPUnit\Framework\TestCase;

class AddServiceTest extends TestCase
{
    /** @var AddService */
    private $subject;

    protected function setUp()
    {
        $this->subject = new AddService();
    }

    public function testAddYards()
    {
        $this->assertEquals(
            2,
            $this->subject->add(
                'Yards',
                new DistanceEntity(1, 'Yards'),
                new DistanceEntity(1, 'Yards')
            )
        );
    }

    public function testAddMetres()
    {
        $this->assertEquals(
            2,
            $this->subject->add(
                'Metres',
                new DistanceEntity(1, 'Metres'),
                new DistanceEntity(1, 'Metres')
            )
        );
    }

    public function testAddMixedTypes()
    {
        $this->assertEquals(
            1.82,
            $this->subject->add(
                'Metres',
                new DistanceEntity(1, 'Metres'),
                new DistanceEntity(1, 'Yards')
            )
        );
    }

    public function testNoTGettingExceptionOnEmptyDistance()
    {
        $this->assertEmpty(
            $this->subject->add(
                'Yards',
                $this->createMock(DistanceEntity::class),
                $this->createMock(DistanceEntity::class),
                )
        );
    }
}