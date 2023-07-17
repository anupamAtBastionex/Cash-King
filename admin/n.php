<?php 
include 'db.php';
include 'session.php';
$sql = mysqli_query($link,"SELECT * FROM tbl_admin");
$res = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <title><?php echo $res['company']." - Update Game";?></title>


</head>

<body>
  <!-- Sidenav -->
 <?php include 'nav.php';
 ?>
  <!-- Main content -->
 
    <!-- Header -->
    <!-- Header -->
    <div class=" container-fluid header pb-6 d-flex align-items-right" >
    
      <!-- Header container -->
      
    </div>
    <br>
     <br>
    <!-- Page content -->
   <div class="container-fluid mt--6">
       
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-4">
                  <h3 class="mb-0">Send Notification</h3>
                </div>
                <div class="col-8 text-right">
                  <button form="myform" <?php echo $onclick;?> class="btn btn-sm btn-primary" type="submit">Send</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form id="myform" action="n_send.php" method="get" enctype='multipart/form-data'>
                <h6 class="heading-small text-muted mb-4">Notification Details</h6>
               <fieldset>
                
                    <input type="hidden" id="redId" name="regId" class="pure-input-1-2" required placeholder="Enter firebase registration id">
 
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
                    <br>
                    <label for="message">Message</label>
                    <textarea  rows="5" name="message" id="message" class="form-control" placeholder="Notification message!"></textarea>
                    <input type="hidden" name="push_type" value="individual"/>
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
        
      </div>
     

 
</body>

</html>