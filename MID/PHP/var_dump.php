<?php 
// 1. String
$name = "Shovan Mondal"; 
var_dump($name); 
echo "<br>"; 

// 2. Integer
$num = 20; 
var_dump($num); 
echo "<br>"; 

// 3. Float (Decimal number)
$price = 99.95; 
var_dump($price); 
echo "<br>"; 

// 4. Boolean (True or False)
$is_active = true; 
var_dump($is_active); 
echo "<br>"; 

// 5. Array (Multiple values in one variable)
$skills = ["PHP", "HTML", "CSS"]; 
var_dump($skills); 
echo "<br>"; 

// 6. Object (Instance of a class)
class User {
    public $role = "Developer";
}
$user_obj = new User(); 
var_dump($user_obj); 
echo "<br>"; 

// 7. NULL (No value)
$empty_var = null; 
var_dump($empty_var); 
?>
