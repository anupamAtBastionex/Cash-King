<?php include('../db.php');?>

<?php

    $click_id = $_REQUEST['sig'];
    $amount = $_REQUEST['amount'];
    $ofid = $_REQUEST['ofid'];
    $id = $_REQUEST['id'];
    
    $type = "OfferToro offerwall Credit";

    
    if($_SERVER["REMOTE_ADDR"]=="54.175.173.245"){

    $uid = $_GET['user_id'];
    $point_value =  $_GET['amount'];
    if (!$point_value>0) {
      $point_value = 0;
    }

    $r_source = mysqli_query($link,"select * from users where id = '$uid'");
    $r_rows = mysqli_num_rows($r_source);
    if ($r_rows>0) {
      $r_row = mysqli_fetch_array($r_source);
      $r_views = $r_row['points']+$point_value;
      $user = $r_row['username'];
      $task = $r_row['task']+1;
      $r_sql = "UPDATE users SET points = '$r_views', task = '$task' WHERE id = '$uid'";
      $res = mysqli_query($link, $r_sql);
    }
    $date = date("d-m-Y");
    
  $currency_amount = $_GET['currency_amount'];
  $sql = "INSERT INTO `tracker` (`username`, `points`, `type`, `date`) VALUES " . "('$user', '$point_value', '$type', '$date')";
  $check = mysqli_query($link,$sql);

  header("HTTP/1.1 200");



                echo "success";
	}else{

		header("HTTP/1.1 400");
		api::printError(ERROR_UNKNOWN, "Unknown Error");

	}

?>
