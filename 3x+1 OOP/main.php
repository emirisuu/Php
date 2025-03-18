<?php
    include_once "collatz.php";

    $objA = new Collatz();
    $a = $_POST["a"];
    $b = $_POST["b"];

    $lines = $objA -> conjecture($a, $b);
    for ($i = 0; $i < 3; $i++) {
        print $lines[$i][0].' '.$lines[$i][1].'<br>';
    }
?>