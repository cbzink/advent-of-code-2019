<?php

$input = explode(PHP_EOL, file_get_contents('../input.txt'));

$total = 0;

foreach ($input as $record) {
    $total += floor($record / 3) - 2;
}

die(var_dump($total));