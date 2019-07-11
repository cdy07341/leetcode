<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}


class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $list = new ListNode(0);
        $cur = $list;
        $carry = 0;
        while (null != $l1 || null != $l2) {
            if (null === $l1) {
                $val1 = 0;
            } else {
                $val1 = $l1->val;
                $l1 = $l1->next;
            }
            
            if (null === $l2) {
                $val2 = 0;
            } else {
                $val2 = $l2->val;
                $l2 = $l2->next;
            }

            $sum = $val1 + $val2 + $carry;
            $carry = intval($sum / 10);
            $sum = $sum % 10;

            $cur->next = new ListNode($sum);
            
            $cur = $cur->next;
            if (null === $l1 && null === $l2) {
                $cur->next = new ListNode($carry);
            }
        }

        return $list->next;
    }
}

$list2 = new ListNode(2);
$list4 = new ListNode(4);
$list3 = new ListNode(3);
$list4->next = $list3;
$list2->next = $list4;

$list5 = new ListNode(5);
$list6 = new ListNode(6);
$list6->next = new ListNode(4);
$list5->next = $list6;

/**
 * list2 2->4->3
 * list5 5->6->4
 */
$obj = new Solution();
$res = $obj->addTwoNumbers($list2, $list5);
var_dump($res);