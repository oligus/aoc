<?php

require_once 'src/2016/2/Aoc.php';

use AOC\Aoc2016\Day2\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    $input = [
        'ULL',
        'RRDDD',
        'LURDL',
        'UUUUD'
    ];

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEqual("33444");
    });

    it('Test move part 1', function() use ($aoc, $input) {
        expect($aoc->move($input))->toEqual("1985");
    });
});
