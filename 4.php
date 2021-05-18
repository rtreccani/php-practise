<?php

// A palindromic number reads the same both ways. The largest palindrome made from the product of two 
// 2-digit numbers is 9009 = 91 × 99.

// Find the largest palindrome made from the product of two 3-digit numbers.

//check to see if a given number is palindromic by reversing it and checking if they're equal
//could be done easier with strings probably 
function checkPalindrome($num){
    $copyNum = $num;
    $reversed = 0;
    $power = 0;
    while($num > 0){
        $current = $num % 10;
        $reversed = $reversed * 10 + $current;
        $num = ($num-$current)/10; 
    }

    return($copyNum == $reversed);
}

//really ugly solution by just trying all 1000*1000 combinations. stores it's largest found 
//and once it's scanned all combinations returns the largest one.
function findLargestPalindromeProduct($maxComponent){
    $largest = [0,0]; //this will store our working largest palindrome products
    for($i = 0; $i < $maxComponent; $i++){ //try every possible first number
        for($j = 0; $j < $maxComponent; $j++){ //try every possible 2nd number
            if(checkPalindrome($j*$i)){ //if the product is a palindrome
                if($largest[0]*$largest[1] < $i*$j){ //if the product is larger than our previous best
                    $largest = [$i, $j]; //then update the working largest copy
                }
            }
        }
    }
    return($largest); //return the array containing the 2 numbers used to create the largest palindrome
}

//get the resultant numbers (2 element array for the 2 components)
$res = findLargestPalindromeProduct(999);

//pretty print them and the result palindrome
echo(implode(",",$res)." produces ");
echo($res[0]*$res[1]);
//913,993 produces 906609

?>