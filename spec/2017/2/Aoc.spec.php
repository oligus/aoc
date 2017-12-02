<?php

require_once 'src/2017/2/Aoc.php';

use AOC\Aoc2017\Day2\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(41919);
    });

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(2))->toEql(303);
    });

    it('Test checksum row', function() use ($aoc) {
        expect($aoc->checksum("5\t1\t9\t5"))->toEqual(8);
        expect($aoc->checksum("7\t5\t3"))->toEqual(4);
        expect($aoc->checksum("2\t4\t6\t8"))->toEqual(6);
    });

    it('Test checksum rdivide ow', function() use ($aoc) {
        expect($aoc->checksumDivide("5\t9\t2\t8"))->toEql(4);
        expect($aoc->checksumDivide("9\t4\t7\t3"))->toEql(3);
        expect($aoc->checksumDivide("3\t8\t6\t5"))->toEql(2);
    });

    it('Calculate checksum', function() use ($aoc) {
        $input = [
            "5\t1\t9\t5",
            "7\t5\t3",
            "2\t4\t6\t8"
        ];

        expect($aoc->calculateChecksum($input))->toEql(18);
    });

});
