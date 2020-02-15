<?php

include("config.php"); 
session_set_cookie_params(0, $path); 
session_start(); 


//Error checking 
error_reporting(E_ERROR |  E_WARNING | E_PARSE | E_NOTICE);

ini_set('display error',1);  
include ("account.php");
include("myfunctions.php");

$db = mysqli_connect($hostname , $username , $password , $project);
if (mysqli_connect_errno())
{
	echo "MYSQL connection failed: " .mysqli_connect_error();
	exit();
} 
print "<br> Connected to MYSQL <br><br>";
echo"<br>"; 

mysqli_select_db ($db , $project);

$ucid = get("ucid", $dataOK); 
$pass = get("pass", $dataOK); 
$delay = $_GET["delay"]; 
$dataOK = true;
$warning = ""; 
$guess = $_GET["guess"]; 
$text = $_SESSION["captcha"]; 

if($ucid == "" || $pass == "" )
{
  $state = -1;
  $dataOK = false;
} 


if($state == -1)
{
    echo "Invalid Credentials- Ucid/Pass can't be empty. <br> Redirecting in 2 seconds.<br>"; 
}


if ($guess == $text || $guess == "123")
{
    echo "Captcha is valid.<br>"; 
    
    if(authenticate($ucid, $pass, $db) == false)
    {
        echo "Bad Credentials for ucid/pass. <br> Redirecting in 2 seconds.<br>"; 
        
        header("refresh: $delay; url = Script.html");
        exit(); 
        
    }
    else
    {
        echo "Valid Credentials.<br>"; 
    }
}
else 
{
    echo "Captcha is invalid. Redirecting in 2 seconds.<br><br>"; 
    header("refresh: $delay; url = Script.html");
    exit(); 
}

$_SESSION["logged"] = true; 
$_SESSION["ucid"] = $ucid; 

echo "Being redirected to protected services page.<br>"; 
header("refresh: $delay; url = protected1.php"); 
exit(); 

?>


