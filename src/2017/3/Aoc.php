<?php

namespace AOC\Aoc2017\Day3;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function renderMap($size = 5): array
    {
        $posX = (int) floor($size / 2);
        $posY = (int) floor($size / 2);
        $direction = 'right';
        $map = [];

        for($i = 1; $i < ($size * $size) + 1; $i++) {
            $map[$posY][$posX] = $i;

            switch($direction) {
                case 'right':
                    $posX++;
                    if(!isset($map[$posY - 1][$posX])) {
                        $direction = 'up';
                    }
                    break;

                case 'up':
                    $posY--;
                    if(!isset($map[$posY ][$posX -1])) {
                        $direction = 'left';
                    }
                    break;

                case 'left':
                    $posX--;
                    if(!isset($map[$posY + 1][$posX])) {
                        $direction = 'down';
                    }
                    break;

                case 'down':
                    $posY++;
                    if(!isset($map[$posY][$posX + 1])) {
                        $direction = 'right';
                    }
                    break;
            }
        }

        return $map;
    }

    public function getMapHighValue($size = 5, $highValue = 0)
    {
        $posX = (int) floor($size / 2);
        $posY = (int) floor($size / 2);
        $direction = 'right';
        $map = [];
        $value = 1;

        for($i = 1; $i < ($size * $size) + 1; $i++) {
            $map[$posY][$posX] = $value;
            if($value > $highValue) {
                return $value;
            }

            switch($direction) {
                case 'right':
                    $posX++;
                    if(!isset($map[$posY - 1][$posX])) {
                        $direction = 'up';
                    }

                    $value = $this->getSquareValues($map, [$posX, $posY]);
                    break;

                case 'up':
                    $posY--;
                    if(!isset($map[$posY ][$posX -1])) {
                        $direction = 'left';
                    }
                    $value = $this->getSquareValues($map, [$posX, $posY]);
                    break;

                case 'left':
                    $posX--;
                    if(!isset($map[$posY + 1][$posX])) {
                        $direction = 'down';
                    }
                    $value = $this->getSquareValues($map, [$posX, $posY]);
                    break;

                case 'down':
                    $posY++;
                    if(!isset($map[$posY][$posX + 1])) {
                        $direction = 'right';
                    }
                    $value = $this->getSquareValues($map, [$posX, $posY]);
                    break;
            }
        }

        return $map;
    }

    public function getSquareValues(array $map, array $vector)
    {
        $posX = $vector[0];
        $posY = $vector[1];

        $value = isset($map[$posY-1][$posX-1]) ? $map[$posY-1][$posX-1] : 0;
        $value += isset($map[$posY-1][$posX]) ? $map[$posY-1][$posX] : 0;
        $value += isset($map[$posY-1][$posX+1]) ? $map[$posY-1][$posX+1] : 0;

        $value += isset($map[$posY][$posX-1]) ? $map[$posY][$posX-1] : 0;
        $value += isset($map[$posY][$posX+1]) ? $map[$posY][$posX+1] : 0;

        $value += isset($map[$posY+1][$posX-1]) ? $map[$posY+1][$posX-1] : 0;
        $value += isset($map[$posY+1][$posX]) ? $map[$posY+1][$posX] : 0;
        $value += isset($map[$posY+1][$posX+1]) ? $map[$posY+1][$posX+1] : 0;

        return $value;
    }

    public function printMap($map)
    {
        echo "\n";
        for($i = 0; $i < count($map); $i++) {
            $row = isset($map[$i]) ? $map[$i] : [];

            for($j = 0; $j < count($row); $j++) {
                if(isset($row[$j])) {
                    printf("%-4s",   $row[$j]);

                } else {
                    echo ' -- ';
                }
            }

            echo "\n";
        }
    }

    public function getPosition(array $map, int $value): array
    {
        for($posY = 0; $posY < count($map); $posY++) {
            $row = $map[$posY];
            for($posX = 0; $posX < count($row); $posX++) {

                if($row[$posX] === $value) {
                    return [$posX, $posY];
                }
            }
        }

        return [];
    }

    public function getDistance($map, $value)
    {
        $posX = (int) floor(count($map) / 2);
        $posY = (int) floor(count($map) / 2);

        $vector1 = [$posX, $posY];
        $vector2 = $this->getPosition($map, $value);

        $sum = abs($vector1[0] - $vector2[0]) + abs($vector1[1] - $vector2[1]);

        return $sum;
    }

    public function run($part = 1)
    {
        if($part === 1) {
            $value = 368078;
            $size = ceil(sqrt($value));

            $map = $this->renderMap($size);
            $distance = $this->getDistance($map, $value);

            return $distance;
        } else {
            $value = 368078;
            $size = ceil(sqrt($value));

            $result = $this->getMapHighValue($size, $value);

            return $result;
        }
    }
}