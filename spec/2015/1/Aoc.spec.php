<?php

require_once 'src/2015/1/Aoc.php';

use AOC\Aoc2015\Jan\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('should read floor', function() use ($aoc) {
        expect($aoc->calculateFloor('((('))->toEqual(3);
        expect($aoc->calculateFloor(')))'))->toEqual(-3);
        expect($aoc->calculateFloor('))('))->toEqual(-1);
        expect($aoc->calculateFloor(')())())'))->toEqual(-3);
    });

    it('should calculate basement position', function() use ($aoc) {
        expect($aoc->calculateBasementPosition(')'))->toEqual(1);
        expect($aoc->calculateBasementPosition('()())'))->toEqual(5);
    });

    it('should run part one', function() use ($aoc)  {
        expect($floor = $aoc->run())->toEqual(280);
        expect($floor = $aoc->run(2))->toEqual(1797);
    });

});