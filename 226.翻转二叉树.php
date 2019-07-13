/*
 * @lc app=leetcode.cn id=226 lang=php
 *
 * [226] 翻转二叉树
 */
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if (null === $root) {
            return null;
        }
        $tmp = $root->left;
        $root->left = $root->right;
        $root->right = $tmp;
        
        $right = $root->right;
        $left = $root->left;
        $this->invertTree($right);
        $this->invertTree($left);
        
        return $root;
    }
}

