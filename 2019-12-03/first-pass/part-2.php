<?php

$input = explode(PHP_EOL, file_get_contents('../input.txt'));

$firstWire = explode(',', $input[0]);
$secondWire = explode(',', $input[1]);

$fwLoc = [0, 0];
$fwPoints = [];
$fwDistTravel = 0;

foreach ($firstWire as $wire) {
    $direction = substr($wire, 0, 1);
    $distance = (int) substr($wire, 1);

    switch ($direction) {
        case 'R':
            foreach (range(0, $distance - 1) as $i) {
                $fwPoints[] = [++$fwLoc[0], $fwLoc[1], ++$fwDistTravel];
            } 
            break;
        case 'L':
            foreach (range(0, $distance - 1) as $i) {
                $fwPoints[] = [--$fwLoc[0], $fwLoc[1], ++$fwDistTravel];
            }
            break;
        case 'U':
            foreach (range(0, $distance - 1) as $i) {
                $fwPoints[] = [$fwLoc[0], ++$fwLoc[1], ++$fwDistTravel];
            } 
            break;
        case 'D':
            foreach (range(0, $distance - 1) as $i) {
                $fwPoints[] = [$fwLoc[0], --$fwLoc[1], ++$fwDistTravel];
            } 
            break;
    }
}

$swLoc = [0, 0];
$swPoints = [];
$swDistTravel = 0;

foreach ($secondWire as $wire) {
    $direction = substr($wire, 0, 1);
    $distance = (int) substr($wire, 1);

    switch ($direction) {
        case 'R':
            foreach (range(0, $distance - 1) as $i) {
                $swPoints[] = [++$swLoc[0], $swLoc[1], ++$swDistTravel];
            } 
            break;
        case 'L':
            foreach (range(0, $distance - 1) as $i) {
                $swPoints[] = [--$swLoc[0], $swLoc[1], ++$swDistTravel];
            } 
            break;
        case 'U':
            foreach (range(0, $distance - 1) as $i) {
                $swPoints[] = [$swLoc[0], ++$swLoc[1], ++$swDistTravel];
            }
            break;
        case 'D':
            foreach (range(0, $distance - 1) as $i) {
                $swPoints[] = [$swLoc[0], --$swLoc[1], ++$swDistTravel];
            } 
            break;
    }
}

$fwForCompare = [];
$swForCompare = [];

foreach ($fwPoints as $point) {
    $fwForCompare[] = $point[0].','.$point[1];
}

foreach ($swPoints as $point) {
    $swForCompare[] = $point[0].','.$point[1];
}

$meetingPoints = array_intersect($fwForCompare, $swForCompare);

$matchingTravelDists = [];

foreach ($meetingPoints as $point) {
    $point = explode(',', $point);
    $x = (int) $point[0];
    $y = (int) $point[1];

    $fwDist = 0;

    foreach ($fwPoints as $fwPoint) {
        if ($fwPoint[0] === $x && $fwPoint[1] === $y) {
            $fwDist = $fwPoint[2];
            break;
        }
    }

    $swDist = 0;

    foreach ($swPoints as $swPoint) {
        if ($swPoint[0] === $x && $swPoint[1] === $y) {
            $swDist = $swPoint[2];
            break;
        }
    }

    $matchingTravelDists[] = $fwDist + $swDist;
}

sort($matchingTravelDists);
var_dump($matchingTravelDists[0]);