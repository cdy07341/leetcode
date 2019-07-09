<?php
/*
 * @lc app=leetcode.cn id=567 lang=php
 *
 * [567] 字符串的排列
 */
class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {
        //统计s1中每个字符串出现的次数
        $s1Arr = str_split($s1);
        $s2Arr = str_split($s2);
        $s1ArrHash = array();
        foreach ($s1Arr as $s1ArrK => $s1ArrV) {
            if (isset($s1ArrHash[$s1ArrV])) {
                $s1ArrHash[$s1ArrV] += 1;
            } else {
                $s1ArrHash[$s1ArrV] = 1;
            }
        }

        $s1Len = count($s1Arr);
        for ($i = 0; $i < count($s2Arr) - $s1Len + 1; $i++) {
             $snip = array_slice($s2Arr, $i, $s1Len);
             //计算当前区间各个字符串出现的次数
             $tmpSnip = array();
             foreach ($snip as $snipK => $snipV) {
                 if (isset($tmpSnip[$snipV])) {
                     $tmpSnip[$snipV] += 1;
                 } else {
                     $tmpSnip[$snipV] = 1;
                 }
             }

             //查看是否含有s1
             $checkRes = $this->check($s1ArrHash, $tmpSnip);
             if (true === $checkRes) {
                 return true;
             }
        }

        return false;
    }

    public function check($s1ArrHash, $snipArrHash) {
        foreach ($s1ArrHash as $s1ArrHashK => $s1ArrHashV) {
            if (@$snipArrHash[$s1ArrHashK] != $s1ArrHashV) {
                return false;
            }
        }
        return true;
    }
}

$obj = new Solution();
$s1 = 'ab';
$s2 = 'eidboaoo';
$res = $obj->checkInclusion($s1, $s2);
var_dump($res);die;
