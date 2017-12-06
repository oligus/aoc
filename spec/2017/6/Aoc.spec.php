<?php

require_once 'src/2017/6/Aoc.php';

use AOC\Aoc2017\Day6\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    xit('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(14029);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(2765);
    });

    it('Test run part 1', function() use ($aoc) {
        $memory = [0, 2, 7, 0];
        expect($aoc->reAllocate($memory))->toEql(5);

        $memory = [0, 2, 7, 0];
        expect($aoc->reAllocate($memory, true))->toEql(4);

    });


    it('Test spread', function() use ($aoc) {
        expect($aoc->spread([0, 2, 7, 0]))->toEql([2, 4, 1, 2]);
    });


});
