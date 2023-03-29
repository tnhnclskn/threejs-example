<?php

namespace Tnhnclskn\OkeySolver;

class Tile
{
    public const COLORS = ['RED', 'BLUE', 'GREEN', 'BLACK'];

    private int $number;
    private string $color;

    public function __construct(int $number, string $color)
    {
        $this->number = $number;
        $this->color = $color;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function __toString(): string
    {
        return $this->color . '-' . $this->number;
    }
}
