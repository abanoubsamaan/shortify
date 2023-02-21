<?php

namespace App\Services;

class BaseConversionService
{
    const BASE = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Convert the given base10 number to base62 string
     * @param int $num
     * @return string
     */
    public function base10toBase62(int $num): string
    {
        $b = 62;
        $r = $num % $b;
        $res = self::BASE[$r];
        $q = floor($num / $b);
        while ($q) {
            $r = $q % $b;
            $q = floor($q / $b);
            $res = self::BASE[$r] . $res;
        }
        return $res;
    }

    /**
     * Convert the given base62 string to base10 number
     * @param string $str
     * @return int
     */
    public function base62toBase10(string $str): int
    {
        $b = 62;
        $limit = strlen($str);
        $res = strpos(self::BASE, $str[0]);
        for ($i = 1; $i < $limit; $i++) {
            $res = $b * $res + strpos(self::BASE, $str[$i]);
        }
        return $res;
    }
}
