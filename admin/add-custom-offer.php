<?php
include 'session.php';
include 'db.php';
include 'v.php'?>

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
          <h3 class="mb-0">Add Home Slidebar Banner</h3>
        </div>
        <div class="col-4 text-right">
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Save
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform" enctype="multipart/form-data">

        <div class="pl-lg-4">
          <div class="row">

            <div class="col-lg-12">
              <div class=" mb_15">
                <label class="form-control-label" for="input-email">Banner Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class=" mb_15">
                <label class="form-control-label" for="input-first-name">Sub Title</label>
                <input type="text" name="SubTitle" class="form-control" placeholder="Sub Title" value="">

                <input type="hidden" name="add-offer">
              </div>
            </div>

            <div class="col-lg-12">
              <div class="mb_15">
                <label class="form-control-label" for="input-first-name">Onclick Url</label>
                <input type="text" name="url" class="form-control" placeholder="Click Url" value="">
                

                <input type="hidden" name="add-offer">
              </div>
            </div>

            <div class="col-lg-12" class="input-group-append">
              <div class="input-group mb-3">
              

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
s
