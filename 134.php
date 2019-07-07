<?php
/**
 * 在一条环路上有 N 个加油站，其中第 i 个加油站有汽油 gas[i] 升。
 * 你有一辆油箱容量无限的的汽车，从第 i 个加油站开往第 i+1 个加油站需要消耗汽油 cost[i] 升。你从其中的一个加油站出发，开始时油箱为空。
 * 如果你可以绕环路行驶一周，则返回出发时加油站的编号，否则返回 -1。
 */
class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        $n = count($gas);
        $total = 0;
        $currentTotal = 0;
        $startStation = 0;

        for ($i = 0; $i < $n; $i++) {
            $total += $gas[$i] - $cost[$i];
            $currentTotal += $gas[$i] - $cost[$i];
            if ($currentTotal < 0) {
                $currentTotal = 0;
                $startStation = $i + 1;
            }
        }

        if ($total < 0) {
            return -1;
        } else {
            return $startStation;
        }
    }
}

$obj = new Solution();
$gas = array(1,2,3,4,5);
$cost = array(3,4,5,1,2);
$res = $obj->canCompleteCircuit($gas, $cost);
var_dump($res);