<?php

namespace App\Geometry\Service;

use App\Geometry\Abstract\AbstractGeometry;
use App\Geometry\Entity\GeometryEntity;
use App\Geometry\Interface\GeometryInterface;

class CircleCalculatorService extends AbstractGeometry
{
    public function __construct(GeometryInterface $dto)
    {
        parent::__construct($dto);

        $this->geometryEntity = new GeometryEntity(
            $dto->type,
            $dto->getR()
        );

        $this->geometryEntity->setSurface($this->calculateSurface());
        $this->geometryEntity->setCircumference($this->calculateDiameter());
    }

    public function calculateSurface(): float
    {
        return pi() * pow($this->dto->getR(), 2);
    }

    public function calculateDiameter(): float
    {
        return pi() * ($this->dto->getR() * 2);
    }
}