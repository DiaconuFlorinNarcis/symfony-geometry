<?php

namespace App\Geometry\DTO;

use App\Geometry\Interface\GeometryInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CircleDTO implements GeometryInterface
{
    const TYPE = 'Circle';

    function __construct(float $r, public string $type = self::TYPE)
    {
        $this->r = $r;
    }

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Assert\Type(
        type: 'float',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private float $r;

    public function getR(): string
    {
        return $this->r;
    }
}