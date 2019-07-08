<?php
/**
 * 全排序
 * 字符串全排列是一道常见的算法题，例如字符串"abc"的全排列是"abc"、"acb"、"bac"、"bca"、"cab"、"cba"
 */
$str = 'abcd';
$a =str_split($str);
$res = perm($a, 0, count($a)-1);

function perm($arr, $start, $end) {
    if ($start == $end ) {
        echo implode('' , $arr) . PHP_EOL;
    } else {
        for ($i = $start; $i <= $end; $i++) {
            $arr = swap($arr, $start, $i);
            perm($arr, $start + 1, $end);
            $arr = swap($arr, $start, $i);
        }
    }
}

function swap($arr, $i, $k) {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$k];
    $arr[$k] = $tmp;
    return $arr;
}


