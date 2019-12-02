<?php

$input = explode(',', file_get_contents('../input.txt'));

$input[1] = 12;
$input[2] = 2;

$rounds = 0;

while (true) {
    $opcode     = (int) $input[($rounds * 4)];
    $firstPos   = (int) $input[($rounds * 4) + 1];
    $secondPos  = (int) $input[($rounds * 4) + 2];
    $dest       = (int) $input[($rounds * 4) + 3];

    if (!in_array($opcode, [1, 2, 99])) {
        throw new \Exception('An invalid opcode was encountered.');
    }

    if ($opcode === 99) {
        die(var_dump($input[0]));
    }

    $math = ($opcode === 1) ? 'bcadd' : 'bcmul';

    $input[$dest] = $math($input[$firstPos], $input[$secondPos]);

    $rounds++;
}
