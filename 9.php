<?php
// A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
// a2 + b2 = c2

// For example, 32 + 42 = 9 + 16 = 25 = 52.

// There exists exactly one Pythagorean triplet for which a + b + c = 1000.
// Find the product abc.

//helper function to check if a^2+b^2 = c^2 ie: is it a pythag triple
function checkIfPythagTriplet($a, $b, $c){
    if($a**2 + $b**2 == $c**2){
        return(true);
    } else {
        return(false);
    }
}

//iterate across A and B, calculate C, and then check if that's a pythag triple
function findTriplet($max){
    for($a = 1; $a < $max; $a++){
        for($b = 1; $b < $max; $b++){
            $c = $max - $a - $b;
            if(checkIfPythagTriplet($a,$b,$c)){
                return([$a, $b, $c]);
            }
        }
    }
}

//heres the triplet
$res = findTriplet(1000);
// echo implode(",", $res)."\n";
//for some reason the answer is the product of those
echo $res[0]*$res[1]*$res[2];
//31875000

?>