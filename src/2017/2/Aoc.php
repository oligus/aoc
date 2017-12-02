<?php

namespace AOC\Aoc2017\Day2;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function checksum($row)
    {
        $values = preg_split('/\s+/', trim($row));

        $max = 0;
        $min = 0;

        foreach($values as $value) {
            if($min === 0) {
                $min = (int) $value;
            }

            if($max === 0) {
                $max = (int) $value;
            }

            if($value <$min) {
                $min = (int) $value;
            }

            if($value > $max) {
                $max = (int) $value;
            }
        }

        return $max - $min;
    }

    public function checksumDivide($row)
    {
        $values = preg_split('/\s+/', trim($row));

        foreach($values as $value) {
            $firstNumber = (int) $value;

            foreach($values as $secondValue) {
                $secondNumber = (int) $secondValue;

                if($firstNumber === $secondNumber) {
                    continue;
                }

                if(($firstNumber % $secondNumber) === 0){
                    if($firstNumber >=  $secondNumber) {
                        return $firstNumber / $secondNumber;
                    } else {
                        return $secondNumber / $firstNumber;
                    }
                }
            }
        }

        return 0;
    }

    public function calculateChecksum($input, $divide = false)
    {
        $sum = 0;
        foreach($input as $row) {
            if($divide) {
                $sum = $sum + $this->checksumDivide($row);
            } else {
                $sum = $sum + $this->checksum($row);
            }

        }

        return $sum;
    }

    public function run($part = 1)
    {
        if($part === 1) {
            $input = $this->readInputFile(dirname(__FILE__));
            return $this->calculateChecksum($input);
        } else {
            $input = $this->readInputFile(dirname(__FILE__));
            return $this->calculateChecksum($input, true);
        }

    }
}