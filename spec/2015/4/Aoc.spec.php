<?php

require_once 'src/2015/4/Aoc.php';

use AOC\Aoc2015\Day4\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    xit('should get hash', function() use ($aoc) {
        expect($aoc->getCounter('abcdef'))->toEqual(609043);
        expect($aoc->getCounter('pqrstuv'))->toEqual(1048970);
    });

    it('should get first', function() use ($aoc) {
        expect($aoc->hasFirstChars('0000asdfd', '0', 5))->toBeFalse();
        expect($aoc->hasFirstChars('00000asdfd', '0', 5))->toBeTrue();
        expect($aoc->hasFirstChars('000000asdfd', '0', 5))->toBeTrue();
    });

    xit('should run', function() use ($aoc) {
        expect($aoc->run())->toEqual(117946);
        expect($aoc->run(2))->toEqual(3938038);
    });
});