package main

import "fmt"

func main() {
	arr := []int{
		1, 8, 9, 6, 20, 30, 25,
	}

	len := len(arr)
	hasChanged := true
	for i := 0; i < len-1 && hasChanged; i++ {
		hasChanged = false
		for j := 0; j < len-1-i; j++ {
			if arr[j] > arr[j+1] {
				arr[j], arr[j+1] = arr[j+1], arr[j]
				hasChanged = true
			}
		}
	}

	fmt.Println(arr)
}
