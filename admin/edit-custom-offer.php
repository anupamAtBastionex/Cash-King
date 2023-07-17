<?php include 'inc/head.php';?>
<style media="screen">

  @media only screen and (max-width: 450px) {
.col-lg-12  #filele {
    margin-top:10px;
  }
}
</style>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<section class="main_content dashboard_part large_header_bg">

<?php include 'inc/profile.php';?>

<div class="main_content_iner ">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Add Offer</h3>
        </div>
        <div class="col-4 text-right">
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Save
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="common_co.php" method="post" id="myform">

        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Title</label>
                <input type="text" name="offername" class="form-control" placeholder="offertoro" value="offertoro">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-first-name">Url</label>
                <input type="text" name="SubTitle" class="form-control" placeholder="url" value="url">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="offer_image.png" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled>

              <div class="input-group-append" id="filele">
              <span style="height: 38px;" class="input-group-text" id="basic-addon2">
              <input style="width: 100%;" id="file-upload" onchange="readURL(this);" name="offer_image" accept="image/png, image/jpeg, image/jpg" type="file">
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
s