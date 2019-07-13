<?php
/**
 * 对称二叉树
 */
class TreeNode {
   public $val = null;
   public $left = null;
   public $right = null;
   function __construct($value) { $this->val = $value; }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        return $this->compare($root->left, $root->right);
    }

    public function compare($left, $right) {
        if (null === $left && $right === null) {
            return true;
        }

        if (null === $left || null === $right) {
            return false;
        }

        return $left->val == $right->val && $this->compare($left->left, $right->right) && $this->compare($left->right, $right->left);
    }

}
$treeNode4 = new TreeNode(4);
$treeNode3 = new TreeNode(3);

$leftTreeNode2 = new TreeNode(2);
$rightTreeNode2 = new TreeNode(2);

$leftTreeNode2->left = $treeNode3;
$leftTreeNode2->right = $treeNode4;

$rightTreeNode2->left = $treeNode4;
$rightTreeNode2->right = $treeNode3;

$root = new TreeNode(1);
$root->left = $leftTreeNode2;
$root->right = $rightTreeNode2;

$obj = new Solution();
$res = $obj->isSymmetric($root);
var_dump($res);
