<?php

$servername="db_host";
$dbname = "db_name";
$username = "db_user";
$password = "db_password";

$link=mysqli_connect($servername,$dbname, $username,$password);

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);



?>

