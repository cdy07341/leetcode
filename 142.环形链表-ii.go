package main

/*
 * @lc app=leetcode.cn id=142 lang=golang
 *
 * [142] 环形链表 II
 */
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func detectCycle(head *ListNode) *ListNode {
	fast, slow := head, head
    for nil != fast && nil != fast.Next {
        slow = slow.Next
        fast = fast.Next.Next
        if (slow == fast) {
            break
        }
    }
    
    if (nil == fast || nil == fast.Next) {
        return nil
    }
        
    for fast = head; fast != slow; fast, slow = fast.Next, slow.Next {}

    return fast
}

