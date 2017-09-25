<?php
/*
 * Calculates the number of rails needed for a given fence legnth
 *
 * @params fencelength Integer is used to caclulate the number of rails needed
 *
 * @reutnrs an array of numver of posts needed, number of rails needed and the overshoot
 */
function calcRailsNeeded($fenceLength) {
        if(gettype($fenceLength) == 'integer') {
            $fenceLength -= 1.7;
            $rails = 1;
            while ($fenceLength > 0) {
                $fenceLength -= 1.6;
                $rails++;
            }
            $posts = $rails + 1;
            $overshoot = abs($fenceLength);
            $overshoot = round($overshoot, 1);
            $info = ['posts' => $posts, 'rails' => $rails, 'overshoot' => $overshoot];
            return $info;
        } else {
            return "Sorry, Something Has Gone Wrong";
        }
}

/*
 * converts the information of an array into a nice string
 *
 * @params info Array used so the string knows want to print
 *
 * @returns a nice string
 */

function railsNeededStringThing($info) {
    if(gettype($info) == 'array' && array_key_exists('rails', $info) && array_key_exists('posts', $info) && array_key_exists('overshoot', $info) && count($info) == 3) {
        return "You need " . $info['rails'] . " railings and " . $info['posts'] . " posts, with a " . $info['overshoot'] . " overshoot";
        $fenceLength = 0;
    } else {
        return "Sorry, Something Has Gone Wrong";
    }
}

/*
 * Calculates the length of a fence with a given number of railings
 *
 * @params numberOfRailings Integer uses this number to calculate the length of the fence
 *
 * @returns a nice string which states the total length of the fence
 */
function CalcLengthOfFence($numberOfRailings) {
    if(gettype($numberOfRailings) == 'integer') {
        $totalLength = $numberOfRailings * 1.5 + ($numberOfRailings + 1) * 0.1;
        return "This number of railings will have a total length of " . $totalLength;
        $numberOfRailings = 0;
    } else {
        return "Sorry, Something Has Gone Wrong";
    }
}

/*
 * runs the program
 *
 * returns one of the nice strings in the other functions or does nothing (need to fix)
 */
function runProg() {
            $fenceLength = (int)$_POST["fenceLength"];
            if ($fenceLength != 0) {
                $info = calcRailsNeeded($fenceLength);
                return railsNeededStringThing($info);
            }
            $numberOfRailings = (int)$_POST["numberRailings"];
            if ($numberOfRailings != 0) {
                return CalcLengthOfFence($numberOfRailings);
            }
}

echo runProg();


