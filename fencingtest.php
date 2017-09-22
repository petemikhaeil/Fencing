<?php

use PHPUnit\Framework\TestCase;

require('fencing.php');

class StackTest extends TestCase {

    public function testcalcRailsNeeded() {
        $fencelength = 7;
        $result = calcRailsNeeded($fencelength);

        $this->assertEquals(['posts' => 6, 'rails' => 5, 'overshoot' => 1.1], $result);
    }

    public function testcalcRailsNeededFailureBigNumber() {
        $fencelength = 10000;
        $result = calcRailsNeeded($fencelength);

        $this->assertEquals(['posts' => 6251, 'rails' => 6250, 'overshoot' => 0.1], $result);
    }

    public function testcalrailsNeededMalfornmedString() {
        $fencelength = "hi";
        $result = calcRailsNeeded($fencelength);

        $this->assertEquals(0, $result);
    }

    public function testlengthOfFenceSuccess() {
        $rails = 5;
        $result = lengthOfFence($rails);

        $this->assertEquals("This number of railings will have a total length of " . 8.1, $result);

    }

    public function testlengthOfFenceHugeInput() {
        $rails = 10000;
        $result = lengthOfFence($rails);

        $this->assertEquals("This number of railings will have a total length of " . 16000.1, $result);
    }

    public function testlengthOfFenceStringInput() {
        $rails = "hi";
        $result = lengthOfFence($rails);

        $this->assertEquals(0, $result);
    }

    public function testrailsNeededSuccess() {
        $info = ['posts' => 7, 'rails' => 8, 'overshoot' => 1.5];
        $result = railsNeeded($info);
        $expectedResult = "You need " . 8 . " railings and " . 7 . " posts, with a " . 1.5 . " overshoot";

        $this->assertEquals($expectedResult, $result);
    }

    public function testRailsMalformedInputtingNotAString() {
        $info = 'douche';
        $result = railsNeeded($info);

        $this->assertEquals(0, $result);
    }

    public function testrailsNeededForArrayWithWrongKeyOrValues() {
        $info = [1, 2, 3, 4, 5, 6];
        $result = railsNeeded($info);

        $this->assertEquals(0, $result);
    }
}