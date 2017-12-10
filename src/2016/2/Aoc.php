<?php

namespace AOC\Aoc2016\Day2;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    private $numpad = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
    ];

    public function move($input)
    {
        $posX = 1;
        $posY = 1;
        $code = '';

        foreach($input as $row) {
            foreach(str_split($row) as $char) {

                switch($char) {
                    case 'U':
                        $posY--;
                        $posY = $posY < 0 ? 0 : $posY;
                        break;

                    case 'D':
                        $posY++;
                        $posY = $posY > 2 ? 2 : $posY;
                        break;

                    case 'L':
                        $posX--;
                        $posX = $posX < 0 ? 0 : $posX;
                        break;

                    case 'R':
                        $posX++;
                        $posX = $posX > 2 ? 2 : $posX;
                        break;
                }
            }

            $number = $this->numpad[$posY][$posX];
            $code .= $number;
        }


        return $code;
    }

    public function run($part = 1)
    {
        $input = $this->readInputFile(dirname(__FILE__));

        if($part === 1) {
            return $this->move($input);
        }

    }
}