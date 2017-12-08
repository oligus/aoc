<?php

require_once 'src/2017/8/Aoc.php';

use AOC\Aoc2017\Day8\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    $input = [
        'b inc 5 if a > 1',
        'a inc 1 if b < 5',
        'c dec -10 if a >= 1',
        'c inc -20 if c == 10'
    ];

    beforeEach(function() use ($aoc) {
        $aoc->setRegistry([]);
    });

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(6828);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(7234);
    });


    it('Test set instructions', function() use ($aoc, $input) {
        $aoc->setInstruction($input);
        expect($aoc->getRegistry())->toEql(['a' => 1, 'b' => 0, 'c' => -10]);

        // utc dec -736 if p > -7
        $aoc->setInstruction(['utc dec -736 if p > -7']);
        expect($aoc->getRegistry())->toEql(['a' => 1, 'b' => 0, 'c' => -10, 'p' => 0, 'utc' => 736]);

        // hkt inc 875 if m != -6
        $aoc->setInstruction(['hkt inc 875 if m != -6']);
    });

    it('Test get modify registry', function() use ($aoc, $input) {
        $aoc->setRegistry(['a' => 3, 'b' => 2]);
        $aoc->modifyRegistry('b', 'inc', 5, 'a', '>', 2);
        expect($aoc->getRegistry())->toEql(['a' => 3, 'b' => 7]);

        $aoc->setRegistry(['a' => 1, 'b' => 0, 'c' => 0]);
        $aoc->modifyRegistry('c', 'dec', -10, 'a', '>=', 1);
        expect($aoc->getRegistry())->toEql(['a' => 1, 'b' => 0, 'c' => 10]);
    });

    it('Test update', function() use ($aoc, $input) {
        $aoc->setRegistry(['a' => 1, 'b' => 0]);
        $aoc->update('a', 'inc', -10);
        expect($aoc->getRegistry())->toEql(['a' => -9, 'b' => 0]);
        $aoc->update('b', 'dec', 10);
        expect($aoc->getRegistry())->toEql(['a' => -9, 'b' => -10]);
        $aoc->update('b', 'inc', 10);
        expect($aoc->getRegistry())->toEql(['a' => -9, 'b' => 0]);
        $aoc->update('b', 'inc', -10);
        expect($aoc->getRegistry())->toEql(['a' => -9, 'b' => -10]);
    });

    it('Test get highest', function() use ($aoc, $input) {
        $aoc->setRegistry([]);
        $aoc->setInstruction($input);
        expect($aoc->getHighest())->toEql(1);
    });


});
