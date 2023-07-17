<?php
include 'session.php';
include 'db.php';?>

<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];

  $sql = "SELECT * FROM ref_achi WHERE id =".$id;
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
          <a href="refer-task.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
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
                <input type="text" name="invites" class="form-control" placeholder="invites" value="<?php echo $row['invites']; ?>">
              </div>
            </div>
          </div>
          
            <div class="row">
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-email">Points</label>
                <input type="text" name="points" class="form-control" placeholder="points" value="<?php echo $row['points']; ?>">
                 <input type="hidden" name="edit-task" class="form-control" placeholder="points" value="<?php echo $row['id']; ?>">
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
