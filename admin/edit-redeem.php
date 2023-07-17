<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];

  $sql = "SELECT * FROM reward WHERE id =".$id;
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
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
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Add Redeem</h3>
        </div>
        <div class="col-4 text-right">
          <a href="redeem.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Save
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform"  enctype="multipart/form-data">

        <h6 class="heading-small text-muted mb-4">User information</h6>
        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Payment Mode</label>
                <select class="form-control" name="payment_type">
                <option value="BANK" <?php echo ($row['payment_type'] == 'BANK')? 'selected' : ''; ?>>Bank Transfer</option>
               </select>
             </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Symbol</label>
                <input type="text" name="symbol" class="form-control" placeholder="Currency symbol ($,₹)" value="<?php echo $row['symbol']; ?>">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Hint</label>
                <input type="text" name="hint" class="form-control" placeholder="Hint" value="<?php echo $row['hint']; ?>">
                <input type="hidden" name="edit_redeem" value="<?php echo $row['id']; ?>">
              </div>
            </div>
            
             <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Details</label>
                <input type="text" name="more" class="form-control" placeholder="Details" value="<?php echo $row['details']; ?>">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Input Type</label>
                <select class="form-control" name="type">
                  <?php echo '<option value="text">'.$row['input_type'].'</option>'; ?>
                <option value="text">Text</option>
                <option value="email">Email</option>
                <option value="phone">Phone Number</option>
                <option value="number">Number</option>
               </select>
               </div>
            </div>

             <div class="col-lg-12">
              <div class="input-group mb-3" style="gap: 8px;align-items: center;">
              
               <div class="thumb" style="padding: 10px 7px;background: #f5f6ff;border-radius: 10px;">
                 <img src="<?php echo $row['image']; ?>" alt="" style="height: 25px;">
            </div>
        

              <div class="input-group-append" id="filele">
              <span style="height: 38px;" class="input-group-text" id="basic-addon2">
              <input style="width:100%" type="file" name="fileToUpload" id="fileToUpload">
              </span>
            </div>
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
