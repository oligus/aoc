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

    protected function readInputLines($path, \Closure $p)
    {
        $file = $path . '/input.txt';

        $handle = fopen($file, "r");

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $line = trim($line);

                if($line !== '') {
                    $p($line);
                }
            }

            fclose($handle);
        }
    }
}