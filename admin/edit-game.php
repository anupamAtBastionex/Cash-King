<?php
include 'session.php';
include 'db.php';
include 'v.php';?>

<?php
if (isset($_GET['i']))
{
  $id = $_GET['i'];

  $sql = "SELECT * FROM games WHERE id =".$id;
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
          <h3 class="mb-0">Edit Game</h3>
        </div>
        <div class="col-4 text-right">
          <a href="game.php" class="btn btn-sm btn-warning text-right"><i class="fas fa-arrow-left"></i> Back</a>
          <button type="submit" form="myform" class="btn btn-sm btn-primary">Update
        </button></div>
      </div>
    </div>
    <div class="card-body">
      <form action="admin_api.php" method="post" id="myform" enctype="multipart/form-data">
        

    
                
            <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input name="edit_game_name" type="text" id="input-username" class="form-control" placeholder="Game Name" value="<?php echo $row['title']; ?>"
                      </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Image Url</label>
                        <input type="url" name="image" id="input-email" class="form-control" placeholder="Image Url" value="<?php echo $row['image']; ?>">
                    <img style="margin-right: 15px;height: 55px;width: 55px;border-radius: 20px;border: 2px solid #fff;box-shadow: 0 2px 5px rgb(0 0 0 / 10%); margin-top:10px;" src="<?php echo $row['image']; ?>" alt="User Img">
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Game Url</label>
                        <input type="url" id="input-first-name" name="url" class="form-control" placeholder="Game Url" value="<?php echo $row['game']; ?>">
                        <input type="hidden" name="game_id" value="<?php echo $row['id']; ?>">
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
