<?php
/**
 * 二叉树层次遍历
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
 }
 
 class Solution {
     public $levels = array();
 
     /**
      * @param TreeNode $root
      * @return Boolean
      */
     public function levelOrder($root) {
        if (null === $root) {
            return $this->levels;
        }
        $this->helper($root, 0);
        foreach ($this->levels as $levels) {
            foreach ($levels as $levelsV) {
                echo $levelsV . ' ';
            }
        }

        return $this->levels;
     }

     public  function helper($root, $level) {
        $this->levels[$level][] = $root->val;

        if (null !== $root->left) {
            $this->helper($root->left, $level + 1);
        }

        if (null !== $root->right) {
            $this->helper($root->right, $level + 1);
        }
     }
 }


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
$res = $obj->levelOrder($root);
// var_dump($res);