package main

import "fmt"

func main() {
	a := []int{1, 2, 3, 5, 7, 12}
	b := 12

	c := twoSum(a, b)
	fmt.Println(c)
}

func twoSum(nums []int, target int) []int {
	var result []int
Lable1:
	for i := 0; i < len(nums); i++ {
		for j := i + 1; j < len(nums); j++ {
			if nums[i]+nums[j] == target {
				result = append(result, i)
				result = append(result, j)
				break Lable1
			}
		}
	}

	return result
}
