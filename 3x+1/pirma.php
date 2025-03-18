<?php
    $number = $_GET["Skaicius"];
    function collatz_conjecture($number) {
        print $number.'<br>';
        $counter = 0;
        while ($number != 1) {
            if ($number % 2 != 0) {
                $number = $number * 3 + 1;
            }
            else {
                $number /= 2;
            }
            $counter += 1;
            print $number.'<br>';
        }
        return $counter;
    }
    $iterations = collatz_conjecture($number);
    print "Iteraciju kiekis:".$iterations;
?>