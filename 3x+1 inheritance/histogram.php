<?php
include_once "collatz.php";
class Histogram extends Collatz {
    public $iterations_counter;

    public function __construct() {
        $this -> iterations_counter = [];
    }

    private function histogram_stats($index1, $index2) {
        $collatz_array = $this -> collatz_conjecture($index1, $index2);
        foreach($collatz_array as $number => $array) {
            if (array_key_exists($array[0], $this -> iterations_counter)) {
                $this -> iterations_counter[$array[0]] += 1; 
            }
            else {
                $this -> iterations_counter[$array[0]] = 1;
            }
        }
    }

    public function draw_histogram($index1, $index2) {
        $this -> histogram_stats($index1, $index2);
        foreach($this -> iterations_counter as $iteration => $counter) {
            print 'Iteraciju skaicius: '.$iteration.' Pasikartojimai: '.$counter.'<br>';
        }
    }
}

?>