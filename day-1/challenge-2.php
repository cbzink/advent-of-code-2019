<?php

$input = explode(PHP_EOL, file_get_contents('input.txt'));

$total = 0;

foreach($input as $record) {
    $remainder = $record;
    $subtotal = 0;

    while(true) {
        $result = floor($remainder / 3) - 2;

        if ($result <= 0) {
            break;
        }

        $remainder = $result;
        $subtotal += $result;
    }

    $total += $subtotal;
}

die(var_dump($total));