<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $n = count($nums1);
        $m = count($nums2);
        if ($n > $m) {
            return $this->findMedianSortedArrays($nums2, $nums1);
        }

        $LMax1 = $LMax2 = $RMin1 = $RMin2 = $c1 = $c2 = $lo = 0;
        $hi = 2 * $n;
        while ($lo <= $hi)   //二分
		{
			$c1 = ($lo + $hi) / 2;  //c1是二分的结果
			$c2 = $m + $n - $c1;

			$LMax1 = ($c1 == 0) ? 0 : $nums1[($c1 - 1) / 2];
			$RMin1 = ($c1 == 2 * $n) ? 10000000000 : $nums1[$c1 / 2];
			$LMax2 = ($c2 == 0) ? 0 : $nums2[($c2 - 1) / 2];
			$RMin2 = ($c2 == 2 * $m) ? 10000000000 : $nums2[$c2 / 2];

			if ($LMax1 > $RMin2)
				$hi = $c1 - 1;
			else if ($LMax2 > $RMin1)
				$lo = $c1 + 1;
			else
				break;
		}
		return (max($LMax1, $LMax2) + min($RMin1, $RMin2)) / 2.0;

    }
}

$obj = new Solution();
$nums1 = array(1,2,3,5,9,12,16,18);
$nums2 = array(3,5,7,9,12,14,17);

echo $obj->findMedianSortedArrays($nums1, $nums2);