<?php
/*
 * @lc app=leetcode.cn id=206 lang=php
 *
 * [206] 反转链表
 */
/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution {
    public $res = null;

    /**
     * @param ListNode $l
     * @return ListNode
     */
    function reverseList($l) {
        return $this->reverseListInt($l, null);
    }

    public function reverseListInt($l, $resversRes) {
        if (null == $l) {
            return $resversRes;
        }
        $next = $l->next;
        $l->next = $resversRes;
        return $this->reverseListInt($next, $l);
    }


}

$obj = new Solution();
$listNode1 = new ListNode(1);
$listNode2 = new ListNode(2);
$listNode3 = new ListNode(3);
$listNode4 = new ListNode(4);

$list1 = clone $listNode1;
$list1->next = $listNode2;
$listNode2->next = $listNode4;

$res = $obj->reverseList($list1);
var_dump($res);