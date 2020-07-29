/*
 * @lc app=leetcode.cn id=53 lang=golang
 *
 * [53] 最大子序和
 */

// @lc code=start
func maxSubArray(nums []int) int {
    if len(nums) == 0 {
		return 0
	}

	maxNum := nums[0]
	curNum := nums[0]
	len := len(nums)

	for i := 1; i < len; i++ {
		if curNum + nums[i] >= nums[i] {
			curNum = curNum + nums[i]
		} else {
			curNum = nums[i]
		}

		if curNum > maxNum {
			maxNum = curNum
		}
	}

	return maxNum
}
// @lc code=end

