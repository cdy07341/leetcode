package main

import "fmt"

func main() {
	arr := []int{
		18, 60, 10, 8, 20, 9, 17, 30, 27, 3, 50,
	}
	for i := 1; i < len(arr); i++ {
		for j := i - 1; j >= 0 && arr[j] > arr[j+1]; j-- {
			arr[j+1], arr[j] = arr[j], arr[j+1]
		}
	}

	fmt.Println(arr)
}
