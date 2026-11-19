<?php
$name = "Shovan Mondal";
$name = "Rishan Mondal";

echo $name ;

//New Line
echo "<br>";

//Constant
define("NAME","aiub");
echo NAME;

echo "<br>";
//Traditional way
echo "My name is : " . $name . " studies " . NAME;

// Another way to print constant
echo "<br>";
echo constant("NAME");

echo "<br>";
//double printing 
$amount = 20;
$text = "amount";

echo "Your amount is : " . $$text;//$$text=$amount=20


?>