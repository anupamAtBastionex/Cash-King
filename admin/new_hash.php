<?php
$key=$_POST["key"];
$txnid=$_POST["txnid"];
$amount=$_POST["amount"]; //Please use the amount value from database
$productinfo=$_POST["productinfo"];
$firstname=$_POST["firstname"];
$email=$_POST["email"];
$salt="hHLQYxYYHF"; //Please change the value with the live salt for production environment


$hashSeq = $key.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||||||||'.$salt;

$hash = hash("sha512", $hashSeq);

error_log("all posted variables:".print_r($_POST,true));

echo $hash;
?>