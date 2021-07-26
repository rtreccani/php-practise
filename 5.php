<?php

// 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.

// What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?

//naive solution by trying all numbers
function findSmallestCommonDenominator($upto){
    $testNum = 1; //this will be our guess at the correct answe
    while(true){
        $commonDivisible = true;
        for($i = 2; $i < $upto; $i++){
            if($testNum % $i != 0){
                $commonDivisible = false;
            }
        }
        if($commonDivisible == true){
            return($testNum);
        }
        $testNum += $upto;
    }
}

//helper function for the performant option. Finds all prime factors of a number
function primeFactors($num){
    $factors = array();
    $iterator = 2;
    while($iterator < $num){ //until our iterator hits the number
        if($num % $iterator == 0){ //if it's a perfect division
            $num /= $iterator; //do that division
            array_push($factors, $iterator);
            $iterator = 2; //and then reset the iterator
        }
        else{
            $iterator++;  //else just increment the iterator
        }
    }
    array_push($factors, $num);//return the last since this must be prime factor
    return($factors); //return the number since in this break condition it's been 
    //found to be the LPF
}


//another helper function. count all of a given value in an instance of array
function countAllOf($val, $instance){
    $tally = 0;
    for($i = 0; $i < sizeof($instance); $i++){
        if($instance[$i]==$val){
            $tally++;
        }
    }
    return($tally);
}


function findLowestFactorFast($upto){
    $maxOfEachFactorNeeded = array_fill(0,$upto, 0);//array from 0 to 20 filled with 0s
    for($num = 0; $num < $upto; $num++){ //for our number from 2 to 20
        $factors = primeFactors($num); //get the prime factors
        for ($factor = 2; $factor < $upto; $factor++){ //for each factor possible
            //find out how many of each prime factor exists in the decomposition of the variable $num
            //if it's more than the maximum count for that number then replace. 
            //ie: if $max contains a 2 for 3, but the prime factor contains 3^4, then replace max with 4
            if(countAllOf($factor, $factors) > $maxOfEachFactorNeeded[$factor]){
                $maxOfEachFactorNeeded[$factor] = countAllOf($factor,$factors);
            }
        }
    }
    $sum = 1; //used to accumulate the answer
    for($i = 2; $i < $upto; $i++){ //lookup how many of each factor from 2 to $upto and multiply that 
        $sum = $sum * $i**$maxOfEachFactorNeeded[$i]; //many of it in. 
    }
    return($sum);
}

//works ok for small numbers but can't handle growth
//echo(findSmallestCommonDenominator(10)."\n");

echo("\n".findLowestFactorFast(20));
//232792560

?> 