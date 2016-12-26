<?php

namespace AOC\Aoc2015\Mar;

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{

    public function calculateHouses(string $input)
    {
        $houses = [];

        $xpos = 0;
        $ypos = 0;
        $houses[$xpos . '-' . $ypos] = 1;

        for($i = 0; $i < strlen($input); $i++) {

            switch($input[$i]) {
                case '>':
                    $xpos++;
                    break;

                case '<':
                    $xpos--;
                    break;

                case '^':
                    $ypos--;
                    break;

                case 'v':
                    $ypos++;
                    break;
            }

            $key = $xpos . '-' . $ypos;

            if(empty($houses[$key])) {
                $houses[$key] = 0;
            }
            $houses[$key]++;


        }
        
        return count($houses);
    }

    public function calculateHousesRobo(string $input)
    {
        $data = new \stdClass();
        $data->santa = new \stdClass();
        $data->robo = new \stdClass();

        $data->santa->houses = [];
        $data->robo->houses = [];

        $data->santa->xpos = 0;
        $data->santa->ypos = 0;
        $data->robo->xpos = 0;
        $data->robo->ypos = 0;

        $data->santa->houses['0-0'] = 1;
        $data->robo->houses['0-0'] = 1;

        for($i = 0; $i < strlen($input); $i++) {
            $actor = 'santa';

            if($i % 2 != 0) {
               $actor = 'robo';
            }

            switch($input[$i]) {
                case '>':
                    $data->$actor->xpos++;
                    break;

                case '<':
                    $data->$actor->xpos--;
                    break;

                case '^':
                    $data->$actor->ypos--;
                    break;

                case 'v':
                    $data->$actor->ypos++;
                    break;
            }

            $keySanta = $data->santa->xpos . '-' . $data->santa->ypos;
            $keyRobo = $data->robo->xpos . '-' . $data->robo->ypos;

            if(empty($data->santa->houses[$keySanta])) {
                $data->santa->houses[$keySanta] = 0;
            }
            $data->santa->houses[$keySanta]++;

            if(empty($data->robo->houses[$keyRobo])) {
                $data->robo->houses[$keyRobo] = 0;
            }
            $data->robo->houses[$keyRobo]++;
        }

        $houses = array_merge($data->santa->houses, $data->robo->houses);
        
        return count($houses);
    }

    public function run($part = 1)
    {
        $instructions = $this->readInput(dirname(__FILE__));

        if($part === 1) {
            return $this->calculateHouses($instructions);
        }

        return $this->calculateHousesRobo($instructions);

    }
}