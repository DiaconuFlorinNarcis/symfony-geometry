<?php

namespace App\Geometry\Service;

use App\Geometry\Abstract\AbstractGeometry;
use App\Geometry\Entity\GeometryEntity;
use App\Geometry\Interface\GeometryInterface;

class TriangleCalculatorService extends AbstractGeometry
{

    public function __construct(GeometryInterface $dto)
    {
        parent::__construct($dto);

        $this->geometryEntity = new GeometryEntity(
            $dto->type,
            $dto->getA(),
            $dto->getB(),
            $dto->getC(),
        );

        $this->geometryEntity->setSurface($this->calculateSurface());
        $this->geometryEntity->setCircumference($this->calculateDiameter());
    }

    public function calculateSurface(): float
    {
        return ($this->dto->getA() + $this->dto->getB() + $this->dto->getC()) / 2;
    }

    public function calculateRadius(): float
    {
        $a = $this->dto->getA();
        $b = $this->dto->getB();
        $c = $this->dto->getC();

        $s = $this->calculateSurface();

        return ($a * $b * $c) / (4 * sqrt($s * ($s - $a) * ($s - $b) * ($s - $c)));
    }

    public function calculateDiameter(): float
    {
        return pi() * pow($this->calculateRadius(),2);
    }
}