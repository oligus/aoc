<?php

require_once 'src/2015/5/Aoc.php';

use AOC\Aoc2015\Day5\Aoc;

describe('Advent of code', function() {
    $aoc = new Aoc();

    // It contains at least three vowels (aeiou only), like aei, xazegov, or aeiouaeiouaeiou.
    it('should have vowels', function() use ($aoc) {
        expect($aoc->hasVowels('aei'))->toBeTrue();
        expect($aoc->hasVowels('xazegov'))->toBeTrue();
        expect($aoc->hasVowels('xazegov', 4))->toBeFalse();
        expect($aoc->hasVowels('aeiouaeiouaeiou'))->toBeTrue();
    });

    it('should have double letters', function() use ($aoc) {
        expect($aoc->hasDoubleLetter('xx'))->toBeTrue();
        expect($aoc->hasDoubleLetter('abcdde'))->toBeTrue();
        expect($aoc->hasDoubleLetter('abcded'))->toBeFalse();
    });

    it('should have illegal letters', function() use ($aoc) {
        expect($aoc->hasIllegalLetter('ab'))->toBeTrue();
        expect($aoc->hasIllegalLetter('aabbccdd'))->toBeTrue();
        expect($aoc->hasIllegalLetter('haegwjzuvuyypxyu'))->toBeTrue();
        expect($aoc->hasIllegalLetter('haegwjzuvuyypxu'))->toBeFalse();
    });

    it('should have two of the same letters', function() use ($aoc) {
        expect($aoc->hasTwoSameLetters('xyxy'))->toBeTrue();
        expect($aoc->hasTwoSameLetters('xywwwxy'))->toBeTrue();
        expect($aoc->hasTwoSameLetters('xywwwxx'))->toBeFalse();
    });

    it('should have one between letters', function() use ($aoc) {
        expect($aoc->hasOneBetweenLetter('xyx'))->toBeTrue();
        expect($aoc->hasOneBetweenLetter('abcdefeghi'))->toBeTrue();
        expect($aoc->hasOneBetweenLetter('efe'))->toBeTrue();
        expect($aoc->hasOneBetweenLetter('aaa'))->toBeTrue();
        expect($aoc->hasOneBetweenLetter('efre'))->toBeFalse();
    });

    it('should check if string is nice', function() use ($aoc) {
        expect($aoc->isNiceString('ugknbfddgicrmopn'))->toBeTrue();
        expect($aoc->isNiceString('aaa'))->toBeTrue();
        expect($aoc->isNiceString('jchzalrnumimnmhp'))->toBeFalse();
        expect($aoc->isNiceString('haegwjzuvuyypxyu'))->toBeFalse();
        expect($aoc->isNiceString('dvszwmarrgswjxmb'))->toBeFalse();
    });

    it('should check if string is nice 2', function() use ($aoc) {
        expect($aoc->isNiceString2('qjhvhtzxzqqjkmpb'))->toBeTrue();
        expect($aoc->isNiceString2('xxyxx'))->toBeTrue();
        expect($aoc->isNiceString2('uurcxstgmygtbstg'))->toBeFalse();
        expect($aoc->isNiceString2('ieodomkazucvgmuy'))->toBeFalse();
    });

    it('should run', function() use ($aoc) {
        expect($aoc->run())->toEqual(258);
        expect($aoc->run(2))->toEqual(53);
    });
});