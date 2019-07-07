<?php

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