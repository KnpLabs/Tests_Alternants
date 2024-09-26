<?php

// create the fibonacci sequence
function fibonacciSequence($n): array {
    // initialize empty array
    $array = [0,1];

    // lets fill this array with the sequence
    for($i = 2; $i < $n; $i++) {
        $array[$i] = $array[$i - 1] + $array[$i - 2];

        // largest element < 4 000 000
        if ($array[$i] >= 4000000) {
            // remove last element so the sequence is striclty less than 4 000 000
            array_splice($array, -1, 1);
            break;
        }
    }

    return $array;
}

// check if the sequence works
$result = fibonacciSequence(3000);
print_r($result);




// create the function that sums up all the even elements
function sumEvenElements($array): int {
    // initalize the sum
    $sum = 0;

    // iterate throught the array
    foreach($array as $values) {
        // check all even numbers
        if($values % 2 === 0) {
            // add those even numbers to the sum
            $sum += $values;
        }
    }

    return $sum;
}

// check if the function works correctly
$evenSum = sumEvenElements($result);
echo "The sum of all the even elements is equal to : $evenSum";