<?php

require_once 'src/2015/2/Aoc.php';

use AOC\Aoc2015\Feb\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('should calculate area', function() use ($aoc) {
        expect($aoc->calculateArea(2, 3, 4))->toEqual(52);
    });

    it('should calculate paper usage', function() use ($aoc) {
        expect($aoc->calculatePaperUsage('2x3x4'))->toEqual(58);
        expect($aoc->calculatePaperUsage('1x1x10'))->toEqual(43);
    });

    it('should calculate ribbon usage', function() use ($aoc) {
        expect($aoc->calculateRibbonUsage('2x3x4'))->toEqual(34);
        expect($aoc->calculateRibbonUsage('1x1x10'))->toEqual(14);
    });

    it('should run', function() use ($aoc) {
        expect($aoc->run())->toEqual(1606483);
        expect($aoc->run(2))->toEqual(3842356);
    });
});