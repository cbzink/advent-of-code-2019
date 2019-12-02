<?php

$input = explode(',', file_get_contents('../input.txt'));

$input[1] = 12;
$input[2] = 2;

$pointer = 0;
$continue = true;

while ($continue) {
    $operator       = (int) $input[$pointer];
    $firstLocation  = (int) $input[$pointer + 1];
    $secondLocation = (int) $input[$pointer + 2];
    $destination    = (int) $input[$pointer + 3];

    if ($operator === 1) {
        $result = $input[$firstLocation] + $input[$secondLocation];
    } else if ($operator === 2) {
        $result = $input[$firstLocation] * $input[$secondLocation];
    } else if ($operator === 99) {
        $continue = false;
        break;
    } else {
        die('Something went wrong.');
    }

    $input[$destination] = $result;
    $pointer += 4;
}

var_dump($input[0]);
