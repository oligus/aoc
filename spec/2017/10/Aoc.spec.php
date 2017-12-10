<?php

require_once 'src/2017/10/Aoc.php';

use AOC\Aoc2017\Day10\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    xit('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(11375);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql('e0387e2ad112b7c2ef344e44885fe4d8');
    });

    it('Test process', function() use ($aoc) {
        expect($aoc->process([0, 1, 2, 3, 4], [3, 4, 1, 5]))->toEql([3, 4, 2, 1, 0]);
    });

    it('Test process ascii', function() use ($aoc) {
        expect($aoc->processAscii([0, 1, 2, 3, 4], [3, 4, 1, 5, 17, 31, 73, 47, 23]))->toEql([0, 2, 4, 3, 1]);
    });

    xit('Test hash', function() use ($aoc) {
        expect($aoc->hash([3, 4, 1, 5, 17, 31, 73, 47, 23]))->toEql('7c000000000000000000000000000000');
    });

    it('Test process', function() use ($aoc) {
        expect($aoc->convert('1,2,3'))->toEql([49, 44, 50, 44, 51, 17, 31, 73, 47, 23]);
    });

    it('Test merge', function() use ($aoc) {
        expect($aoc->merge([0, 1, 2, 3, 4], [2, 1, 0], 0))->toEql([2,1,0,3,4]);
        expect($aoc->merge([0, 1, 2, 3, 4], [2, 1, 0], 4))->toEql([1, 0, 2, 3, 2]);
    });

    it('Test get list', function() use ($aoc) {
        expect($aoc->getList([0, 1, 2, 3, 4], 3, 0))->toEql([0, 1, 2]);
        expect($aoc->getList([0, 1, 2, 3, 4], 3, 2))->toEql([2, 3, 4]);
        expect($aoc->getList([0, 1, 2, 3, 4], 7, 0))->toEql([0,1,2,3,4,0,1]);
        expect($aoc->getList([0, 1, 2, 3, 4], 17, 0))->toEql([0,1,2,3,4,0,1,2,3,4,0,1,2,3,4,0,1]);
    });
});
