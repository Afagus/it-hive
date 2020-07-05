<?php

$point_A = ['x' => 5, 'y' => 7];
$point_B = ['x' => 7, 'y' => 9];
$point_C = ['x' => 7, 'y' => 7];
$point_X = ['x' => 6, 'y' => 7.5];

//Большой треугольник
$line_AB = line_lenght($point_B['x'], $point_A['x'], $point_B['y'], $point_A['y']);
$line_BC = line_lenght($point_C['x'], $point_B['x'], $point_C['y'], $point_B['y']);
$line_AC = line_lenght($point_C['x'], $point_A['x'], $point_C['y'], $point_A['y']);
$area_ABC = round(area($line_AB, $line_BC, $line_AC), 2);

//Треугольник 1
$line_AX = line_lenght($point_X['x'], $point_A['x'], $point_X['y'], $point_A['y']);
$line_XC = line_lenght($point_C['x'], $point_X['x'], $point_C['y'], $point_X['y']);
$area_AXC = area($line_AX, $line_XC, $line_AC);

//Треугольник 2
$line_XB = line_lenght($point_B['x'], $point_X['x'], $point_B['y'], $point_X['y']);
$area_CXB = area($line_XC, $line_XB, $line_BC);

//Треугольник 3
$area_AXB = area($line_AX, $line_XB, $line_AB);

$sum_of_triangle = round(($area_AXC + $area_CXB + $area_AXB), 2);


echo 'Длина стороны AB = ' . $line_AB;
echo '<br />';
echo 'Длина стороны BC = ' . $line_BC;
echo '<br />';
echo 'Длина стороны AC = ' . $line_AC;
echo '<br />';

echo '<br />';
echo 'Площадь треугольника ABC = ' . $area_ABC;
echo '<br />';
echo 'Площадь треугольника AXC = ' . $area_AXC;
echo '<br />';
echo 'Площадь треугольника CXB = ' . $area_CXB;
echo '<br />';
echo 'Площадь треугольника AXB = ' . $area_AXB;
echo '<br />';
echo 'Сумма площадей треугольников = ' . $sum_of_triangle;
echo '<br />';
echo '<br />';
echo '<br />';


if ($area_ABC == $sum_of_triangle){
    echo '<b>';
    echo 'Точка попадает в треугольник';
    echo '</b>';
}else{
    echo '<b>';
    echo 'Точка не попадает в треугольник';
    echo '</b>';
}

function line_lenght ($x2, $x1, $y2, $y1){
    return sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));
};

function area($line_1, $line_2, $line_3 ){
    $p = ($line_1 + $line_2 + $line_3)/2;
    return sqrt($p*($p - $line_1) * ($p - $line_2) * ($p - $line_3));
};
