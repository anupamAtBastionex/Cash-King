<?php
        include 'db.php';
        include 'v.php';
 $sql = mysqli_query($link,"SELECT * FROM tbl_admin");
$res = mysqli_fetch_assoc($sql);
        require_once 'firebase.php';
        require_once 'push.php';
 
        $firebase = new Firebase();
        $push = new Push();
 
        // optional payload
        $payload = array();
        $payload['team'] = 'India';
        $payload['score'] = '5.6';
 
        $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';
         
        // whether to include to image or not
        $include_image = isset($_GET['include_image']) ? TRUE : FALSE;
 
 
        $push->setTitle($title);
        $push->setMessage($message);
        if ($include_image) {
            $push->setImage('https://api.androidhive.info/images/minion.jpg');
        } else {
            $push->setImage('');
        }
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
 
        $json = '';
        $response = '';
         $success = 0;
          $fail = 0;
 
        if ($push_type == 'topic') {
            $json = $push->getPush();
            $response = $firebase->sendToTopic('global', $json);
        } else if ($push_type == 'individual') {

            $user_list=mysqli_query($link,"SELECT * FROM users");

            while($row=mysqli_fetch_array($user_list)){
                $fcm_id=$row['fcm_id'];

                 $json = $push->getPush();
            $regId = isset($fcm_id) ? $fcm_id : '';
            $response = $response.$firebase->send($regId, $json);
            
             $test_data= json_decode($firebase->send($regId, $json));
           if($test_data->success==1){
                $success = $success +1;
                }else{
                $fail = $fail +1;
                }
          

            }

        }
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <title><?php echo $res['company']." - Update Game";?></title>
  <?php include 'include_css.php';?>

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
       <div class="fl_window">
                
                <br/>
              
                <br/>
                <?php if ($response != '') { ?>
                    <label><b>Response:</b></label>
                    <div class="json_preview">
                          <pre><?php echo $success; ?></pre>
                             <pre><?php echo $fail; ?></pre>
                    </div>
                <?php } ?>
 
            </div>
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-4">
                  <h3 class="mb-0">Send Notification</h3>
                </div>
                <div class="col-8 text-right">
                  <button form="myform" type="submit" class="btn btn-sm btn-primary">Send</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form id="myform" action="" method="get" enctype='multipart/form-data'>
                <h6 class="heading-small text-muted mb-4">Notification Details</h6>
               <fieldset>
                
                    <input type="hidden" id="redId" name="regId" class="pure-input-1-2" placeholder="Enter firebase registration id">
 
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
                    <br>
                    <label for="message">Message</label>
                    <textarea  rows="5" name="message" id="message" class="form-control" placeholder="Notification message!"></textarea>
                    <input type="hidden" name="push_type" value="individual"/>
                    
                </fieldset>
              </form>
            </div>
          </div>
        
        </div>
        
      </div>
     
      <!-- Footer -->
     <?php include 'footer.php';?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
   <?php include 'include_js.php';?>
 
</body>

</html>