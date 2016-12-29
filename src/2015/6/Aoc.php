<?php

namespace AOC\Aoc2015\Day6;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    const PIXEL_ON = true;
    const PIXEL_OFF = false;

    private $matrix = [];

    public function __construct($width, $height, $value = self::PIXEL_OFF)
    {
        $this->matrix = array_fill(0, $width, array_fill(0, $height, $value) );
    }

    public function setPixel($type, $xpos, $ypos)
    {
        switch ($type) {

            case 'on':
                $this->matrix[$xpos][$ypos] = self::PIXEL_ON;
                break;

            case 'off':
                $this->matrix[$xpos][$ypos] = self::PIXEL_OFF;
                break;

            default:
                $this->matrix[$xpos][$ypos] = $this->matrix[$xpos][$ypos] === self::PIXEL_ON ? self::PIXEL_OFF : self::PIXEL_ON;
                break;
        }
    }

    public function setPixelBrightness($type, $xpos, $ypos)
    {
        switch ($type) {

            case 'on':
                $this->matrix[$xpos][$ypos] = $this->matrix[$xpos][$ypos] + 1;
                break;

            case 'off':
                $this->matrix[$xpos][$ypos] = $this->matrix[$xpos][$ypos] - 1;
                $this->matrix[$xpos][$ypos] =  $this->matrix[$xpos][$ypos] < 0 ? 0 : $this->matrix[$xpos][$ypos];
                break;

            default:
                $this->matrix[$xpos][$ypos] = $this->matrix[$xpos][$ypos] + 2;
                break;
        }
    }


    public function getPixel($xpos, $ypos)
    {
        return $this->matrix[$xpos][$ypos];
    }

    public function setBox($type, $xfrom, $yfrom, $xto, $yto)
    {
        for($y = $yfrom; $y <= $yto; $y++) {
            for($x = $xfrom; $x <= $xto; $x++) {
                $this->setPixel($type, $x, $y);
            }
        }
    }

    public function setBoxBrightness($type, $xfrom, $yfrom, $xto, $yto)
    {
        for($y = $yfrom; $y <= $yto; $y++) {
            for($x = $xfrom; $x <= $xto; $x++) {
                $this->setPixelBrightness($type, $x, $y);
            }
        }
    }

    public function litPixels($input, $function = 'setBox')
    {
        preg_match('/^(turn|toggle)\s(on|off)?\s?(\d+),\s?(\d+)\sthrough\s(\d+),\s?(\d+)/', $input, $matches);

        $type = $matches[1] === 'toggle' ? $matches[1] : $matches[2];
        $xfrom = $matches[3];
        $yfrom = $matches[4];
        $xto = $matches[5];
        $yto = $matches[6];

        $this->$function($type, $xfrom, $yfrom, $xto, $yto);
    }

    public function numberOfLights() : int
    {
        $count = 0;

        for($height = 0; $height < count($this->matrix[0]); $height++) {
            for($width = 0; $width < count($this->matrix[$height]); $width++) {
                $value = $this->matrix[$width][$height] ? 1 : 0;
                $count = $count + $value;
            }
        }

        return $count;
    }

    public function totalBrightness() : int
    {
        $count = 0;

        for($height = 0; $height < count($this->matrix[0]); $height++) {
            for($width = 0; $width < count($this->matrix[$height]); $width++) {
                $value = $this->matrix[$width][$height];
                $count = $count + $value;
            }
        }

        return $count;
    }

    public function draw()
    {
        echo "\n";
        for($height = 0; $height < count($this->matrix[0]); $height++) {
            echo $height . ':';
            for($width = 0; $width < count($this->matrix[$height]); $width++) {;
                $value = $this->matrix[$width][$height] > 0 ? $this->matrix[$width][$height] : '-';
                echo $value;
            }
            echo "\n";
        }
    }



    public function run($part = 1)
    {
        if($part === 1) {
            $this->readInputLines(dirname(__FILE__), function($line) {
                $this->litPixels($line);
            });
            return $this->numberOfLights();
        }

        $this->readInputLines(dirname(__FILE__), function($line) {
            $this->litPixels($line, 'setBoxBrightness');
        });

        return $this->totalBrightness();


    }
}