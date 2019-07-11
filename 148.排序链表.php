<?php
/*
 * @lc app=leetcode.cn id=148 lang=php
 *
 * [148] 排序链表
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
     * @param ListNode $head
     * @return ListNode
     */
    function sortList($head) {
        if (null === $head || null === $head->next) {
            return $head;
        }

        $midNode = $this->getMidNode($head);

        $right = $this->sortList($midNode->next);
        $midNode->next = null;
        $left = $this->sortList($head);

        $result = $this->mergeList($left, $right);

        return $result;
    }

    public function mergeList($left, $right) {
        $tmpLeft = $left;
        $tmpRight = $right;

        $result = new ListNode(0);
        $tmp = $result;

        while (null != $tmpLeft && null != $tmpRight) {
            while (null != $tmpLeft && $tmpLeft->val <= $tmpRight->val) {
                $tmp->next = new ListNode($tmpLeft->val);
                $tmp = $tmp->next;
                $tmpLeft = $tmpLeft->next;
            }
    
            while (null != $tmpLeft && null != $tmpRight && $tmpLeft->val >= $tmpRight->val) {
                $tmp->next = new ListNode($tmpRight->val);
                $tmp = $tmp->next;
                $tmpRight = $tmpRight->next;
            }
    
        }

        if (null != $tmpLeft) {
            $tmp->next = $tmpLeft;
        }
        if (null != $tmpRight) {
            $tmp->next = $tmpRight;
        }

        return $result->next;
    }

    /**
     * find middle node
     */
    public function getMidNode($head) {
        $slow = $head;
        $fast = $head->next;

        while (null != $fast && null != $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }
}

$obj = new Solution();
$list1 = new ListNode(4);
$list1->next = new ListNode(2);
$list1->next->next = new ListNode(1);
$list1->next->next->next = new ListNode(3);

$res = $obj->sortList($list1);
var_dump($res);die;

