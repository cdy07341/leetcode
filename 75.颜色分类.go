/*
 * @lc app=leetcode.cn id=75 lang=golang
 *
 * [75] 颜色分类
 */

// @lc code=start
func sortColors(nums []int)  {
	pre, cur, end := 0, 0, len(nums) - 1
	for cur <= end {
		if 2 == nums[cur] {
			nums[cur] = nums[end]
			nums[end] = 2
			end--
		} else if 0 == nums[cur] {
			nums[cur] = nums[pre]
			nums[pre] = 0
			cur++
			pre++
		} else {
			cur++
		}
	}
}
// @lc code=end

