<?php
include 'session.php';
include 'db.php';
include 'v.php';
?>

<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];

  $sql = "SELECT * FROM offers WHERE id =".$id;
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
          <h3 class="mb-0">Edit Offer</h3>
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
                <label class="form-control-label" for="input-email">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Offer title" value="<?php echo $row['title']; ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-first-name">Sub Title</label>
                <input type="text" name="SubTitle" class="form-control" placeholder="Sub Title" value="<?php echo $row['sub']; ?>">
              </div>
            </div>

            <?php if ($row['type']=="1") {
            $url = $row['offer_name'];
              echo "  <div class='col-lg-12'>
                  <div class='common_input mb_15'>
                    <label class='form-control-label' for='input-first-name'>Onclick Url</label>
                    <input type='text' name='url' class='form-control' placeholder='Onclick Url' value='$url'>
                  </div>
                </div>";
            } ?>

          

            <div class="col-lg-12">
              <div class="common_input mb_15">
                <label class="form-control-label" for="input-first-name">Status</label>
                <select class="form-control" name="status">
                  <?php if ($row['status']=="0") {
                    echo '<option value="0">Active</option>
                          <option value="1">InActive</option>';
                  }else {
                    echo '<option value="1">InActive</option>
                          <option value="0">Active</option>';
                  } ?>


              </select>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="input-group mb-3">

              <div class="input-group-append" id="filele">
              <div class="thumb" style="padding: 10px 7px;background: #f5f6ff;border-radius: 10px;">
                 <img src="<?php echo $row['image']; ?>" alt="" style="height: 55px;">
            </div>
            </div>
            </div>
            </div>

             <div class="col-lg-12">
              <div class="input-group mb-3">

              <div class="input-group-append" id="filele">
              <span style="height: 38px;" class="input-group-text" id="basic-addon2" >
              <input type="file" name="fileToUpload" id="fileToUpload" style="width: 100%;">
              <input type="hidden" name="edit_offer" value="<?php echo $row['id']; ?>" >
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
