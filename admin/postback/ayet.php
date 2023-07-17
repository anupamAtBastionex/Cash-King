<?php include('../db.php');?>

<?php 

    if($_SERVER["REMOTE_ADDR"]=="35.165.166.40" || $_SERVER["REMOTE_ADDR"]=="35.166.159.131" || $_SERVER["REMOTE_ADDR"]=="52.40.3.140"){
    
    $uid = $_GET['uid'];
      $point_value = $_GET['currency_amount'];
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
    $sql = "INSERT INTO `tracker` (`username`, `points`, `type`, `date`) VALUES " . "('$user', '$currency_amount', 'Ayet offer credit', '$date')";
    $check = mysqli_query($link,$sql);
    
}
    
    


 ?>