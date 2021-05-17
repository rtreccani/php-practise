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

//more performant version using the arithmetic sum of each of the 'validmembers'
function getSumOfMembersNumerical($validMembers, $upperBound){
    $sum = 0; 
    //iterate every member in the validmembers array.
    for($memberIndex=0; $memberIndex < sizeof($validMembers); $memberIndex++){ 
        //get the current member of the validmembers array for convenience.
        $currentMember = $validMembers[$memberIndex]; 
        //the upperbound has to be 
        //A. less than $upperBound, not equal, and 
        //B. a round multiple of $currentMember
        $newUpper = $currentMember * floor(($upperBound-1)/$currentMember);
        //arithmetic sum is nelements * (lower element + upper element)/2
        $sum += ($newUpper/$currentMember) * (($currentMember+$newUpper)/2);
    }
    return($sum);
}

//naive analytical method
echo(getSumOfMembers([3,5], 10));

//performant numerical method
echo(getSumOfMembersNumerical([3,5], 10));