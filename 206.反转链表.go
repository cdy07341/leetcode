/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
 func reverseList(head *ListNode) *ListNode {
	 //非递归
    // if nil == head {
	// 	return nil
	// }

	// curr := head
	// var pre *ListNode
	// for curr != nil {
	// 	next := curr.Next
	// 	curr.Next = pre
	// 	pre = curr
	// 	curr = next
	// }
	// return pre

	//递归
	if nil == head || nil == head.Next {
		return head
	}

	newHead := reverseList(head.Next)
	head.Next.Next = head
	head.Next = nil

	return newHead
} 