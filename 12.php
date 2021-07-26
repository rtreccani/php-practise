<?php

//The sequence of triangle numbers is generated by adding the natural numbers. So the 7th triangle 
// number would be 1 + 2 + 3 + 4 + 5 + 6 + 7 = 28. The first ten terms would be:

// 1, 3, 6, 10, 15, 21, 28, 36, 45, 55, ...

// Let us list the factors of the first seven triangle numbers:

//      1: 1
//      3: 1,3
//      6: 1,2,3,6
//     10: 1,2,5,10
//     15: 1,3,5,15
//     21: 1,3,7,21
//     28: 1,2,4,7,14,28

// We can see that 28 is the first triangle number to have over five divisors.

// What is the value of the first triangle number to have over five hundred divisors?


function getNumberOfFactors($num){
    $count = 0;
    $lastFactor = 0;
    $i = 1;
    while(true){
        if($i == $num){ //fallback method
            return($count+1);
        }

        if($num % $i == 0){ //more performant but less reliable
            $count++;
            if($i*$lastFactor == $num){
                return(($count-1)*2);
            }
            $lastFactor = $i;
        }
        $i++;
    }
}

function getFirstTriangleNumberWithXFactors($x){
    $count = 0;
    $sum = 0;
    $i = 1;
    while(true){
        $sum += $i;
        $count++;
        if(getNumberOfFactors($sum) > 500){
            return($sum);
        }
        $i++;
    }
}

echo getFirstTriangleNumberWithXFactors(500);
//76576500
?>