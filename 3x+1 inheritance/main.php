<?php
    include_once "histogram.php";
    define("VERSION", "1.3");

    $objB = new Histogram();
    $a = $_POST["a"];
    $b = $_POST["b"];

    print 'Programos versija: '.VERSION.'<br>';

    $lines = $objB -> conjecture($a, $b);
    for ($i = 0; $i < 3; $i++) {
        print $lines[$i][0].' '.$lines[$i][1].'<br>';
    }
    print 'Histrograma: <br>';
    $objB -> draw_histogram($a, $b);
?>