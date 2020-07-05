<?php
$var = 0;
$time = 21;
function rabbitFibonacci($n)
{
    global $var;
    $var += 15;
    if (!$n) {
        return (null);
    } else {
        if ($n <= 1) {
            return 1;
        } elseif ($n == 2) {
            return 2;
        }
        return rabbitFibonacci($n - 1) + rabbitFibonacci($n - 2);
    }

}

echo 'Кроликов ' . rabbitFibonacci($time) . ' пар';
echo '<br>';
echo 'Байт ' . $var;
echo '<br>';
echo '-------------------------------------------------------------------';
echo '<br>';


$counter = 0;
$arr = [];
$len = count($arr);
while ($time != $counter++) {

       if ($counter <= 2){
        $arr[$counter] = $counter;
    }else{
        $arr[$counter] = $arr[$counter-1] + $arr[$counter-2];
    }
}
$len = count($arr);
echo $arr[$len];



