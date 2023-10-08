<?php
  
//!TODO 1 : Create a function that takes all numbers from a array and return all the pairs numbers.

//function to check if the number is even
function isEven($fibonacci) {
    return $fibonacci % 2 === 0;
}
//array filter for each element of the array
$fibonacci = array(1, 2, 3, 5, 8, 13, 21, 34, 55, 89);
$even = array_filter($fibonacci, "isEven");

//code used to display the result for testing, this is not part of the exercise
echo 'array of even elements:';
echo '<pre>';
print_r($even);
echo '</pre>';

//!TODO 2 : Create a function that calculate the somme of all numbers from a array and return the result.

//function to calculate the sum of all elements of the array
function calculateSum($even) { 

    return array_sum($even);
}
//calculate the sum of all elements of the array
$sum = calculateSum($even);

//code used to display the result for testing, this is not part of the exercise too
echo 'sum of even elements:';
echo '<pre>';
print_r($sum);
echo '</pre>';

