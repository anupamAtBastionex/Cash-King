<?php
include('db.php');

$check_multiple = "SELECT use_multiple_account FROM settings";
$send_multiple = mysqli_query($link,$check_multiple);
$r = mysqli_fetch_assoc($send_multiple);
if($r['use_multiple_account'] == '0') {
echo $r['use_multiple_account'];
}

?>