<?php

require_once 'src/2017/3/Aoc.php';

use AOC\Aoc2017\Day3\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(371);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(369601);
    });

    it('Test render square map', function() use ($aoc) {
        $map = [
            [147, 142, 133, 122,  59],
            [304,   5,   4,   2,  57],
            [330,  10,   1,   1,  54],
            [351,  11,  23,  25,  26],
            [362, 747, 806, 880, 931]
        ];

        expect($aoc->getMapHighValue(5, 300))->toEql(304);
        expect($aoc->getMapHighValue(5, 800))->toEql(806);

    });

    it('Test square value', function() use ($aoc) {
        $map = [
            [147, 142, 133, 122,  59],
            [0,   5,   4,   2,  57],
            [330,  10,   1,   1,  54],
            [351,  11,  23,  25,  26],
            [362, 747, 806, 880, 931]
        ];

        expect($aoc->getSquareValues($map, [0, 0]))->toEql(147);

    });


    it('Test render map', function() use ($aoc) {
        $map = [
            [17, 16, 15, 14, 13],
            [18,  5,  4,  3, 12],
            [19,  6,  1,  2, 11],
            [20,  7,  8,  9, 10],
            [21, 22, 23, 24, 25]
        ];

        expect($aoc->renderMap(5))->toEql($map);

    });

    it('Test get distance', function() use ($aoc) {
        $map = [
            [17, 16, 15, 14, 13],
            [18,  5,  4,  3, 12],
            [19,  6,  1,  2, 11],
            [20,  7,  8,  9, 10],
            [21, 22, 23, 24, 25]
        ];
        expect($aoc->getDistance($map, 1))->toEql(0);
        expect($aoc->getDistance($map, 12))->toEql(3);
        expect($aoc->getDistance($map, 23))->toEql(2);
    });

    it('Test get position', function() use ($aoc) {
        $map = [
            [17, 16, 15, 14, 13],
            [18,  5,  4,  3, 12],
            [19,  6,  1,  2, 11],
            [20,  7,  8,  9, 10],
            [21, 22, 23, 24, 25]
        ];

        expect($aoc->getPosition($map, 13))->toEql([4, 0]);
        expect($aoc->getPosition($map, 25))->toEql([4, 4]);
        expect($aoc->getPosition($map, 3))->toEql([3, 1]);
    });

});
