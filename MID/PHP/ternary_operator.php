<?php

//structure 
//   x = (Condition) ? Result1 : Result2;

$user ="";
$age =25;
$user = ($age > 18) ? "Admin" : "Guest";
echo $user;

?>