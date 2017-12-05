<?php

require_once 'src/2017/5/Aoc.php';

use AOC\Aoc2017\Day5\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    xit('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(375042);
    });

    xit('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(28707598);
    });

    it('Test run maze', function() use ($aoc) {
        $data = [0, 3, 0, 1, -3];
        expect($aoc->runMaze($data))->toEql(5);
    });
    it('Test jump second', function() use ($aoc) {

    });

    it('Test jump', function() use ($aoc) {
        $position = 0;
        $data = [0, 3, 0, 1, -3];

        expect($aoc->jump($data, $position))->toEql([
            'data' => [1, 3, 0, 1, -3],
            'position' => 0
        ]);

        $position = 0;
        $data = [1, 3, 0, 1, -3];

        expect($aoc->jump($data, $position))->toEql([
            'data' => [2, 3, 0, 1, -3],
            'position' => 1
        ]);

        $position = 1;
        $data = [2, 3, 0, 1, -3];

        expect($aoc->jump($data, $position))->toEql([
            'data' => [2, 4, 0, 1, -3],
            'position' => 4
        ]);

        $position = 4;
        $data = [2, 4, 0, 1, -3];

        expect($aoc->jump($data, $position))->toEql([
            'data' => [2, 4, 0, 1, -2],
            'position' => 1
        ]);

        $position = 1;
        $data = [2, 4, 0, 1, -2];

        expect($aoc->jump($data, $position))->toEql([
            'data' => [2, 5, 0, 1, -2],
            'position' => 5
        ]);

    });
});
