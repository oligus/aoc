<?php

require_once 'src/2017/11/Aoc.php';

use AOC\Aoc2017\Day11\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(812);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(1603);
    });


    it('Test step', function() use ($aoc) {
        expect($aoc->step('ne'))->toEql([1, -1, 0]);
    });

    it('Test process', function() use ($aoc) {
        expect($aoc->process(['ne', 'ne', 'ne']))->toEql(3);
        expect($aoc->process(['ne','ne','sw','sw']))->toEql(0);
        expect($aoc->process(['ne','ne','s','s']))->toEql(2);
        expect($aoc->process(['se','sw','se','sw','sw']))->toEql(3);
    });
});
