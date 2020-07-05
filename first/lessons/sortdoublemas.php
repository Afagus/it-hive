<?php

//Сортировка двумерного массива

$arr = [
    [11, 7, 14, 6],
    [5, 4, 8, 3],
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
$count = count($arr) * count($arr);
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


echo '<br>';
function newPosition($i)
{
    $x = floor($i / 4);
    $y = $i % 4;
    return ['x' => $x, 'y' => $y];
}

echo '<table border="2px solid black" style="text-align: center; color: red">';
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