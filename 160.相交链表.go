/*
 * @lc app=leetcode.cn id=160 lang=golang
 *
 * [160] 相交链表
 */
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func getIntersectionNode(headA, headB *ListNode) *ListNode {
    a := headA
    b := headB
    for a != b {
        if (nil != a) {
            a = a.Next
        } else {
            a = headB
        }
        
        if (nil != b) {
            b = b.Next
        } else {
            b  = headA
        }
     
    }
    
    return a
}

