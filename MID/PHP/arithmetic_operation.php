<?php

$a = 11;
$b = 21;

printf("Numbers: a = %d, b = %d\n\n", $a, $b);
echo "<br>";
//Addition
$add = $a + $b;
echo "Addition : " .$add;
echo "<br>";

//Subtraction
$sub = $b - $a;
echo "Subtraction : " .$sub;
echo "<br>";

//Muliplication
$mult = $a * $b;
echo "Multiplication : " .$mult;
echo "<br>";

//Division
$div = $a / $b;
echo "Division : " . $div;
echo "<br>";

//Modulus
$mod = $b % $a;
echo "Modulus : " . $mod;
echo "<br>";

// Exponentiation
$exp = number_format($a ** $b, 0, '', ''); // Prevents 1.0E+21 in echo
echo "Exponentiation : " . $exp;
echo "<br>";

// Negation
$neg = -$a;
echo "Negation : " . $neg;
?>