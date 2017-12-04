<?php

require_once 'src/2017/4/Aoc.php';

use AOC\Aoc2017\Day4\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(466);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(251);
    });

    it('Test remove duplicates', function() use ($aoc) {
        expect($aoc->countUnique([
            'aa', 'bb', 'cc', 'dd', 'aa'
        ]))->toEql(3);
    });

    it('Test is anagram', function() use ($aoc) {
        expect($aoc->isAnagram('abcde', 'ecdab'))->toEql(true);
        expect($aoc->isAnagram('oooi', 'iooo'))->toEql(true);
        expect($aoc->isAnagram('iooi', 'iooo'))->toEql(false);
    });

    it('Test has anagram', function() use ($aoc) {
        expect($aoc->hasAnagram(['abcde', 'ebcda', 'moo', 'jii']))->toEql(true);
        expect($aoc->hasAnagram(['abcde','fghij']))->toEql(false);
        expect($aoc->hasAnagram(['abcde', 'xyz', 'ecdab']))->toEql(true);
        expect($aoc->hasAnagram(['a','ab','abc','abd','abf','abj']))->toEql(false);
        expect($aoc->hasAnagram(['iiii','oiii','ooii','oooi','oooo']))->toEql(false);
        expect($aoc->hasAnagram(['oiii','ioii','iioi','iiio']))->toEql(true);
        expect($aoc->hasAnagram(['apg','gbycwe','gap','pag']))->toEql(true);
    });
});
