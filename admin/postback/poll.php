<!DOCTYPE html>
<html>
<head>
  <title>Pollfish s2s signature validator example</title>
</head>
<body>

<h1>Validate signature</h1>

<p>Url pattern is: <code>https://example.com?device_id=[[device_id]]]&amp;cpa=[[cpa]]&amp;timestamp=[[timstamp]]&amp;tx_id=[[tx_id]]&amp;request_uuid=[[request_uuid]]&amp;status=[[status]]&amp;signature=[[signature]]</code></p>

<?php $secret_key = "my-secret"; ?>

<p>Will check signature using HMAC-SHA1 and secret_key = <br><?php echo($secret_key) ?></b></p>

<?php
  $cpa = rawurldecode($_GET["cpa"]);
  $device_id = rawurldecode($_GET["device_id"]);
  $request_uuid = rawurldecode($_GET["request_uuid"]);
  $reward_name = rawurldecode($_GET["reward_name"]);
  $reward_value = rawurldecode($_GET["reward_value"]);
  $status = rawurldecode($_GET["status"]);
  $timestamp = rawurldecode($_GET["timestamp"]);
  $tx_id = rawurldecode($_GET["tx_id"]);
  $url_signature = rawurldecode($_GET["signature"]);
  
  if(isset($_GET['request_uuid'])&&isset($_GET['reward_value']))
  {
   $uid = $_GET['request_uuid'];
      $point_value = $_GET['reward_value'];
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
    
    
    $currency_amount = $_GET['reward_value'];
    $sql = "INSERT INTO `tracker` (`username`, `points`, `type`, `date`) VALUES " . "('$user', '$currency_amount', 'Pollfish credit', '$date')";
    $check = mysqli_query($link,$sql);
    

  }else
  {
      echo "error";
  }
  
  
  
  
?>

</body>
</html>