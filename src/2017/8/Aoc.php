<?php

namespace AOC\Aoc2017\Day8;

require_once 'vendor/autoload.php';

use AOC\Common\AbstractAoc;

class Aoc extends AbstractAoc
{
    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var int
     */
    private $allTimeHigh = 0;

    /**
     * @param array $registry
     */
    public function setRegistry(array $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return array
     */
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * @return int
     */
    public function getAllTimeHigh(): int
    {
        return $this->allTimeHigh;
    }

    /**
     * @param $input
     * @throws \Exception
     */
    public function setInstruction($input)
    {
        foreach($input as $row) {
            preg_match('/^(\w+)\s(inc|dec)\s(-?\d+)\s(if)\s(\w+)\s([=<>!]{1,2})\s(-?\d+)$/', $row, $matches);

            $target = $matches[1];
            $modifier = $matches[2];
            $targetValue = (int) $matches[3];

            $registry = $matches[5];
            $operator= $matches[6];
            $value = (int) $matches[7];

            $this->modifyRegistry($target, $modifier, $targetValue, $registry, $operator, $value);
        }
    }

    /**
     * @param $target
     * @param $modifier
     * @param $targetValue
     * @param $registry
     * @param $operator
     * @param $value
     * @throws \Exception
     */
    public function modifyRegistry($target, $modifier, $targetValue, $registry, $operator, $value)
    {

        if(!array_key_exists($registry, $this->registry)) {
            $this->registry[$registry] = 0;
        }

        if(!array_key_exists($target, $this->registry)) {
            $this->registry[$target] = 0;
        }

        switch($operator) {
            case '>':
                if($this->registry[$registry] > $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            case '>=':
                if($this->registry[$registry] >= $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            case '<':
                if($this->registry[$registry] < $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            case '<=':
                if($this->registry[$registry] <= $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            case '==':
                if($this->registry[$registry] == $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            case '!=':
                if($this->registry[$registry] != $value) {
                    $this->update($target, $modifier, $targetValue);
                }
                break;

            default:
                throw new \Exception('Operator ' . $operator . ' not found.');
        }

    }

    public function update($registry, $operator, $value)
    {
        if($operator === 'inc') {
            if(!array_key_exists($registry,  $this->registry)) {
                $this->registry[$registry] = $value;
            } else {
                $this->registry[$registry] = $this->registry[$registry] + $value;
            }

        } else {
            if(!array_key_exists($registry,  $this->registry)) {
                $this->registry[$registry] = $value;
            } else {
                $this->registry[$registry] = $this->registry[$registry] - $value;
            }
        }

        if($this->registry[$registry] >= $this->allTimeHigh) {
            $this->allTimeHigh = $this->registry[$registry];
        }
    }

    public function getHighest()
    {
        return max($this->registry);
    }

    /**
     * @param int $part
     * @return mixed
     * @throws \Exception
     */
    public function run($part = 1)
    {
        $input = $this->readInputFile(dirname(__FILE__));

        if($part === 1) {
            $this->setRegistry([]);
            $this->setInstruction($input);
            return $this->getHighest();
        } else {
            $this->setRegistry([]);
            $this->setInstruction($input);
            return $this->allTimeHigh;
        }

    }
}