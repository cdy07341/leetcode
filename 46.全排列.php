class Solution {
    public $result = array();

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $this->cal($nums, 0);
        return $this->result;
    }
    
    public function cal($arr, $start) {
        $len = count($arr);
        if ($arr[$start] == $arr[$len - 1]) {
            $this->result[] = $arr;
        } else {
            for ($i = $start; $i < $len; $i++) {
                $arr = $this->swap($arr,$start, $i);
                $this->cal($arr, $start + 1);
                $arr = $this->swap($arr,$start, $i);
            }
        }
    }
    
    public function swap($arr, $i, $j) {
        $tmp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $tmp;
        return $arr;
    }
}