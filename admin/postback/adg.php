<?php include('../db.php');?>

<?php

/**
 * For a plain PHP page to receive the postback data from AdGate Media you may simply
 * retrieve the array from the global $_GET variable. To ensure that the data is coming
 * from AdGate Media check that the server sending the data is from AdGate Media by the ip
 * address as listed on your affiliate panel at http://adgatemedia.com under
 * the Postbacks Section and the Postback Information heading.

 * Check the Remote Address is AdGate Media
 * if it is not throw an Exception
 */

    $data = $_GET;
    // Process or Persist Data here inline or via a function call.

/**
 * The data array will contain all the macros you included under the Postbacks section of your
 * affiliate panel at http://adgatemedia.com. The array is keyed by the names you assigned to each macro
 * when you constructed the url e.g., http://yoururl.com/postback/?tx_id={transaction_id}
 * the transaction_id macro's data will have a key of 'tx_id' in the $data array: $data['tx_id'];
 *
 * Possible Macros
 * For a list of possible macros see your affiliate panel at http://adgatemedia.com under the
 * Postbacks section and the heading Postback Information.
 *
 * Parsing:
 * From the data array you may parse the data into an object, supply it to an SQL query, or do
 * any needed processing or persisting required by your application.
 *
 */


/**
 * Inline SQL Query Example
 */
 if($_SERVER["REMOTE_ADDR"]=="52.42.57.125"){
 $uid = $_GET['user_id'];
  $point_value = $_GET['point_value'];
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
$sql = "INSERT INTO `tracker` (`username`, `points`, `type`, `date`) VALUES " . "('$user', '$point_value', 'AdgetMedia offer credit', '$date')";
$check = mysqli_query($link,$sql);


$conn = null;

/**
 * Processing Example
 * This example shows sending an notification to an admin when receiving a charge back of a conversion
 * being sent to the postback url.
 *
 * The example uses a Static Notify class, use your own notification class or one provided by your framework
 * of choice.
 */

}
?>