
<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];

  $sql = "SELECT * FROM users WHERE username = '$id'";
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
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="users.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
                  <button type="submit" form="myform" class="btn btn-sm btn-primary">Save</button>
              </div>
              </div>
            </div>
            <div class="card-body">
              <form action="admin_api.php" method="post" id="myform">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" readonly="readonly" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" id="input-email" class="form-control" placeholder="jesse@example.com" value="<?php echo $row['email']; ?>">
                    
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input type="text" id="input-first-name" name="name" class="form-control" placeholder="First name" value="<?php echo $row['name']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Phone</label>
                        <input type="text" id="input-last-name" name="phone" class="form-control" placeholder="Last name" value="<?php echo $row['phone']; ?>">
                        <input type="hidden" name="edit_user" value="<?php echo $row['username']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Points &amp; Earn</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Points</label>
                        <input id="input-address" class="form-control" name="points" value="<?php echo $row['points']; ?>" placeholder="Current Pass" type="number">
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
