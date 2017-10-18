<?php

namespace Neegx\Support\Arr;

use Neegx\Support\Contracts\ArrInterface;

class Arr implements ArrInterface
{
    public static function get($array, $key)
    {
        if (! static::accessible($array)) {
            return NULL;
        }

        if (is_null($key)) {
            return $array;
        }

        if (static::exists($array, $key)) {
            return $array[$key];
        }

        if (strpos($key, '.') === false) {
            return $array[$key] ?? NULL;
        }

        foreach (explode('.', $key) as $segment) {
            if (static::accessible($array) && static::exists($array, $segment)) {
                $array = $array[$segment];
            } else {
                return NULL;
            }
        }

        return $array;
    }

    public static function exists($array, $key)
    {
        if ($array instanceof ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    public static function accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }
}
