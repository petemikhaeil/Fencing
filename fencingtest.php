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

    public function testcalcrailsNeededMalfornmedString() {
        $fencelength = "hi";
        $result = calcRailsNeeded($fencelength);

        $this->assertEquals("Sorry, Something Has Gone Wrong", $result);
    }

    public function testcalcRailsNeededMincase() {
        $fencelength = 1;
        $result = calcRailsNeeded($fencelength);

        $this->assertEquals(['posts' => 2, 'rails' => 1, 'overshoot' => 0.7], $result);
    }

    public function testlengthOfFenceSuccess() {
        $rails = 5;
        $result = CalcLengthOfFence($rails);

        $this->assertEquals("This number of railings will have a total length of " . 8.1, $result);

    }

    public function testlengthOfFenceHugeInput() {
        $rails = 10000;
        $result = CalcLengthOfFence($rails);

        $this->assertEquals("This number of railings will have a total length of " . 16000.1, $result);
    }

    public function testlengthOfFenceStringInput() {
        $rails = "hi";
        $result = CalcLengthOfFence($rails);

        $this->assertEquals("Sorry, Something Has Gone Wrong", $result);
    }

    public function testrailsNeededStringThingSuccess() {
        $info = ['posts' => 7, 'rails' => 8, 'overshoot' => 1.5];
        $result = railsNeededStringThing($info);
        $expectedResult = "You need " . 8 . " railings and " . 7 . " posts, with a " . 1.5 . " overshoot";

        $this->assertEquals($expectedResult, $result);
    }

    public function testrailsNeededStringThingMalformedInputtingNotAString() {
        $info = 'nocie';
        $result = railsNeededStringThing($info);

        $this->assertEquals("Sorry, Something Has Gone Wrong", $result);
    }

    public function testrailsNeededStringThingForArrayWithWrongKeyOrValues() {
        $info = [1, 2, 3, 4, 5, 6];
        $result = railsNeededStringThing($info);

        $this->assertEquals("Sorry, Something Has Gone Wrong", $result);
    }
}