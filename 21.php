<?php
/*
 * @lc app=leetcode.cn id=21 lang=php
 *
 * [21] 合并两个有序链表
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

$obj = new Solution();
$listNode1 = new ListNode(1);
$listNode2 = new ListNode(2);
$listNode3 = new ListNode(3);
$listNode4 = new ListNode(4);

$list1 = clone $listNode1;
// $list1->next = $listNode2;
// $listNode2->next = $listNode4;

$list2 = clone $listNode1;
$list2->next = $listNode3;
$listNode3->next = $listNode4;

$list2 = null;
$res = $obj->mergeTwoLists($list1, $list2);
var_dump($res);