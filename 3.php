<?php
class Solution {
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        if ($len < 2) {
            return $len;
        }

        $win = array();
        $maxLen = 0;
        $i = 0;
        $j = 0;
        while ($i < $len && $j < $len) {
            if (!in_array($s[$i], $win)) {
                $win[] = $s[$i++];
                $maxLen = max($maxLen, $i - $j);
            } else {
                $j++;
                array_shift($win);
            }
        }

        return $maxLen;
    }
}

$obj = new Solution();
$str = "ddfsfsdfsfsd";
echo $obj->lengthOfLongestSubstring($str);