<?php

include_once '../../bootstrap.php';

$input = Helpers::fileToCollection('../input.txt');

$solution = $input->map(function ($record) {
    return floor((int) $record / 3) - 2;
})->sum();

var_dump($solution);
