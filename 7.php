<?php

// By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

// What is the 10,001st prime number?


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

//get n primes from the getnextprime function and return the last one
function getNthPrime($n){
    $currentPrime = 2; //this is the prime which will be stepped up one at a time
    for($i = 1; $i < $n; $i++){ //for however many primes were requested
        $currentPrime = getNextPrime($currentPrime);
    }
    return($currentPrime); //return after we've stepped N primes up
}

echo(getNthPrime(10));

//104743
