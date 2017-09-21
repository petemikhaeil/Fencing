<?php

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
            return 0;
        }
}

function railsNeeded($info) {
    if(gettype($info) == 'array' && array_key_exists('rails', $info) && array_key_exists('posts', $info) && array_key_exists('overshoot', $info) && count($info) == 3) {
        return "You need " . $info['rails'] . " railings and " . $info['posts'] . " posts, with a " . $info['overshoot'] . " overshoot";
        $fenceLength = 0;
    } else {
        return 0;
    }
}

function lengthOfFence($numberOfRailings) {
    if(gettype($numberOfRailings) == 'integer') {
        $totalLength = $numberOfRailings * 1.5 + ($numberOfRailings + 1) * 0.1;
        return "This number of railings will have a total length of " . $totalLength;
        $numberOfRailings = 0;
    } else {
        return 0;
    }
}

function runProg() {
    if(isset($_POST)) {
        $fenceLength = (int)$_POST["fenceLength"];
        if ($fenceLength != 0) {
            $info = calcRailsNeeded($fenceLength);
            return railsNeeded($info);
        }
        $numberOfRailings = (int)$_POST["numberRailings"];
        if($numberOfRailings != 0) {
            return lengthOfFence($numberOfRailings);
        }
    }
    else {
        return "Please enter a value";
    }
}

echo runProg();


