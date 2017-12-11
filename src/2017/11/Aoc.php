<?php

namespace AOC\Aoc2017\Day11;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function process($steps, $furthest = false)
    {
         $directions = [
            'n' =>  [1,  0, -1],
            'ne' => [1, -1,  0],
            'nw' => [0,  1, -1],
            's' =>  [-1, 0,  1],
            'se' => [0, -1,  1],
            'sw' => [-1, 1,  0],
        ];

        $x = $y = $z = $furthestDistance = 0;

        foreach($steps as $step) {
            $x = $x + $directions[$step][0];
            $y = $y + $directions[$step][1];
            $z = $z + $directions[$step][2];

            if($furthest) {
                $distance = (abs($x) + abs($y) + abs($z)) / 2;
                $furthestDistance = $distance > $furthestDistance ? $distance : $furthestDistance;
            }
        }

        return $furthest ? $furthestDistance : (abs($x) + abs($y) + abs($z)) / 2;
    }

    public function run($part = 1)
    {
        $input = $this->readInput(dirname(__FILE__));
        $values = explode(',', $input);

        if($part === 1) {
            return $this->process($values);
        } else {
            return $this->process($values, true);
        }
    }
}