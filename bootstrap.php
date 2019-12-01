<?php

include_once('vendor/autoload.php');

use Illuminate\Support\Collection;

/**
 * Useful helper functions I plan to re-use over the course of the month.
 */
class Helpers
{
    /**
     * Takes a file path and returns it's contents as a Collection.
     *
     * @param  string $path
     * @return Collection
     */
    public static function fileToCollection(string $path): Collection
    {
        return new Collection(file($path));
    }
}
