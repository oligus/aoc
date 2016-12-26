<?php

namespace AOC\Aoc2015\Day2;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function calculatePaperUsage(string $input) : int
    {
        $values = preg_split('/x/', $input);

        $length = $values[0];
        $width = $values[1];
        $height = $values[2];

        $area = $this->calculateArea($length, $width, $height);

        sort($values);
        $slack = $values[0] * $values[1];

        return $area + $slack;
    }

    public function calculateRibbonUsage(string $input) : int
    {
        $values = preg_split('/x/', $input);
        sort($values);

        $ribbon = $values[0] + $values[0] + $values[1] + $values[1];
        $bow = $values[0] * $values[1] * $values[2];

        return $ribbon + $bow;
    }

    public function calculateArea(int $length, int $width, int $height) : int
    {
        return 2 * $length * $width + 2 * $width * $height + 2 * $height * $length;
    }


    public function run($part = 1)
    {

        $count = 0;

        if($part === 1) {
            $this->readInputLines(dirname(__FILE__), function($line) use (&$count) {
                $sum = $this->calculatePaperUsage($line);
                $count = $count + $sum;
            });
        } else {
            $this->readInputLines(dirname(__FILE__), function($line) use (&$count) {
                $sum = $this->calculateRibbonUsage($line);
                $count = $count + $sum;
            });
        }

        return $count;

    }
}