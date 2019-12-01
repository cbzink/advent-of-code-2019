<?php

include_once '../../bootstrap.php';

$input = Helpers::fileToCollection('../input.txt');

$solution = $input->map(function ($record) {
    $carry = (int) $record;
    $subtotal = 0;

    while ($carry > 0) {
        $carry = floor($carry / 3) - 2;
        $subtotal += max($carry, 0);
    }

    return $subtotal;
})->sum();

var_dump($solution);
