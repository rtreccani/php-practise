<?php

// The prime factors of 13195 are 5, 7, 13 and 29.
// What is the largest prime factor of the number 600851475143 ?

//keep trying to find lowest prime factor of the number, destructively dividing
//it when we do. in this way, we'll keep dividing out its factors until we reach
//a point where no more factors can be pulled and the iterator hits the number,
//indicating it as the LPF
function getLargestPrimeFactor($num){
    $iterator = 2;

    while($iterator < $num){ //until our iterator hits the number
        if($num % $iterator == 0){ //if it's a perfect division
            $num /= $iterator; //do that division
            $iterator = 2; //and then reset the iterator
        }
        $iterator++;  //else just increment the iterator
    }
    return($num); //return the number since in this break condition it's been 
    //found to be the LPF
}

echo (getLargestPrimeFactor(600851475143));
//6857

?>