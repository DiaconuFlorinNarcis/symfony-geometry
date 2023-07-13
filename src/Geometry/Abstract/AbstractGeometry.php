<?php

namespace App\Geometry\Abstract;

use App\Geometry\Entity\GeometryEntity;
use App\Geometry\Interface\GeometryInterface;

abstract class AbstractGeometry
{
    protected GeometryEntity $geometryEntity;
    protected GeometryInterface $dto;

    abstract public function calculateSurface(): float;
    abstract public function calculateDiameter(): float;

    public function __construct(GeometryInterface $dto)
    {
        $this->dto = $dto;
    }

    public function getDetails(): array
    {
        return $this->geometryEntity->serialize();
    }
}