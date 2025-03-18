<?php
    class Collatz {
        public $numbers;
        public $max_numbers;
        public $iterations;
        public $lines;
        public $collatz_array;

        public function __construct() {
            $this -> numbers = [];
            $this -> max_numbers = [];
            $this -> iterations = [];
            $this -> lines = [];
            $this -> collatz_array = [];
        }

        protected function collatz_conjecture($index1, $index2) {
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
                $this -> collatz_array[$i] = [$counter, $max_number];
            }
            return $this -> collatz_array;
        }
        
        public function conjecture($index1, $index2) {
            $collatz_interval = $this -> collatz_conjecture($index1, $index2);
            $length = 0;
            foreach ($collatz_interval as $number => $array) {
                $this -> numbers[$length] = $number;
                $this -> iterations[$length] = $array[0];
                $this -> max_numbers[$length] = $array[1];
                $length++;
            }
            $temp = max($this -> max_numbers);
            $index = array_search($temp, $this -> max_numbers);
            $line1 = [$this -> numbers[$index], $this -> max_numbers[$index]];
        
            $temp = max($this -> iterations);
            $index = array_search($temp, $this -> iterations);
            $line2 = [$this -> numbers[$index], $this -> iterations[$index]];
        
            $temp = min($this -> iterations);
            $index = array_search($temp, $this -> iterations);
            $line3 = [$this -> numbers[$index], $this -> iterations[$index]];

            $this -> lines = [$line1, $line2, $line3];
            return $this -> lines;
        }
    }
?>