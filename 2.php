<?php

// Each new term in the Fibonacci sequence is generated by adding the previous two 
// terms. By starting with 1 and 2, the first 10 terms will be:

// 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ...

// By considering the terms in the Fibonacci sequence whose values do not exceed 
// four million, find the sum of the even-valued terms.

function getSumOfEvenFibonacci($upperBound){
    $sum = 0;
    $working = [1,2]; //contains the current two fib numbers
    $shadow = [0,0]; //used to buffer the next fib number and previous

    //whilst our iterator is less than the upper bound to sum to
    while($working[1] < $upperBound){
        //this is our condition to add to sum, if the current element is even
        //note this has to happen first to catch the number 2 on initial
        if($working[1] % 2 == 0){
            $sum += $working[1];
        }
        
        //shadow is sum of previous, and then previous sum
        $shadow[1] = $working[0] + $working[1];
        $shadow[0] = $working[1];
        //blit shadow into working. (probably is an in-place method but
        //good enough for me)
        $working = $shadow;
    }
    //once we've passed our upperbound just return the sum
    return($sum);
}

//get the answer
echo (getSumOfEvenFibonacci(4*1000*1000));
//4613732
?>