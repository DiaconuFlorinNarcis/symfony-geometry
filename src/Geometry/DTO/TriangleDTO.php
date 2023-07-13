<?php

namespace App\Geometry\DTO;

use App\Geometry\Interface\GeometryInterface;
use Symfony\Component\Validator\Constraints as Assert;

class TriangleDTO implements GeometryInterface
{
    const TYPE = 'Triangle';

    function __construct(
        float $a,
        float $b,
        float $c,
        public string $type = self::TYPE
    )
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Assert\Type(
        type: 'float',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private float $a;

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Assert\Type(
        type: 'float',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private float $b;

    #[Assert\NotBlank]
    #[Assert\Positive]
    #[Assert\Type(
        type: 'float',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    private float $c;

    public function getA(): string
    {
        return $this->a;
    }

    public function getB(): string
    {
        return $this->b;
    }

    public function getC(): string
    {
        return $this->c;
    }
}