<?php

namespace Tnhnclskn\OkeySolver;

class Series
{
    private Board $board;
    private array $tiles;

    public function __construct(Board $board, array $tiles)
    {
        $this->board = $board;
        $this->tiles = $tiles;
    }

    public function isSeries()
    {
        $firstNumber = null;
        $firstColor = null;
        $method = null;

        foreach ($this->tiles as $tile) {
            if (!$method && !$firstNumber && !$firstColor) {
                if (!$firstNumber) $firstNumber = $tile->getNumber();
                if (!$firstColor) $firstColor = $tile->getColor();
            } else if (!$method && $firstNumber && $firstColor) {
                if ($firstNumber === $tile->getNumber()) {
                    $method = 'number';
                } else if ($firstColor === $tile->getColor()) {
                    $method = 'color';
                } else {
                    return false;
                }
            } else if ($method === 'number' && $firstNumber !== $tile->getNumber()) {
                return false;
            } else if ($method === 'color' && $firstColor !== $tile->getColor()) {
                return false;
            }
        }
    }
}
