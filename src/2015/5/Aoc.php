<?php

namespace AOC\Aoc2015\Day5;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function hasVowels(string $input, int $count = 3) : bool
    {
        $vowels = 0;

        for($i = 0; $i < strlen($input); $i++) {
            if(preg_match('/[aeiou]/', $input[$i])) {
                $vowels++;
            }
        }

        return $vowels >= $count;
    }

    public function hasDoubleLetter(string $input) : bool
    {
        return (bool) preg_match('/([a-z])\1/', $input);
    }

    public function hasIllegalLetter(string $input) : bool
    {
        return (bool) preg_match('/ab|cd|pq|xy/', $input);
    }

    public function hasTwoSameLetters(string $input) : bool
    {
        return (bool) preg_match('/([a-z]{2}).*\1/', $input);
    }

    public function hasOneBetweenLetter(string $input) : bool
    {
        return (bool) preg_match('/([a-z]).\1/', $input);
    }

    public function isNiceString(string $input) : bool
    {
        return $this->hasVowels($input) && $this->hasDoubleLetter($input) && !$this->hasIllegalLetter($input);
    }

    public function isNiceString2(string $input) : bool
    {
        return $this->hasTwoSameLetters($input) && $this->hasOneBetweenLetter($input);
    }

    public function run($part = 1)
    {
        $count = 0;

        if($part === 1) {
            $this->readInputLines(dirname(__FILE__), function($line) use (&$count) {
                $sum = $this->isNiceString($line);
                $count = $count + $sum;
            });
        } else {
            $this->readInputLines(dirname(__FILE__), function($line) use (&$count) {
                $sum = $this->isNiceString2($line);
                $count = $count + $sum;
            });
        }

        return $count;
    }
}