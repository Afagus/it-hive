<?php

$arr = [11, 'value', [1,2,3,[1,2,3,4]], 14, [12, 14, [1, [4], 5]]];
//print_r($arr);

$tab = '';
$limit = 'x';

function likePrintr($var, $limit, $tab = '')
{
    if (is_array($var)) {

            echo "Array\n" . $tab . $tab . "(\n";
            foreach ($var as $key => $value) {
                echo $tab . $tab . "\t";
                $critic = strlen($limit);
                if ($critic == 4){
                    echo 'Too match memory, deep of Array is: ' . $critic;
                    exit;
                };
                echo("[$key] => ");
                likePrintr($value, $limit.'x' ,$tab . "\t");
                echo "\n";



        }
        echo "\n" . $tab . $tab . ')';
    } else {
        echo $var;
    }


}

likePrintr($arr, $limit,$tab);
