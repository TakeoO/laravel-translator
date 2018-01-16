<?php

namespace Takeoo\Translator\StdLib;


use Illuminate\Support\Arr as IlluminateArr;

/**
 * Class Arr
 * @package Takeoo\Translator\StdLib
 */
class Arr extends IlluminateArr
{
    /**
     * Indexes multiple arrays by provided index
     * (appends on double index - always returning array of arrays)
     *
     * @param array $array
     * @param string $index
     * @return array
     */
    public static function getMultiIndexed(array $array, string $index)
    {
        $indexedArray = [];

        foreach ($array as $arr) {
            if (!$arr[$index] ?? null)
                continue;

            if (!array_key_exists($index, $indexedArray))
                $indexedArray[$index] = [];

            $indexedArray[$index][] = $arr;
        }

        return $indexedArray;
    }

    /**
     * Indexes array by provided index
     * (overwrites on double index)
     *
     * @param array $array
     * @param string $index
     * @return array
     */
    public function getIndexed(array $array, string $index)
    {
        $indexedArray = [];

        foreach ($array as $arr) {
            if (!$arr[$index] ?? null)
                continue;

            $indexedArray[$index] = $arr;
        }

        return $indexedArray;
    }
}