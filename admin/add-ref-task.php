<?php
include 'session.php';
include 'db.php';
include 'v.php';?>

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
          <h3 class="mb-0">Edit Task</h3>
        </div>
        <div class="col-4 text-right">
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Update
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform">

        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Invites Needed</label>
                <input type="number" name="invites" class="form-control" placeholder="invites" value="">
              </div>
            </div>
          </div>
          
            <div class="row">
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Points</label>
                <input type="number" name="points" class="form-control" placeholder="points" value="">
                 <input type="hidden" name="add-task" class="form-control" placeholder="points" value="Points">
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
