<?php
include("config.php"); 
session_set_cookie_params(0, $path, "web.njit.edu"); 
session_start(); 

if(! isset( $_SESSION['logged']))
{
    echo "<br>Please Login. <br><br>"; 
    header( "refresh: 2; url = Script.html"); 
    exit(); 
}

echo "<br>You are authorized to be on protected2.php (Protected2 script)<br><br>"; 


echo "Ucid: "."".$_SESSION["ucid"]; 
echo "<br><br>"; 

?> 

<a href = "protected1.php">Click here to go to Protected1 script.</a><br>
<a href = "Logout.php">Click here to Logout.</a>
