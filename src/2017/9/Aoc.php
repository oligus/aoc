<?php

namespace AOC\Aoc2017\Day9;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function calculateCompact($data)
    {
        $g = $c = false;
        $m = $s = 0;

        for ($i=0;$i<strlen($data);$i++) {
            if($c) { $c = !$c; continue; }

            switch($data[$i]) {
                case '!': $c = !$c ? !$c : $c; break;
                case '>': $g = !$g; break;
                case '<': $g = true; break;
                case '{': $m = !$g ? $m+1 : $m; break;
                case '}': if(!$g) { $s = $s + $m; $m--; } break;
            }
        }

        return $s;
    }

    public function calculate($data)
    {
        $isGarbage = false;
        $cancelNext = false;
        $max = 0;
        $score = 0;

        for ($i = 0; $i < strlen($data); $i++) {

            if($cancelNext) {
                $cancelNext = !$cancelNext;
                continue;
            }

            if ($data[$i] === '!' && !$cancelNext) {
                $cancelNext = !$cancelNext;
                continue;
            }

            if ($data[$i] === '>' && $isGarbage) {
                $isGarbage = false;
                continue;
            }

            if ($data[$i] === '<' && !$isGarbage) {
                $isGarbage = true;
                continue;
            }

            if ($data[$i] === '{' && !$isGarbage) {
                $max++;
                continue;
            }

            if ($data[$i] === '}' && !$isGarbage) {
                $score = $score + $max;
                $max--;
                continue;
            }
        }

        return $score;
    }

    public function count($data)
    {
        $isGarbage = false;
        $cancelNext = false;
        $count = 0;

        for ($i = 0; $i < strlen($data); $i++) {

            if($cancelNext) {
                $cancelNext = !$cancelNext;
                continue;
            }

            if ($data[$i] === '!' && !$cancelNext) {
                $cancelNext = !$cancelNext;
                continue;
            }

            if ($data[$i] === '>' && $isGarbage) {
                $isGarbage = false;
                continue;
            }

            if ($data[$i] === '<' && !$isGarbage) {
                $isGarbage = true;
                continue;
            }

            if($isGarbage) {
                $count++;
            }
        }

        return $count;
    }

    public function run($part = 1)
    {
        $input = $this->readInput(dirname(__FILE__));

        if($part === 1) {
            return $this->calculate($input);
        } else {
            return $this->count($input);
        }
    }
}