<?php

require_once 'src/2017/1/Aoc.php';

use AOC\Aoc2017\Day1\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEqual(1144);
    });

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(2))->toEqual(1194);
    });

    it('Test calculate', function() use ($aoc) {
        expect($aoc->calculate('1122'))->toEqual(3);
        expect($aoc->calculate('1111'))->toEqual(4);
        expect($aoc->calculate('1234'))->toEqual(0);
        expect($aoc->calculate('91212129'))->toEqual(9);
    });

    it('Test calculate halfway arounf', function() use ($aoc) {
        expect($aoc->calculateHalfway('1212'))->toEqual(6);
        expect($aoc->calculateHalfway('1221'))->toEqual(0);
        expect($aoc->calculateHalfway('123425'))->toEqual(4);
        expect($aoc->calculateHalfway('123123'))->toEqual(12);
        expect($aoc->calculateHalfway('12131415'))->toEqual(4);
    });
});
