<?php
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
$size = count($arr);


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
function infoCell($n)
{
    global $size;
    $numbersCount = 0;
    $countValues = 0;

    for ($i = 0; $i <= $n; $i++) {
        $numbersCount += $size - abs($size - 1 - $i);
        $countValues = $size - abs($size - 1 - $i);
    }

    $maxValue = $numbersCount - 1;
    $minValue = $numbersCount - $countValues;
    if ($n >= $size) {
        $noOfDiagonal = $size * 2 - 2 - ($maxValue - $minValue);
    } else {
        $noOfDiagonal = $maxValue - $minValue;
    }
    return $arrOfData = ['minValue' => $minValue,
        'maxValue' => $maxValue,
        'numbersCount' => $numbersCount,
        'noOfDiagonal' => $noOfDiagonal];
}

echo '<br>';

function newPosition($arg)//аргумент - номер элемента
{
    global $size;
    $tempArr = [];
    for ($i = 0; $i < $size * 2 - 1; $i++) {
        $temp = infoCell($i);
        if ($arg <= $temp['maxValue']) {

            if ($temp['noOfDiagonal'] > $size - 1) {
                $x = ($temp['maxValue'] - $arg) + ($temp['noOfDiagonal'] - ($size - 1));
            } else {
                $x = $temp['maxValue'] - $arg;
            }
            $y = $temp['noOfDiagonal'] - $x;

            if ($temp['noOfDiagonal'] % 2 !== 0) {
                return ['y' => $y, 'x' => $x];
            } else {
                return ['x' => $y, 'y' => $x];
            }
        }
    }
}

echo '<br />';
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

print_r(NewPosition(8));
