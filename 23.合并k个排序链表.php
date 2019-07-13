/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        if (empty($lists)) {
            return array();
        }
        
        return $this->merges($lists, 0, count($lists) - 1);
    }
    
    public function merges($lists, $left, $right) {
        if ($left == $right) {
            return $lists[$left];
        }
        $mid = intval($left + ($right - $left) / 2);
        $l1 = $this->merges($lists, $left, $mid);
        $l2 = $this->merges($lists, $mid + 1, $right);
        return $this->mergeTwoLists($l1, $l2);
    }
    
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $mergedList = new ListNode(0);
        $cur = $mergedList;
        while (null != $l1 || null != $l2) {
            if (null == $l2) {
                $cur->next = $l1;
                $l1 = null;
                continue;
            }
            if (null == $l1) {
                $cur->next = $l2;
                $l2 = null;
                continue;
            }

            if ($l1->val <= $l2->val) {
                $cur->next = $l1;
                $l1 = $l1->next;
            } else {
                $cur->next = $l2;
                $l2 = $l2->next;
            }
            $cur = $cur->next;
        }

        return $mergedList->next;
    }
}