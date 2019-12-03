<?php

$input = explode(PHP_EOL, file_get_contents('../input.txt'));

$firstWire = explode(',', $input[0]);
$secondWire = explode(',', $input[1]);

$fwLoc = [0, 0];
$fwPoints = [];

foreach ($firstWire as $fw) {
    $fwDirection = substr($fw, 0, 1);
    $fwDistance = substr($fw, 1);
  
    switch ($fwDirection) {
        case 'R':
            foreach (range(0, $fwDistance) as $counter) {
                $fwPoints[] = [$fwLoc[0] + $counter, $fwLoc[1]];
            }
            $fwLoc = [$fwLoc[0] + $fwDistance, $fwLoc[1]];
            break;
        case 'L':
            foreach (range(0, $fwDistance) as $counter) {
                $fwPoints[] = [$fwLoc[0] - $counter, $fwLoc[1]];
            }
            $fwLoc = [$fwLoc[0] - $fwDistance, $fwLoc[1]];
            break;
        case 'U':
            foreach (range(0, $fwDistance) as $counter) {
                $fwPoints[] = [$fwLoc[0], $fwLoc[1] + $counter];
            }
            $fwLoc = [$fwLoc[0], $fwLoc[1] + $fwDistance];
            break;
        case 'D':
            foreach (range(0, $fwDistance) as $counter) {
                $fwPoints[] = [$fwLoc[0], $fwLoc[1] - $counter];
            }
            $fwLoc = [$fwLoc[0], $fwLoc[1] - $fwDistance];
        break;
    }

    $fwPoints[] = $fwLoc;
}

$swLoc = [0, 0];
$swPoints = [];

foreach ($secondWire as $sw) {
    $swDirection = substr($sw, 0, 1);
    $swDistance = substr($sw, 1);
  
    switch ($swDirection) {
        case 'R':
            foreach (range(0, $swDistance) as $counter) {
                $swPoints[] = [$swLoc[0] + $counter, $swLoc[1]];
            }
            $swLoc = [$swLoc[0] + $swDistance, $swLoc[1]];
            break;
        case 'L':
            foreach (range(0, $swDistance) as $counter) {
                $swPoints[] = [$swLoc[0] - $counter, $swLoc[1]];
            }
            $swLoc = [$swLoc[0] - $swDistance, $swLoc[1]];
            break;
        case 'U':
            foreach (range(0, $swDistance) as $counter) {
                $swPoints[] = [$swLoc[0], $swLoc[1] + $counter];
            }
            $swLoc = [$swLoc[0], $swLoc[1] + $swDistance];
            break;
        case 'D':
            foreach (range(0, $swDistance) as $counter) {
                $swPoints[] = [$swLoc[0], $swLoc[1] - $counter];
            }
            $swLoc = [$swLoc[0], $swLoc[1] - $swDistance];
        break;
    }
  
    $swPoints[] = $swLoc;
}

$fwCondensed = [];
$swCondensed = [];

foreach ($fwPoints as $point) {
    $fwCondensed[] = $point[0].','.$point[1];
}

foreach ($swPoints as $point) {
    $swCondensed[] = $point[0].','.$point[1];
}

$sharedPoints = array_intersect($fwCondensed, $swCondensed);

$distanceSums = [];

foreach ($sharedPoints as $point) {
    $point = explode(',', $point);

    // Rapidly stolen from https://github.com/jmcastagnetto/Math_Distance/blob/master/src/Math/Distance/Manhattan.php

    $sum = 0;

    for ($i = 0; $i < 2; $i++) {
        $sum += abs(0 - (int) $point[$i]);
    }

    $sums[] = $sum;
}

sort($sums);
var_dump($sums[1]);