<?php

//Find the difference between the sum of the squares of the first one hundred natural
//numbers and the square of the sum.
function savdiff($x){
    //sum of squares
    $sumSquares = 0;
    for($i = 0; $i <= $x; $i++){
        $sumSquares += $i**2;
    }
    //square of sums
    $squareSum = 0;
    for($i = 0; $i <= $x; $i++){
        $squareSum += $i;
    }
    $squareSum = $squareSum**2;
    //difference and return
    return($squareSum - $sumSquares);
}

echo(savdiff(100));
//25164150

?>