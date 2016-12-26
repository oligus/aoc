<?php

require_once 'src/2015/3/Aoc.php';

use AOC\Aoc2015\Day3\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('should calculate houses', function() use ($aoc) {
        expect($aoc->calculateHouses('>'))->toEqual(2);
        expect($aoc->calculateHouses('^>v<'))->toEqual(4);
        expect($aoc->calculateHouses('^v^v^v^v^v'))->toEqual(2);
    });

    it('should calculate houses robo', function() use ($aoc) {
        expect($aoc->calculateHousesRobo('^v'))->toEqual(3);
        //expect($aoc->calculateHousesRobo('^>v<'))->toEqual(3);
        //expect($aoc->calculateHousesRobo('^v^v^v^v^v'))->toEqual(11);
    });
    
    it('should run', function() use ($aoc) {
        expect($aoc->run())->toEqual(2592);
    });

    it('should run part two', function() use ($aoc) {
        expect($aoc->run(2))->toEqual(2360);
    });
});