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

<div class="white_card_body">
<div class="QA_section">
<div class="white_box_tittle list_header" style=" display: flex; margin-top: 16px; align-items: center; justify-content: space-between;">
<h4>Redeem</h4>
<div class="box_right d-flex lms_block">
<div class="add_button ml-10">
<a href="add-redeem.php" class="btn_1">Add New</a>
</div>
</div>
</div>
<div class="QA_table mb_30">

<table class="table lms_table_active ">
<thead>
<tr>
<th scope="col">Image</th>
<th scope="col">Name</th>
<th scope="col">Amount</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

 <!-- start here  -->


 <?php
 $sql = "SELECT * FROM reward";
 $offer = mysqli_query($link, $sql);
  while($offer_row = mysqli_fetch_assoc($offer)) {
   

 ?>
 <tr>
 <th scope="row"><img src="<?php echo $offer_row['image']; ?>" alt="" style="width: 80px;"></th>
 <td> <?php echo $offer_row['name']; ?></td>

 <td style="font-weight: bold;"> <?php echo @$offer_row['coins']." Coins = ".@$offer_row['symbol'].@$offer_row['amount'] ?> </td>

 <th scope="col">
 <div class="action_btns d-flex">
     
     <a href="redeem-list.php?i=<?php echo $offer_row['id']; ?>" class="action_btn mr_10"> <i class="fa-solid fa-list-ol"></i> </a>

 <a href="edit-redeem.php?i=<?php echo $offer_row['id']; ?>" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>

 <form action="admin_api.php" method="post">
   <input type="hidden" name="clm_name" value="reward">
   <input type="hidden" name="r_id" value="<?php echo $offer_row['id']; ?>">
   <input type="hidden" name="url" value="redeem.php">
   <input type="hidden" name="delt">
    <button style="border: none;" onclick="return confirm('Are you Sure')" type="submit" class="action_btn"> <i class="fas fa-trash"></i> </button>
 </form>
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
