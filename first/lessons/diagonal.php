<?php

//Сортировка двумерного массива

$arr = [
    [11, 7, 14, 6],
    [5,4, 8, 3],
    [12, 15, 1, 10],
    [0, 2, 9, 13]
];
echo '<table border="2px solid black" style="text-align: center; color: green">';
foreach ($arr as $item) {
    echo '<tr>';
    foreach ($item as $value) {
        echo '<td>';
        echo $value;
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';
$count = count($arr)*count($arr);
$point = floor($count / 2);

$minX = 0;
$minY = 0;


for ($i = 0; $i < $count; $i++) {

    $min = $i;
    for ($j = $i; $j < $count; $j++) {
$minNewPos = newPosition($min);
$minJ = newPosition($j);
        if ($arr[$minJ['x']][$minJ['y']] < $arr[$minNewPos['x']][$minNewPos['y']]) {
            $min = $j;
        }
    }


    $minNewPos = newPosition($min);
    $minI = newPosition($i);
    $temp = $arr[$minI['x']][$minI['y']];
    $arr[$minI['x']][$minI['y']] = $arr[$minNewPos['x']][$minNewPos['y']];
   $arr[$minNewPos['x']][$minNewPos['y']] = $temp;
}



function newPosition($i)
{
    global $count;

        $x = floor($i / 4);
        $y = $i % 4;//0

        if (($x+$y) == $i){

        }

        return ['x' => $x,'y' => $y];
}


$arr = [];
$size = 4;
$numbers = 0;
$tempArr = [];

for ($j = 0; $j < $size; $j++) {
    //$arr[$j] = [];
    for ($k = 0; $k < $size; $k++) {
        //$arr[$j][$k] = 0;
    }
}

$a = 0;

for ($d = 0; $d < $size * 2 - 1; $d++) {
    for ($i = 0; $i < $size; $i++) {
        $index = ($d % 2) ? $size - 1 - $i : $i;
        $y = $d - $index;
        if ($y >= 0 && $y < $size) {
            $arr[$index][$y] = $a;
            $tempArr[$a] = [
                'x' => $index,
                'y' => $y
            ];
            $a++;
        }
    }
}