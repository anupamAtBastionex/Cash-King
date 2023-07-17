<?php 
include 'session.php';
include 'db.php';
include 'v.php';
include 'inc/head.php';
?>
<style>
.pull-right
{
  float:right !important;
}
.pull-left
{
  float:left !important;
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
            <div class="col-4">
              <h3 class="mb-0">Send Notification</h3>
            </div>
            <div class="col-8 text-right">
              <button form="myform" class="btn btn-sm btn-primary" type="submit">Send</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <?php if(isset($_GET['msg'])){ ?>
            <a class="alert alert-warning pull-right"> <?php echo @$_GET['msg']; ?> </a>
          <?php } ?>
          
          <form id="myform" action="n_send.php" method="get" enctype="multipart/form-data">
            <h6 class="heading-small text-muted mb-4">Notification Details</h6>
             <fieldset>
                  <input type="hidden" id="redId" name="regId" class="pure-input-1-2" required="" placeholder="Enter firebase registration id">

                  <label for="title">Title</label>
                  <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
                  <br>
                  <label for="message">Message</label>
                  <textarea rows="5" name="message" id="message" class="form-control" placeholder="Notification message!"></textarea>
                  <input type="hidden" name="push_type" value="individual">
                  <br>
                  <label for="title">Image</label>
                  <input type="text" id="title" name="image" class="form-control" placeholder="https://..">
                   <label for="title">Small Icon</label>
                  <input type="text" id="small" name="small" class="form-control" placeholder="https://..">
                  
              </fieldset>
          </form>
        </div>
      </div>
</div>


</section>

<?php include 'inc/foot.php';?>
