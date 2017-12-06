<?php

namespace AOC\Aoc2017\Day6;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function reAllocate(array $memory, $cycles = false)
    {
        $steps = 0;
        $seen = [];

        while(!in_array($memory, $seen)) {
            $seen[] = $memory;

            $memory = $this->spread($memory);
            $steps++;
        }


        $start = array_search($memory, $seen);

        if($cycles) {
            return $steps - $start;
        }

        return $steps;
    }

    public function reAllocate2(array $memory)
    {
        $steps = 0;
        $seen = [];

        while(!in_array($memory, $seen)) {
            $seen[] = $memory;

            $memory = $this->spread($memory);
            $steps++;

        }

        return $steps;
    }

    public function spread(array $memory)
    {
        $max = max($memory);
        $position = array_keys($memory, max($memory))[0];
        $memory[$position] = 0;
        $position++;

        for($i = 0; $i < $max; $i++) {
            if($position >= count($memory)) {
                $position = 0;
            }

            $memory[$position]++;
            $position++;
        }

        return $memory;
    }

    public function run($part = 1)
    {
        $input = $this->readInputFile(dirname(__FILE__));
        $values = explode("\t", $input[0]);

        if($part === 1) {
            return $this->reAllocate($values);
        } else {
            return $this->reAllocate($values, true);
        }

    }
}