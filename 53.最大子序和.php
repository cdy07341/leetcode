<?php
/*
 * @lc app=leetcode.cn id=53 lang=php
 *
 * [53] 最大子序和
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        if (empty($nums)) {
            return 0;
        } else if (1 == count($nums)) {
            return $nums[0];
        }
        $sum = -PHP_INT_MAX;
        $tmpSum = 0;
        $len = count($nums);
        
        for ($i=0; $i < $len; $i++) {
            $tmpSum += $nums[$i];
            if ($sum < $tmpSum) {
                $sum = $tmpSum;
            }
            if ($tmpSum < 0) {
                $tmpSum = 0;
            }
        }

        return $sum;
    }
}

$obj = new Solution();
$arr = array(-2,-1);
$res = $obj->maxSubArray($arr);
var_dump($res);