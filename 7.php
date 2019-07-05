<?php
/*
 * @lc app=leetcode.cn id=7 lang=php
 *
 * [7] 整数反转
 */
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        if ($x > pow(2,31) - 1) {
            return 0;
        } else if ($x < -pow(2, 31)) {
            return 0;
        }

        $str = intval(strrev(abs($x)));
        if ($str > pow(2,31) - 1) {
            return 0;
        } else if ($str < -pow(2, 31)) {
            return 0;
        }
        if ($x < 0) {
            $str = '-' . $str;
        }
        //php7 https://stackoverflow.com/questions/30365346/what-is-the-spaceship-operator-in-php-7
        // $str = ($x <=> 0) * $str; 
        return $str;

    }
}

$obj = new Solution();
$str = '1534236469';
echo $obj->reverse($str);