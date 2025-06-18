/**
Have the function FirstReverse(str) take the str parameter
being passed and return the string in reversed order. For 
example: if the input string is "Hello World and Coders" 
then your program should return the string sredoC dna dlroW olleH.

    Example:
    Input: "coderbyte"
    Output: etybredoc
*/

<?php 

function FirstReverse($str) {

  // ugh who would ever do this when there is literally strrev($str)
  // return strrev($str) ... jk

  $strLength = strLen($str)-1;
  $reverseString = "";

  while($strLength >= 0){
    $reverseString .= $str[$strLength];
    $strLength--;
  }

  return $reverseString;

}
   
// keep this function call here  
echo FirstReverse(fgets(fopen('php://stdin', 'r')));  

?>
