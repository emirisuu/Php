<?php
    $a = $_POST["a"];
    $b = $_POST["b"];
    function collatz_conjecture($index1, $index2) {
        $collatz_array = [];
        for ($i = $index1; $i <= $index2; $i++) {
            $number = $i;
            $max_number = $number;
            //print "Pradinis skaicius ".$number."\n";
            $counter = 0;
            while ($number != 1) {
                if ($number % 2 != 0) {
                    $number = $number * 3 + 1;
                }
                else {
                    $number /= 2;
                }
                if ($number > $max_number) {
                    $max_number = $number;
                }
                $counter++;
                //print $number."\n";
            }
            $collatz_array[$i] = [$counter, $max_number];
        }
        return $collatz_array;
    }
    $collatz_interval = collatz_conjecture($a, $b);
    $numbers = [];
    $max_numbers = [];
    $iterations = [];
    $length = 0;
    foreach ($collatz_interval as $number => $array) {
        $numbers[$length] = $number;
        $iterations[$length] = $array[0];
        $max_numbers[$length] = $array[1];
        $length++;
    }
    $temp = max($max_numbers);
    $index = array_search($temp, $max_numbers);
    $line1 = [$numbers[$index], $max_numbers[$index]];

    $temp = max($iterations);
    $index = array_search($temp, $iterations);
    $line2 = [$numbers[$index], $iterations[$index]];

    $temp = min($iterations);
    $index = array_search($temp, $iterations);
    $line3 = [$numbers[$index], $iterations[$index]];

    print $line1[0].' '.$line1[1].'<br>';
    print $line2[0].' '.$line2[1].'<br>';
    print $line3[0].' '.$line3[1].'<br>';
?>