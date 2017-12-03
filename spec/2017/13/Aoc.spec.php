<?php

require_once 'src/2017/13/Aoc.php';

use AOC\Aoc2017\Day13\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql('day13');
    });

});
