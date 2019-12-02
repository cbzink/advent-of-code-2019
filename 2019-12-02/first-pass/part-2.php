<?php

$input = explode(',', file_get_contents('input.txt'));

$input[1] = 12;
$input[2] = 2;

foreach (range(0, 99) as $noun) {
    foreach (range(0, 99) as $verb) {
        $copiedInput = $input;

        $copiedInput[1] = $noun;
        $copiedInput[2] = $verb;

        $pointer = 0;
        $continue = true;

        while ($continue) {
            $operator       = (int) $copiedInput[$pointer];
            $firstLocation  = (int) $copiedInput[$pointer + 1];
            $secondLocation = (int) $copiedInput[$pointer + 2];
            $destination    = (int) $copiedInput[$pointer + 3];

            if ($operator === 1) {
                $result = $copiedInput[$firstLocation] + $copiedInput[$secondLocation];
            } else if ($operator === 2) {
                $result = $copiedInput[$firstLocation] * $copiedInput[$secondLocation];
            } else if ($operator === 99) {
                $continue = false;
                break;
            } else {
                die('Something went wrong.');
            }

            $copiedInput[$destination] = $result;
            $pointer += 4;
        }

        if ($copiedInput[0] === 19690720) {
            die(var_dump(100 * $noun + $verb));
        }
    }
}
