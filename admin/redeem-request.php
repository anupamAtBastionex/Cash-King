<?php
include 'session.php';
include 'db.php';?>



<?php include 'inc/head.php';?>

<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="box_header m-0">

</div>
</div>
<div class="white_card_body">
<div class="QA_section">
<div class="white_box_tittle list_header" style="display: flex;">
<h4>Redeem Requests</h4>
<div class="box_right d-flex lms_block"><strong>
  <?php echo ucwords(@$_SESSION['resp']); $_SESSION['resp'] = ''; //echo ucwords(@$_GET['resp']);  ?>.
</strong>
</div>
</div>
<div class="QA_table mb_30">

<table class="table lms_table_active ">
<thead>
<tr>
<th scope="col">Method</th>
<th scope="col">Name</th>
<th scope="col">Amount</th>
<th scope="col">Points</th>
<th scope="col">Date</th>
<th scope="col">Status</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

 <!-- start here  -->

 <?php
 $sql = "SELECT * FROM reward_list ORDER BY id DESC";
 $offer = mysqli_query($link, $sql);
  while($offer_row = mysqli_fetch_assoc($offer)) {
  $status = $offer_row['status'];
  $user_sql = "SELECT * FROM users WHERE id = ".$offer_row['u_id'];
  $user = mysqli_query($link, $user_sql);
  $user_row = mysqli_fetch_assoc($user);
 ?>
 <tr>
<td> <?php echo $offer_row['package_name']; ?></td>
 <th scope="row"> <a href="#" class="question_content"> <?php echo @$user_row['username']; ?></a></th>
 <td> <?php echo $offer_row['symbol'].$offer_row['amount']; ?></td>
 <td> <?php echo $offer_row['coins_used']; ?></td>
 <td> <?php echo $offer_row['date']; ?></td>

 <?php
if ($status=="0") {
  echo '<td><a style="background:#ffae00;" href="#" class="status_btn">Pending</a></td>';
}else if ($status=="1") {
  echo '<td><a style="background:green" href="#" class="status_btn">Aprroved</a></td>';
}
else if ($status=="3")
{
    echo '<td><a style="background:green" href="#" class="status_btn">Completed</a></td>';
}
else {
  echo '<td><a style="background:red" href="#" class="status_btn">Rejected</a></td>';
}
  ?>

 <th scope="col">
 <div class="action_btns d-flex">
 <a href="view-reward.php?i=<?php echo $offer_row['id']; ?>" class="action_btn mr_10"> <i class="fa-solid fa-eye"></i> </a>
 </div>
 </th>
 </tr>
 <?php
 }
 ?>



<!-- end here  -->
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-12">
 </div>
</div>
</div>
</div>


</section>


<?php include 'inc/foot.php';?>
