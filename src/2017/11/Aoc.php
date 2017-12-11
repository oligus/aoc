<?php

namespace AOC\Aoc2017\Day11;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    /**
     * @param $step
     * @return array
     */
    public function step($step)
    {
        switch($step) {
            case 'n' : return [1,  0, -1]; break;
            case 'ne': return [1, -1,  0]; break;
            case 'nw': return [0,  1, -1]; break;
            case 's' : return [-1, 0,  1]; break;
            case 'se': return [0, -1,  1]; break;
            case 'sw': return [-1, 1,  0]; break;
            default: return []; break;
        }
    }

    public function process($steps)
    {
        $x = $y = $z = 0;

        foreach($steps as $step) {
            $result = $this->step($step);
            $x = $x + $result[0];
            $y = $y + $result[1];
            $z = $z + $result[2];
        }

        return  (abs($x) + abs($y) + abs($z)) / 2;
    }

    public function furthest($steps)
    {
        $x = $y = $z = $furthest = 0;

        foreach($steps as $step) {
            $result = $this->step($step);
            $x = $x + $result[0];
            $y = $y + $result[1];
            $z = $z + $result[2];

            $distance =  (abs($x) + abs($y) + abs($z)) / 2;
            $furthest = $distance > $furthest ? $distance : $furthest;
        }

        return $furthest;

    }

    public function run($part = 1)
    {
        $input = $this->readInput(dirname(__FILE__));
        $values = explode(',', $input);

        if($part === 1) {
            return $this->process($values);
        } else {
            return $this->furthest($values);
        }
    }
}