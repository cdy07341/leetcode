<?php
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
     function getImage($root) {
        if (null === $root) {
        return null;
        }
        $left = $root->left;
        $root->left = $root->right;
        $root->right = $left;
        $this->getImage($root->left);
        $this->getImage($root->right);
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
$res = $obj->getImage($root);
var_dump($root);