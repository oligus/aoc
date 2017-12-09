<?php

require_once 'src/2017/9/Aoc.php';

use AOC\Aoc2017\Day9\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('Test run part 1', function() use ($aoc) {
        expect($aoc->run(1))->toEql(12505);
    });

    it('Test run part 2', function() use ($aoc) {
        expect($aoc->run(2))->toEql(6671);
    });

    it('Test calculate', function() use ($aoc) {
        expect($aoc->calculate('<>'))->toEql(0);
        expect($aoc->calculate('{}'))->toEql(1);
        expect($aoc->calculate('{{{}}}'))->toEql(6);
        expect($aoc->calculate('{{},{}}'))->toEql(5);
        expect($aoc->calculate('{{{},{},{{}}}}'))->toEql(16);
        expect($aoc->calculate('{<a>,<a>,<a>,<a>}'))->toEql(1);
        expect($aoc->calculate('{{<ab>},{<ab>},{<ab>},{<ab>}}'))->toEql(9);
        expect($aoc->calculate('{{<!!>},{<!!>},{<!!>},{<!!>}}'))->toEql(9);
        expect($aoc->calculate('{{<a!>},{<a!>},{<a!>},{<ab>}}'))->toEql(3);
    });

    it('Test calculate', function() use ($aoc) {
        expect($aoc->calculateCompact('<>'))->toEql(0);
        expect($aoc->calculateCompact('{}'))->toEql(1);
        expect($aoc->calculateCompact('{{{}}}'))->toEql(6);
        expect($aoc->calculateCompact('{{},{}}'))->toEql(5);
        expect($aoc->calculateCompact('{{{},{},{{}}}}'))->toEql(16);
        expect($aoc->calculateCompact('{<a>,<a>,<a>,<a>}'))->toEql(1);
        expect($aoc->calculateCompact('{{<ab>},{<ab>},{<ab>},{<ab>}}'))->toEql(9);
        expect($aoc->calculateCompact('{{<!!>},{<!!>},{<!!>},{<!!>}}'))->toEql(9);
        expect($aoc->calculateCompact('{{<a!>},{<a!>},{<a!>},{<ab>}}'))->toEql(3);
    });

    it('Test count', function() use ($aoc) {
        expect($aoc->count('<>'))->toEql(0);
        expect($aoc->count('<random characters>'))->toEql(17);
        expect($aoc->count('<<<<>'))->toEql(3);
        expect($aoc->count('<{!>}>'))->toEql(2);
        expect($aoc->count('<!!>'))->toEql(0);
        expect($aoc->count('<!!!>>'))->toEql(0);
        expect($aoc->count('<{o"i!a,<{i<a>'))->toEql(10);
    });
});
