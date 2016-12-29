<?php

require_once 'src/2015/6/Aoc.php';

use AOC\Aoc2015\Day6\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc(10, 10);

    it('should set  pixel', function() use ($aoc) {
        expect($aoc->getPixel(4, 4))->toEqual(false);
        $aoc->setPixel('on', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(true);
        $aoc->setPixel('off', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(false);
    });

    it('should toggle pixel', function() use ($aoc) {
        expect($aoc->getPixel(4, 4))->toEqual(false);
        $aoc->setPixel('toggle', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(true);
        $aoc->setPixel('toggle', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(false);
    });

    it('should set brightness', function() use ($aoc) {
        expect($aoc->getPixel(4, 4))->toEqual(false);
        $aoc->setPixelBrightness('on', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(1);
        $aoc->setPixelBrightness('on', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(2);
        $aoc->setPixelBrightness('off', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(1);
        $aoc->setPixelBrightness('off', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(0);
        $aoc->setPixelBrightness('off', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(0);
        $aoc->setPixelBrightness('toggle', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(2);
        $aoc->setPixelBrightness('toggle', 4, 4);
        expect($aoc->getPixel(4, 4))->toEqual(4);
    });

    it('should toggle pixel box', function() use ($aoc) {
        $aoc->setBox('on', 2, 2, 4, 4);

        expect($aoc->getPixel(1, 2))->toBeFalse();
        expect($aoc->getPixel(2, 2))->toBeTrue();
        expect($aoc->getPixel(2, 3))->toBeTrue();
        expect($aoc->getPixel(2, 4))->toBeTrue();
        expect($aoc->getPixel(3, 2))->toBeTrue();
        expect($aoc->getPixel(3, 3))->toBeTrue();
        expect($aoc->getPixel(3, 4))->toBeTrue();
        expect($aoc->getPixel(4, 2))->toBeTrue();
        expect($aoc->getPixel(4, 3))->toBeTrue();
        expect($aoc->getPixel(4, 4))->toBeTrue();
        expect($aoc->getPixel(5, 2))->toBeFalse();
        expect($aoc->numberOfLights())->toEqual(9);

        $aoc->setBox('toggle', 3, 2, 3, 3);
        expect($aoc->getPixel(1, 2))->toBeFalse();
        expect($aoc->getPixel(2, 2))->toBeTrue();
        expect($aoc->getPixel(2, 3))->toBeTrue();
        expect($aoc->getPixel(2, 4))->toBeTrue();
        expect($aoc->getPixel(3, 2))->toBeFalse();
        expect($aoc->getPixel(3, 3))->toBeFalse();
        expect($aoc->getPixel(3, 4))->toBeTrue();
        expect($aoc->getPixel(4, 2))->toBeTrue();
        expect($aoc->getPixel(4, 3))->toBeTrue();
        expect($aoc->getPixel(4, 4))->toBeTrue();
        expect($aoc->getPixel(5, 2))->toBeFalse();
        expect($aoc->numberOfLights())->toEqual(7);
    });

    it('should lit pixels', function() use ($aoc) {
        $aoc->litPixels('turn off 2,2 through 4,4');
        $aoc->litPixels('turn on 2,2 through 4,4');
        $aoc->litPixels('toggle 3,2 through 4,4');

        expect($aoc->getPixel(2, 1))->toBeFalse();
        expect($aoc->getPixel(2, 2))->toBeTrue();
        expect($aoc->getPixel(2, 3))->toBeTrue();
        expect($aoc->getPixel(2, 4))->toBeTrue();
        expect($aoc->getPixel(2, 5))->toBeFalse();
        expect($aoc->numberOfLights())->toEqual(3);
    });

    it('should get brightness', function() {
        $aoc = new Aoc(10, 10);
        $aoc->setBoxBrightness('on', 3, 3, 4, 4);
        $aoc->setBoxBrightness('on', 3, 3, 4, 4);
        expect($aoc->totalBrightness())->toEqual(8);
    });

    xit('should run part one', function() {
        $aoc = new Aoc(1000, 1000);
        expect($aoc->run())->toEqual(569999);
    });

    xit('should run part two', function() {
        $aoc = new Aoc(1000, 1000);
        expect($aoc->run(2))->toEqual(17836115);
    });
});