<?php

namespace Tnhnclskn\OkeySolver;

class Board
{
    private array $tiles;

    public function __construct(array $tiles)
    {
        $this->tiles = $tiles;
    }

    public static function generate()
    {
        $tiles = [];

        for ($i = 0; $i < 22; $i++) {
            do {
                $newTile = self::generateTile();
            } while (in_array($newTile, $tiles));
            $tiles[] = $newTile;
        }

        return new Board($tiles);
    }

    public static function generateTile()
    {
        return new Tile(rand(1, 13), Tile::COLORS[rand(0, 3)]);
    }

    public function dump()
    {
        return implode(', ', array_map(function ($tile) {
            return (string) $tile;
        }, $this->tiles));
    }

    public function copy()
    {
        return new Board($this->tiles);
    }

    public function sortByColor()
    {
        usort($this->tiles, function ($a, $b) {
            return $a->getNumber() <=> $b->getNumber();
        });
        usort($this->tiles, function ($a, $b) {
            return $a->getColor() <=> $b->getColor();
        });
        return $this;
    }

    public function sortByNumber()
    {
        usort($this->tiles, function ($a, $b) {
            return $a->getColor() <=> $b->getColor();
        });
        usort($this->tiles, function ($a, $b) {
            return $a->getNumber() <=> $b->getNumber();
        });
        return $this;
    }

    public function parseSeries()
    {
        $tileCount = count($this->tiles);

        $allSeries = [];
        for ($seriesLimit = $tileCount; $seriesLimit > 2; $seriesLimit--) {
            for ($seriesStart = 0; $seriesStart < $tileCount - $seriesLimit; $seriesStart++) {
                // var_dump([$seriesLimit, $seriesStart]);
                $series = array_slice($this->tiles, $seriesStart, $seriesLimit);
                var_dump($series);
                // if ($this->isSeries($series)) {
                //     $allSeries[] = $series;
                // }
            }
        }

        return $allSeries;
    }

    public function takeSeries($start, $limit)
    {
        return new Series($this, array_slice($this->tiles, $start, $limit));
    }
}
