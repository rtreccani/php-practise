<?php

// If we list all the natural numbers below 10 that are multiples of 3 or 5, we
// get 3, 5, 6 and 9. The sum of these multiples is 23.
// Find the sum of all the multiples of 3 or 5 below 1000.

//naive approach to simply iterate through and sum on modulo condition pass
function getSumOfMembers($validMembers, $upperBound){
    $sum = 0;
    for($i=1; $i < $upperBound; $i++){
        for($memberIndex=0; $memberIndex < sizeof($validMembers); $memberIndex++){
            if($i % $validMembers[$memberIndex]==0){
                $sum += $i;
                break;
            }
        }
    }
    return($sum);
}

//get the answer
echo(getSumOfMembers([3,5], 1000));