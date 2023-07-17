<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php include 'inc/head.php';?>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>


<div class="main_content_iner " style="min-height:0;margin-bottom: 0px;">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Add Redeem item</h3>
        </div>
        <div class="col-4 text-right">
          <a href="redeem.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Add
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform" enctype="multipart/form-data">

        <h6 class="heading-small text-muted mb-4">Redeem information</h6>
        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Coin</label>
                <input type="number" name="coins" class="form-control" placeholder="Set coins for ammount" value="">
              </div>
            </div>
             <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="example 10" value="">
                <input type="hidden" name="r_item" value="<?php echo $_GET['i']; ?>">
              </div>
            </div>

          </div>

        </div>

      </form>
    </div>
  </div>
</div>

<!--redeem item list-->

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="white_card card_height_100 mb_30">

<div class="white_card_body">
<div class="QA_section">

<div class="QA_table mb_30">

<table class="table lms_table_active ">
<thead>
<tr>

<th scope="col">#</th>
<th scope="col">Coin</th>
<th scope="col">Amount</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>

 <!-- start here  -->


 <?php
 if(!isset($_GET['i']))
 {
    header('Location: index.php');
    exit;
 }
 $id = $_GET['i'];
 $sql = "SELECT * FROM reward_amounts WHERE r_id = '$id'";
 $offer = mysqli_query($link, $sql);
 $count = 0;
  while($offer_row = mysqli_fetch_assoc($offer)) {
      $count++;
      
 ?>
 <tr>
 <td> <?php echo "".$count; ?></td>
 
  <td>  <?php echo $offer_row['coins']; ?></td>

 <td style="font-weight: bold;"><?php echo $offer_row['amount']; ?></td>

 <th scope="col">
 <div class="action_btns d-flex">

 <a href="edit-redeem-item.php?i=<?php echo $offer_row['id']; ?>" class="action_btn mr_10"> <i class="far fa-edit"></i></a>

 <form action="admin_api.php" method="post">
   <input type="hidden" name="clm_name" value="reward_amounts">
   <input type="hidden" name="r_id" value="<?php echo $offer_row['id']; ?>">
   <input type="hidden" name="url" value="redeem.php">
   <input type="hidden" name="delt">
 <button style="border: none;" type="submit" class="action_btn"> <i class="fas fa-trash"></i> </button>
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
