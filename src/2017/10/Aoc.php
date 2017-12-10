<?php

namespace AOC\Aoc2017\Day10;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    /**
     * @param $list
     * @param $lengths
     * @return mixed
     */
    public function process($list, $lengths)
    {
        $skip = 0;
        $start = 0;

        foreach($lengths as $length) {
            $sublist = array_reverse($this->getList($list, $length, $start % count($list)));
            $list = $this->merge($list, $sublist, $start % count($list));
            $start += ($length + $skip);
            $skip++;
        }

        return $list;
    }

    public function processAscii($list, $lengths)
    {
        $skip = 0;
        $start = 0;

        for ($rounds = 0; $rounds < 64; $rounds++) {
            foreach ($lengths as $length) {
                $sublist = array_reverse($this->getList($list, $length, $start % count($list)));
                $list = $this->merge($list, $sublist, $start % count($list));
                $start += ($length + $skip);
                $skip++;
            }
        }

        return $list;
    }

    public function hash($list)
    {
        $hash = '';
        $chunks = array_chunk($list, 16);

        for ($i = 0; $i < 16; $i++) {
            $xor = $chunks[$i][0];
            for ($j = 1; $j < 16; $j++) {
                $xor ^= $chunks[$i][$j];
            }
            $hash .= sprintf('%02s', dechex($xor));
        }

        return $hash;
    }

    /**
     * @param string $string
     * @return array
     */
    public function convert(string $string): array
    {
        $result = [];

        foreach(str_split($string) as $char) {
            $result[] = ord($char);
        }

        return array_merge($result, [17, 31, 73, 47, 23]);
    }

    /**
     * @param $list
     * @param $part
     * @param $start
     * @return mixed
     */
    public function merge($list, $part, $start)
    {
        for($i = 0; $i < count($part); $i++) {
            $list[$start % count($list)] = $part[$i];
            $start++;
        }

        return $list;
    }

    /**
     * @param $list
     * @param $length
     * @param $start
     * @return array
     */
    public function getList($list, $length, $start)
    {
        $result = [];

        for($i = 0; $i < $length; $i++) {
            $result[] = $list[$start % count($list)];
            $start++;
        }

        return $result;
    }

    public function run($part = 1)
    {
        $list = range(0, 255);

        if($part === 1) {
            $input = $this->readInput(dirname(__FILE__));
            $values = explode(',', $input);
            $result = $this->process($list, $values);
            return $result[0] * $result[1];
        } else {
            $input = $this->readInput(dirname(__FILE__));
            $convert = $this->convert($input);
            $result = $this->processAscii($list, $convert);
            return $this->hash($result);
        }

    }
}