<?php

//Создание и заполнение массива змейкой по диагоналям (РОбот)

$arr = [];
$size = 4;
$tempArr = [];

for ($j = 0; $j < $size; $j++) {
    $arr[$j] = [];
    for ($k = 0; $k < $size; $k++) {
        $arr[$j][$k] = 0;
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