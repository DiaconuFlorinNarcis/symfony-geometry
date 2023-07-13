<?php

namespace App\Geometry\Entity;

class GeometryEntity
{
    public function __construct(
        public string $type,
        public ?float $a = null,
        public ?float $b = null,
        public ?float $c = null,
        public ?float $r = null,
        public ?float $surface = null,
        public ?float $circumference = null,
    )
    {
    }

    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;
        return $this;
    }

    public function setCircumference(?float $circumference): self
    {
        $this->circumference = $circumference;
        return $this;
    }

    public function serialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'surface' => $this->surface,
            'circumference' => $this->circumference,
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'r' => $this->r,
        ]);
    }
}