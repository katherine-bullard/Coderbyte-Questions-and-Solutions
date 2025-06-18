<?php 
/**
This involves finding a missing digit (represented by 'x') in a mathematical expression. 
  Examples:
  Input: "3x + 12 = 46" Output: 4
  Input: "4 - 2 = x" Output: 2
  Input: "38X 5 * 3 = 1? 595" Output: 6 1 
*/
function MissingDigit($str) {

  //split the equation into parts left and right side of the equation from the "=" operator 
 list($left, $right) = explode('=', $str);
  //explode left side
  $leftSide = explode(" ", $left);
//remove space from right side
  $rightSide = trim($right);

  //first var from the left side 
  $leftvar1 = $leftSide[0];
  //getting the operator 
  $operator = $leftSide[1];
  $leftVar2 = $leftSide[2];

//this is the int thats coming back from solving
  $solveVariable = null;

  $reverseOperations = [
    "*" => "/",
    "/" => "*",
    "+" => "-",
    "-" => "+"
  ];

//if the right side contains x 
if(str_contains($rightSide, 'x')){
  //right side is straightforward we just want to solve it
  $expressionwithX = $rightSide;
  $solveVariable = solve($leftvar1, $leftVar2, $operator );
}else{
  //need to find out what side contains the x
    if(str_contains($leftvar1, 'x')){
      $expressionwithX = $leftvar1;
      $var1 = $leftVar2;
    }else if(str_contains($leftvar2, 'x')){
           $expressionwithX = $leftvar2;
          $var1 = $leftVar1;
    }
    $solveVariable = solve($rightSide, $var1, $reverseOperations[$operator]);

}

  $stringSolveVar = (string) $solveVariable;

//we have string of the stringSolver (string of the number returned)
//we find the position where x is 
// we are returning what the number for x is 
  return ($stringSolveVar[strpos($expressionwithX, "x")]);

}


function solve($var1, $var2, $operator){
  switch($operator){
    case "+":
      $solvariable = $var1 + $var2;
      break;
    case "-":
      $solvariable = $var1 - $var2;
      break;
    case "/":
        $solvariable = $var1 / $var2;
        break;
    case "*":
      $solvariable = $var1 * $var2;
      break;
  }

  return $solvariable;
}
   
// keep this function call here  
echo MissingDigit(fgets(fopen('php://stdin', 'r')));  

?>
