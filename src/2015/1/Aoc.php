<?php

namespace AOC\Aoc2015\Jan;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function calculateFloor(string $instruction) : int
    {
        $up = substr_count($instruction, '(');
        $down = substr_count($instruction, ')');
        $sum = $up - $down;

        return (int) $sum;
    }

    public function calculateBasementPosition(string $instruction)
    {
        $floor = 0;
        $i = 0;

        while($floor >= 0 && $i < strlen($instruction)) {
            if($instruction[$i] === '(') {
                $floor++;
            } elseif ( $instruction[$i] === ')') {
                $floor--;
            }
            $i++;
        }

        return $i;
    }

    public function run($part = 1)
    {
        $instructions = $this->readInput(dirname(__FILE__));
        
        if($part === 1) {
            return $this->calculateFloor($instructions);
        }

        return $this->calculateBasementPosition($instructions);

    }
}