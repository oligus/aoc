<?php

namespace AOC\Common;

abstract class AbstractAoc
{
    public abstract function run();

    protected function readInput($path)
    {
        $file = $path . '/input.txt';
        return file_get_contents($file);
    }
}