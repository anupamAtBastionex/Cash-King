
<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


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
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Save
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform" enctype="multipart/form-data">

        <h6 class="heading-small text-muted mb-4">User information</h6>
        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Payment Mode</label>
                <select class="form-control" name="payment_type" required>
                <option value="UPI">UPI (Unified Payments Transfer)</option>
                <option value="BANK">Bank Transfer</option>
               </select>
             </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="Name" required>
              </div>
            </div>

             <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Symbol</label>
                <input type="text" name="symbol" class="form-control" placeholder="Currency symbol ($,₹)" value="">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Hint</label>
                <input type="text" name="hint" class="form-control" placeholder="Hint" value="">
                <input type="hidden" name="add_redeem">
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Details</label>
                <input type="text" name="more" class="form-control" placeholder="Details" value="">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Input Type</label>
            <select class="form-control" name="type">
            <option value="text">Text</option>
            <option value="email">Email</option>
            <option value="phone">Phone Number</option>
            <option value="number">Number</option>
           </select>
           </div>
          </div>

             <div class="col-lg-12">
              <div class="input-group mb-3">

              <div class="input-group-append" id="filele">
              <span style="height: 38px;" class="input-group-text" id="basic-addon2">
               <input style="width:100%" type="file" name="fileToUpload" id="fileToUpload" required>
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
