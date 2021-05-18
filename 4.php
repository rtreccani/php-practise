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
    $largest = [0,0];
    for($i = 0; $i < $maxComponent; $i++){
        for($j = 0; $j < $maxComponent; $j++){
            if(checkPalindrome($j*$i)){
                if($largest[0]*$largest[1] < $i*$j){
                    $largest = [$i, $j];
                }
            }
        }
    }
    return($largest);
}

//get the resultant numbers
$res = findLargestPalindromeProduct(999);

//pretty print them and the result palindrome
echo(implode(",",$res)." produces ");
echo($res[0]*$res[1]);
//913,993 produces 906609

?>