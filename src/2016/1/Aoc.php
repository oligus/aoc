<?php

class Aoc
{
    private $origin = [0, 0];
    private $position = [0, 0];
    private $heading = 'up';

    public function __construct()
    {
    }

    public function distance($origin, $distance)
    {
        $distance = ($origin[0] - $distance[0]) + ($origin[1] - $distance[1]);

        if($distance < 0) {
            $distance = $distance * -1;
        }

        return $distance;
    }

    public function move($input)
    {
        $rl = substr($input, 0, 1);
        $blocks = substr($input, 1, 1);

    }

    public function getHeading($rl)
    {
        if($rl === 'R') {
            switch($this->heading)
            {
                case 'up':
                    $this->heading = 'right';
                    break;

                case 'right':
                    $this->heading = 'down';
                    break;

                case 'down':
                    $this->heading = 'left';
                    break;

                case 'left':
                    $this->heading = 'up';
                    break;
            }
        } else {
            switch($this->heading)
            {
                case 'up':
                    $this->heading = 'left';
                    break;

                case 'left':
                    $this->heading = 'down';
                    break;

                case 'down':
                    $this->heading = 'right';
                    break;

                case 'right':
                    $this->heading = 'up';
                    break;
            }
        }
   
        return $this->heading;
    }

}