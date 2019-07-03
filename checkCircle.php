<?php
/**
 * 判断链表是否有环
 */
class ListNode {
    public $next = null;
    public $val = '';

    public function __construct($val) {
        $this->val = $val;
    }
}


function detectCircle($node) {
    $now = $node->next;
    $next = $node->next->next;
    while ($now !== null && $next !== null) {
        if ($now === $next) {
            return true;
        }
        $now = $now->next;
        $next = $next->next->next;
    }

    return false;
}


$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);
$node6 = new ListNode(6);
$node7 = new ListNode(7);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$node6->next = $node7;
$node7->next = $node2;

$checkRes = detectCircle($node1);
var_dump($checkRes);