<?php
include 'session.php';
include 'db.php';?>

<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];
  
  

  $sql = "SELECT * FROM reward_list WHERE id =".$id;
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $user_sql = "SELECT * FROM users WHERE id = ".$row['u_id'];
  $user = mysqli_query($link, $user_sql);
  $user_row = mysqli_fetch_assoc($user);

  $user_r = "SELECT * FROM reward_list WHERE u_id = ".$row['u_id'];
  $user_r = mysqli_query($link, $user_r);
  $total_r = mysqli_num_rows($user_r);
 } else {
   header("Location: /");
 }

}else {
   header("Location: /");
}
 ?>

<?php include 'inc/head.php';?>

<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">

  <div class="col-xl-12">
  <div class="white_card card_height_100 mb_30">
  <div class="white_card_header">
  <div class="box_header m-0">
  <div class="main-title">
  <h3 class="m-0">Review Reward</h3>
  </div>
  <a href="redeem-request.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
  </div>
  </div>
  <div class="white_card_body">
  <div class="Activity_timeline">
  <ul>
  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Username:&nbsp;&nbsp;</h6>
  <h6><?php echo @$user_row['username']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Points Used:&nbsp;&nbsp;</h6>
  <h6><?php echo $row['coins_used']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Amount:&nbsp;&nbsp;</h6>
  <h6><?php echo $row['symbol'].$row['amount']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Payment Address:&nbsp;&nbsp;</h6>
  <h6><?php echo $row['p_details']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Payment Method:&nbsp;&nbsp;</h6>
  <h6><?php echo $row['package_name']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Date:&nbsp;&nbsp;</h6>
  <h6><?php echo $row['date']; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Total Redeem:&nbsp;&nbsp;</h6>
  <h6><?php echo $total_r; ?></h6>
  </div>
  </div>
  </li>

  <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6>Status:&nbsp;&nbsp;</h6>
  <?php if ($row['status']=="0") {
    echo '<a href="#" class="badge_active3" style="background:#ffae00;color:white;">Pending</a>';
  }elseif ($row['status']=="1") {
    echo '<a href="#"  class="badge_active" >Approved</a>';
  }
  elseif ($row['status']=="3") {
    echo '<a href="#"  class="badge_active" >Completed</a>';
  }
  else {
      echo '<a href="#"  class="badge_active3" >Rejected</a>';
  } ?>




  </div>
  </div>
  </li>
  
  
  
    <li>
  <div class="activity_bell"></div>
  <div class="timeLine_inner d-flex align-items-center">
  <div class="activity_wrap" style="display: flex; flex-direction: row;">
  <h6><?php echo @$user_row['username']; ?>:&nbsp;&nbsp;</h6>
  
   <form action="admin_api.php" method="post" id="myform">
      <input type='hidden' name='user_b' value='<?php echo $user_row['id']; ?>'>
      <input type='hidden' name='r' value='<?php echo $user_row['id']; ?>'>
     
  <?php if (@$user_row['status']=="0") {
      $id =@$user_row['id'];
    echo "
    <input type='hidden' name='status' value='1'>
    <Button type='submit' style='background: red;border: none;' class='btn btn-success gg'> Block User</Button>";
  }else {
      echo "
    <input type='hidden' name='status' value='0'>
    <Button type='submit' class='btn btn-success gg'> Unblock</Button>";
    
  } ?>
  
   </form>
   
  </div>
  </div>
  </li>
  
  <style>
      .gg{
          margin-top: 1px;
    line-height: 13px;
    font-size: 12px;
    text-transform: uppercase;
      }
  </style>

  </ul>

<br>
<br>


<?php
if(!$row['status']=="3"){ 
    $id = $row['id'];
    $user = $user_row['username'];
echo "
<div style='text-align: center;display: flex;gap: 4px;' >
<form action='admin_api.php' method='post'>
  <input type='hidden' name='view_id' value='$id'>
  <input type='hidden' name='view_action' value='1'>

<button type='submit' class='btn btn-success mb-3'><i class='fa-solid fa-check'></i> Approve</button>
</form>

<form action='admin_api.php' method='post'>
  <input type='hidden' name='view_id' value='$id'>
  <input type='hidden' name='view_action' value='2'>

<button type='submit' class='btn btn-danger mb-3'><i class='fa-solid fa-xmark'></i> Reject</button>
</form>
<form>
<a href='tracker.php?i=$user' class='btn btn-secondary mb-3'><i class='fa-solid fa-eye'></i> Track</a>
</form>
</div>
";}else if($row['status']=="1")
{
    $idd = $row['id'];
    echo "<form action='admin_api.php' method='post'>
  <input type='hidden' name='view_id' value='$idd'>
  <input type='hidden' name='view_action' value='3'>

<button type='submit' class='btn btn-success mb-3'><i class='fa-solid fa-check'></i> Complete now</button>
</form>";
}
?>

  </div>
  </div>
  </div>
  </div>

</div>
</div>
</div>


</section>



<?php include 'inc/foot.php';?>
