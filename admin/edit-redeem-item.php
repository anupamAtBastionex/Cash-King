<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php include 'inc/head.php';?>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

 <?php
 if(!isset($_GET['i']))
 {
    header('Location: index.php');
    exit;
 }
 $id = $_GET['i'];
 $sql = "SELECT * FROM reward_amounts WHERE id = '$id'";
 $offer = mysqli_query($link, $sql);
 $offer_row = mysqli_fetch_assoc($offer);
      
      
 ?>


<div class="main_content_iner " style="min-height:0;margin-bottom: 0px;">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Edit Redeem item</h3>
        </div>
        <div class="col-4 text-right">
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Update
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform" enctype="multipart/form-data">

        
        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Coin</label>
                <input type="number" name="coins" class="form-control" placeholder="Set coins for amount" value="<?php  echo $offer_row['coins'] ?>">
              </div>
            </div>



             <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="example $10" value="<?php echo $offer_row['amount'] ?>">
                <input type="hidden" name="edit_r_item" class="form-control" placeholder="example $10" value="<?php echo $offer_row['id']; ?>">
              </div>
            </div>

          </div>

        </div>

      </form>
    </div>
  </div>
</div>


</section>

<?php include 'inc/foot.php';?>
