<?php

// The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
// Find the sum of all the primes below two million.

//finds the next prime number after your given number. Simple prime finder, there's obviously 
//tonnes of ways to improve it 
function getNextPrime($currentPrime){ 
    $guess = $currentPrime + 1; //we have to start guessing at the next number up
    while(true){ //simple run until a break condition is met
        $isPrime = true; //start by assuming a number is prime and then try to disprove 
        for($i = 2; $i < ceil(sqrt($guess)) + 1; $i++){ //iterate up until the sqrt of the max
            if($guess % $i == 0){ //if it's a whole number, it's not prime, break the loop
                $isPrime = false; //disable the flag 
                break; //stop iterating so we can just straightaway increment the guess
            }
        }
        if($isPrime){ //if it was prime in the end, we can return it 
            return($guess);
        } else { //if not, try the next number up.
            $guess+=1;
        }
    }
}

//doesn't work for big numbers
function getSumOfPrimesUpto($max){
    $currentPrime = 2;
    $sum = 0;
    while($currentPrime < $max){
        $sum += $currentPrime;
        $currentPrime = getNextPrime($currentPrime);
    }
    return($sum);
}

function sievePrimes($max){
    $potentials = range(1, $max, 2);
    $potentials[0] = 2; //hacky way to replace the 1 at the beginning with 2
    $currentSievePoint = 3;
    $sievePointIndex = 2;
    $actualPrimes = array();
    while($currentSievePoint < sqrt($max)){
        for($i = $sievePointIndex; $i < count($potentials); $i++){
             if($potentials[$i] % $currentSievePoint == 0){// and $potentials[$i] != $currentSievePoint){
                unset($potentials[$i]);
                $potentials = array_values($potentials);
            }
        }
        $potentials = array_values($potentials);
        $sievePointIndex++;
        $currentSievePoint = $potentials[$sievePointIndex];
        echo $currentSievePoint."\n";
    }
    return($potentials);
}

function sievePrimesBool($max){
    $currentSievePoint = 2;
    $potentials = array_fill(0, $max, true);
    while($currentSievePoint < ceil(sqrt($max))+1){
        for($i = $currentSievePoint; $i < $max; $i+=$currentSievePoint){
            if($i % $currentSievePoint == 0 and $i != $currentSievePoint){
                $potentials[$i] = false;
            }
        }
        while(true){
            $currentSievePoint++;
            if($potentials[$currentSievePoint] == true){ //move to the next prime
                break;
            }
        }
    }
    $results = array();
    for($i = 2; $i < $max; $i++){
        if($potentials[$i]){
            array_push($results, $i);
        }
    }
    return($results);
}

// echo getSumOfPrimesUpto(10); // it does work but only for small numbers
//$primes = sievePrimes(2000000);  //works for small numbers but struggles with array indexing
$primes = sievePrimesBool(2*1000*1000); //works preddy quickly
echo array_sum($primes);
//142913828922

?>