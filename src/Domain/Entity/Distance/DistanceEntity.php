<?php declare(strict_types=1);

namespace App\Domain\Entity\Distance;

use \InvalidArgumentException;

class DistanceEntity
{
    /** @var int */
    private $distance;
    /** @var string */
    private $unit;

    public function __construct(int $distance, string $unit)
    {
        if (empty($unit)) {
            throw new InvalidArgumentException('Unit parameter should not be empty.');
        }
        $this->distance = $distance;
        $this->unit = $unit;
    }

    public function getDistance(): float
    {
        return round($this->distance, 2);
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function convertTo(string $unit): void
    {
        if ($unit === 'Yards') {
            $this->toYards();
        } elseif ($unit === 'Metres') {
            $this->toMetres();
        } else {
            throw new InvalidArgumentException(printf('Parameter %s is not supported.', $unit));
        }
    }

    private function toYards(): self
    {
        $this->distance = $this->distance * 1.094;

        return $this;
    }

    private function toMetres(): self
    {
        $this->distance = $this->distance / 1.094;

        return $this;
    }
}