<?php
/**
 * 题目
 *   本题来自今天头条的笔试：
 *   有一个n边形(P0, P1, ..., Pn)， 每一条边皆为垂直或水平线段。现给定数值k，以P0为起点将n边形的周长分为k段，每段的长度相等，请打印出k等分点的坐标(T0, T1, ..., Tk）的坐标。
 * 分析
 *  1、可以计算出从第0个点，到第N个点的总距离，作为该点的一个属性保存。
 *  2、那么第0个点的总距离即为该多版型周长
 *  3、求出等分后每一段的长度d，那么等分的点到第0个点的距离肯定为d的整倍数。列举出d小于周长的整倍数。
 *  4、遍历判断d整倍数所在的边。根据边的两个节点的大小关系，打印之。
 */
class Point {
    public $x = 0;
    public $y = 0;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
}

class Solution {
    public function division() {
        //构造多边形
        $arr = array();
        $arr[] = new Point(1, 1);
        $arr[] = new Point(1, 3);
        $arr[] = new Point(5, 3);
        $arr[] = new Point(5, 5);
        $arr[] = new Point(10, 5);
        $arr[] = new Point(10, 1);
        $arr[] = new Point(1, 1);

        $distance = 0;
        //计算
        foreach ($arr as $arrK => $arrV) {
            if (0 == $arrK) {
                $arr[$arrK]->distance = 0;
                continue;
            }
            $distance += $this->getDistance($arr[$arrK - 1], $arrV);
            $arr[$arrK]->distance = $distance;//从0点到当前的距离
        }

        $division = 13;
        $long = $distance / $division;

        $pointIndex = 1;
        for ($i=0; $i < $division; $i++) {
            $currentDistance = ($i + 1) * $long;//到当前的长度
            for ($j = $pointIndex; $j < count($arr); $j++) {
                if ($arr[$j]->distance >= $currentDistance) {
                    $diff = $arr[$j]->distance - $currentDistance;
                    if ($arr[$j]->x == $arr[$j - 1]->x)  { //水平线
                        if ($arr[$j]->y > $arr[$j - 1]->y) {
                            echo 'X:' . $arr[$j]->x . '---Y:' . ($arr[$j]->y - $diff) . PHP_EOL;
                        } else {
                            echo 'X:' . $arr[$j]->x . '---Y:' . ($arr[$j]->y + $diff) . PHP_EOL;
                        }
                    } else if ($arr[$j]->y == $arr[$j - 1]->y) { //垂直线
                        if ($arr[$j]->x > $arr[$j - 1]->x) {
                            echo 'X:' . ($arr[$j]->x - $diff) . '---Y:' . $arr[$j]->y . PHP_EOL;
                        } else {
                            echo 'X:' . ($arr[$j]->x + $diff) . '---Y:' . $arr[$j]->y . PHP_EOL;
                        }
                    }
                    $pointIndex = $j;
                    break;
                }
            }
        }

    }

    /**
     * 计算两个点之间的距离
     */
    public function getDistance($pointA, $pointB) {
        return pow(pow($pointA->x - $pointB->x, 2) + pow($pointA->y - $pointB->y, 2), 0.5);
    }
}

$obj = new Solution();
$obj->division();