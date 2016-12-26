<?php

namespace AOC\Aoc2015\Day4;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{

    public function getCounter($key, $count = 5)
    {
        $counter = 0;

        do {
            $hash = md5($key . $counter);
            $counter++;
        } while(!$this->hasFirstChars($hash, '0', $count));

        return $counter - 1;
    }

    public function hasFirstChars(string $input, string $char, int $count = 5) : bool
    {
        $regex = '/^[' .  $char . ']{' . $count . '}/';
        preg_match($regex, $input, $match);

        return !empty($match);
    }

    public function run($part = 1)
    {
        if($part === 1) {
            return $this->getCounter('ckczppom');
        }

        return $this->getCounter('ckczppom', 6);
    }
}