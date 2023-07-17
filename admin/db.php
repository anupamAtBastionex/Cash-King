<?php
$servername="localhost";
$dbname = "cash_king";
$username = "root";
$password = "";

$link=mysqli_connect($servername,$username, $password,$dbname);
    
if(!$link)
{
    echo "error";
}

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
?>