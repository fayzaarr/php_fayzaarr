<?php

$jml = isset($_GET['jml']) ? (int)$_GET['jml'] : 0;

echo "<table border=1 cellpadding=5 cellspacing=0 style='border-collapse: collapse; text-align:center;'>\n";

for ($a = $jml; $a > 0; $a--) {
    $total = 0;
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }

    echo "<tr><td colspan='$jml' style='font-weight:bold'>TOTAL: $total</td></tr>\n";

    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td style='width:40px'>$b</td>";
    }
    for ($c = $a + 1; $c <= $jml; $c++) {
        echo "<td style='width:40px'>&nbsp;</td>";
    }
    echo "</tr>\n";
}

echo "</table>";
?>
