<?php

require_once 'src/2016/1/Aoc.php';

describe('Advent of code', function() {
    $aoc = new Aoc();

    it('should calculate distance', function() use ($aoc) {
        expect($aoc->distance([0, 0], [2, 2]))->toBe(4);
    });

    it('should get heading', function() use ($aoc) {
        expect($aoc->getHeading('R'))->toEqual('right');
        expect($aoc->getHeading('R'))->toEqual('down');
        expect($aoc->getHeading('L'))->toEqual('right');
        expect($aoc->getHeading('L'))->toEqual('up');
        expect($aoc->getHeading('L'))->toEqual('left');
    });

    it('should move', function() use ($aoc) {
        $aoc->move('R2');
    });


});