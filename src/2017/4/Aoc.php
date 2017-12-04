<?php

namespace AOC\Aoc2017\Day4;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    public function countUnique(array $data): int
    {
        $result = 0;

        foreach(array_count_values($data) as $key => $value) {
            if($value === 1) {
                $result++;
            }
        }

       return $result;
    }

    public function isAnagram($str1, $str2)
    {
        $r1 = count_chars($str1, 1);
        $r2 = count_chars($str2, 1);
        return $r1 === $r2;
    }

    public function hasAnagram($row)
    {
        foreach($row as $key => $value) {
            for($i = 0; $i < count($row); $i++) {
                if($i === $key) {
                    continue;
                }

                if($this->isAnagram($row[$i], $value)) {
                    return true;
                }
            }
        }

        return false;
    }

    public function run($part = 1)
    {
        $input = $this->readInputFile(dirname(__FILE__));

        if($part === 1) {
            $result = 0;

            foreach ($input as $row) {
                $row = preg_split('/\s/', trim($row));

                if($this->countUnique($row) === count($row)) {
                    $result++;
                }
            }

            return $result;
        } else {
            $invalid = 0;

            foreach ($input as $key=> $row) {
                $row = preg_split('/\s/', trim($row));

                if($this->hasAnagram($row)) {
                    $invalid++;
                }
            }

            return count($input) - $invalid;
        }
    }
}