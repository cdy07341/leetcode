<?php
/**
 * 二叉树的两个节点之间的最短路径
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
 }

class Solution {
    public function lowestCommonAncestor($root, $p, $q) {
        if ($root == $p || $root == $q || null === $root) {
            return $root;
        }

        $l = $this->lowestCommonAncestor($root->left, $p, $q);
        $r = $this->lowestCommonAncestor($root->right, $p, $q);

        if (null !== $l && null !== $r) {
            return $root;
        } else if (null !== $l) {
            return $l;
        } else if (null !== $r) {
            return $r;
        }
        return null;
    }

    public function getMinDistance($root, $treeNode5, $treeNode4) {
        $father = $this->lowestCommonAncestor($root, $treeNode5, $treeNode4);
        $node5Distance = $this->getDistance($father, $treeNode5);
        $node4Distance = $this->getDistance($father, $treeNode4);

        return $node4Distance + $node5Distance;
    }

    /**
     * 获取到父节点的距离
     */
    public function getDistance($root, $son) {
        if (null === $root) {
            return -1;
        }
        if ($son == $root) {
            return 0;
        }

        $level = $this->getDistance($root->left, $son);
        if (-1 == $level) {
            $level = $this->getDistance($root->right, $son);
        }
        if (-1 != $level) {
            $level += 1;
            return $level;
        }

        return -1;
    }
}

/**
 *              8
 *      10               6
 *   5     4          3    2
 *  
 */
$treeNode4 = new TreeNode(4);
$treeNode5 = new TreeNode(5);
$treeNode3 = new TreeNode(3);
$treeNode2 = new TreeNode(2);

$leftTreeNode2 = new TreeNode(10);
$rightTreeNode2 = new TreeNode(6);

$leftTreeNode2->left = $treeNode5;
$leftTreeNode2->right = $treeNode4;

$rightTreeNode2->left = $treeNode3;
$rightTreeNode2->right = $treeNode2;

$root = new TreeNode(8);
$root->left = $leftTreeNode2;
$root->right = $rightTreeNode2;

$obj = new Solution();
$res = $obj->getMinDistance($root, $treeNode5, $treeNode3);
var_dump($res);