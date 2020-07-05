<?php

//Сортировка от центра

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$count = count($arr);

for ($i = 0; $i < $count; $i++) {

    $min = $i;
    for ($j = $i; $j < $count; $j++) {

        if ($arr[change($j)] < $arr[change($min)]) {
            $min = $j;
        }
    }
    $temp = $arr[change($i)];
    $arr[change($i)] = $arr[change($min)];
    $arr[change($min)] = $temp;
}
echo '<pre>';
print_r($arr);
echo '</pre>';

function change($i)
{
    global $count;
    $centr = floor(($count) / 2);
    if ($i % 2 !== 0) {
        return $centr - ceil($i / 2);
    } else
        return $centr + ceil($i / 2);
}