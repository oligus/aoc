<?php

namespace AOC\Aoc2017\Day5;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function jump($data, $position): array
    {
        $steps = $data[$position];
        $data[$position]++;
        $newPosition = $position + $steps;

        return [
            'data' => $data,
            'position' => $newPosition
        ];
    }

    public function jumpSecond($data, $position): array
    {
        $steps = $data[$position];

        if($data[$position] >= 3) {
            $data[$position]--;
        } else {
            $data[$position]++;
        }


        $newPosition = $position + $steps;

        return [
            'data' => $data,
            'position' => $newPosition
        ];
    }

    public function runMaze($data, $part2 = false)
    {
        $targetPosition = count($data);
        $position = 0;
        $steps = 0;

        while($position < $targetPosition) {

            if($data[$position] < -10) {
                echo $steps . '-' . $position . '-' . $data[$position] . "\n";
            }

            if($part2) {
                $result = $this->jumpSecond($data, $position);
            } else {
                $result = $this->jump($data, $position);
            }

            $data = $result['data'];
            $position = $result['position'];
            $steps++;
        }

        return $steps;
    }


    public function run($part = 1)
    {
        $input = $this->readInputFile(dirname(__FILE__));

        if($part === 1) {
            return $this->runMaze($input);
        } else {
            return $this->runMaze($input, true);
        }

    }
}