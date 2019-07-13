/*
 * @lc app=leetcode.cn id=103 lang=php
 *
 * [103] 二叉树的锯齿形层次遍历
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
    public $levels = array();

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root) {
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
         if (0 == $level % 2) {
             $this->levels[$level][] = $root->val;
         } else {
            if (!isset($this->levels[$level])) {
                $this->levels[$level] = array();
             }
             array_unshift($this->levels[$level], $root->val);
         }

        if (null !== $root->left) {
            $this->helper($root->left, $level + 1);
        }

        if (null !== $root->right) {
            $this->helper($root->right, $level + 1);
        }
     }
}

