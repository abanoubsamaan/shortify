<?php

namespace App\Services;

class BaseConversion
{
    /**
     * Convert the given base10 number to base62 string
     * @param int $num
     * @return string
     */
    public function base10toBase62(int $num): string
    {
        $b = 62;
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $r = $num % $b;
        $res = $base[$r];
        $q = floor($num / $b);
        while ($q) {
            $r = $q % $b;
            $q = floor($q / $b);
            $res = $base[$r] . $res;
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
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $limit = strlen($str);
        $res = strpos($base, $str[0]);
        for ($i = 1; $i < $limit; $i++) {
            $res = $b * $res + strpos($base, $str[$i]);
        }
        return $res;
    }
}
