<?php
$result = [];
$r=0;

for ($a = 1; $a <= 8; $a++) {
    $ag = 0 - $a;
    $ab = 0 + $a;
    for ($b = 1; $b <= 8; $b++) {

        $bg = 1 - $b;
        $bb = 1 + $b;
        if ($b == $a || $bg == $ag || $bb == $ab){
            continue;
        }
        for ($c = 1; $c <= 8; $c++) {
            $cg = 2 - $c;
            $cb = 2 + $c;
            if ($c == $b || $c == $a ||
                $cg == $bg || $cb == $bb
            || $cg == $ag || $cb == $ab){
                continue;
            }

            for ($d = 1; $d <= 8; $d++) {
                $dg = 3 - $d;
                $db = 3 + $d;
                if ($d == $a || $d == $b || $d == $c ||
                    $dg == $cg || $db == $cb ||
                    $dg == $bg || $db == $bb ||
                    $dg == $ag || $db == $ab)
                {
                    continue;
                }

                for ($e = 1; $e <= 8; $e++) {
                    $eg = 4 - $e;
                    $eb = 4 + $e;
                    if ($e == $a || $e == $b || $e == $c || $e == $d  ||
                        $eg == $dg || $eb == $db ||
                        $eg == $cg || $eb == $cb ||
                        $eg == $bg || $eb == $bb ||
                        $eg == $ag || $eb == $ab)
                    {
                        continue;
                    }

                    for ($f = 1; $f <= 8; $f++) {
                        $fg = 5 - $f;
                        $fb = 5 + $f;
                        if ($f == $a || $f == $b || $f == $c || $f == $d ||$f == $e ||
                            $fg == $eg || $fb == $eb||
                            $fg == $dg || $fb == $db||
                            $fg == $cg || $fb == $cb ||
                            $fg == $bg || $fb == $bb ||
                            $fg == $ag || $fb == $ab){
                            continue;
                        }

                        for ($g = 1; $g <= 8; $g++) {
                            $gg = 6 - $g;
                            $gb = 6 + $g;
                            if ($g == $a || $g == $b || $g == $c || $g == $d ||$g == $e || $e == $f || $g == $f ||
                                $gg == $fg || $gb == $fb ||
                                $gg == $eg || $gb == $eb ||
                                $gg == $dg || $gb == $db ||
                                $gg == $cg || $gb == $cb ||
                                $gg == $bg || $gb == $bb ||
                                $gg == $ag || $gb == $ab)
                            {
                                continue;
                            }

                            for ($h = 1; $h <= 8; $h++) {
                                $hg = 7 - $h;
                                $hb = 7 + $h;
                                if ($h == $a || $h == $b || $h == $c || $h == $d ||$h == $e || $h == $f || $h == $f ||$h == $g ||
                                $hg == $gg || $hb == $gb ||
                                $hg == $fg || $hb == $fb ||
                                $hg == $eg || $hb == $eb ||
                                $hg == $dg || $hb == $db ||
                                $hg == $cg || $hb == $cb ||
                                $hg == $bg || $hb == $bb ||
                                $hg == $ag || $hb == $ab)
                                {
                                    continue;
                                }
$r++;
                                $result[] = ['a' => $a, 'b' => $b, 'c' => $c, 'd' => $d, 'e' => $e, 'f' => $f, 'g' => $g, 'h'=>$h];

                            }
                        }
                    }
                }
            }
        }
    }
}
echo $r;
echo '<pre>';
print_r($result);
echo '</pre>';

//echo '<table border="2px solid black" style="text-align: center; color: red">';
//foreach ($result[0] as $item) {
//    echo '<tr>';
//    foreach ($item as $value) {
//        echo '<td>';
//        echo $value;
//        echo '</td>';
//    }
//    echo '</tr>';
//}
//echo '</table>';