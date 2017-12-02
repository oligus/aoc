<?php

namespace AOC\Aoc2017\Day1;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function calculate(string $input)
    {
        $sum = 0;

        for($i = 0; $i < strlen($input); $i++) {
            $current = (int) $input[$i];

            if($i >= strlen($input) - 1) {
                $next = (int) $input[0];
            } else {
                $next = (int) $input[$i+1];
            }

            if($current === $next) {
                $sum = $sum + $current;
            }
        }

        return $sum;
    }

    /**
     * @param string $input
     * @return int
     */
    public function calculateHalfway(string $input)
    {
        $sum = 0;
        $numberOfSteps = strlen($input) / 2;
        $longInput = $input . $input;

        for($i = 0; $i < strlen($input); $i++) {
            $current = (int) $input[$i];
            $next = (int) $longInput[$numberOfSteps + $i];

            if($current === $next) {
                $sum = $sum + $current;
            }
        }

        return $sum;
    }

    public function run($part = 1)
    {
        if($part === 1) {
            $input = $this->readInput(dirname(__FILE__));
            return $this->calculate($input);
        } else {
            $input = $this->readInput(dirname(__FILE__));
            return $this->calculateHalfway($input);
        }

    }
}