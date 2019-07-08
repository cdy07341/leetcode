<?php
function test($arr) {
    $dp = array();
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $dp[$i] = $arr[$i];
        if (isset($arr[$i + 1])) {
            $dp[$i] += $arr[$i + 1];
        }
        if (isset($arr[$i + 2])) {
            $dp[$i] += $arr[$i + 2];
        }
    }

    $max = 0;
    foreach ($dp as $dpV) {
        if ($dpV > $max) {
            $max = $dpV;
        }
    }

    return $max;
}


$arr = array(1,2,4,1,3);
echo test($arr);