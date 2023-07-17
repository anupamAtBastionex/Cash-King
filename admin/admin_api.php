<?php
include 'session.php';
include 'db.php';
include 'demo.php';
include 'payment.php';
?>
<?php

if (isset($_POST['edit_offer'])) {
    if(!$demo) {
 $rand = rand();

  if (isset($_FILES["fileToUpload"])) {

if(!$_FILES["fileToUpload"]["name"]=="")
{

  $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]).$rand;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }

        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $title = $_POST['title'];
            $sub = $_POST['SubTitle'];
            $status = $_POST['status'];
              $file = url().$target_file;
              if (isset($_POST['url'])) {
                $url = $_POST['url'];
                $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status', `image`= '$file', `offer_name`= '$url' WHERE id=".$_POST['edit_offer'];
              }else {
                  $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status', `image`= '$file' WHERE id=".$_POST['edit_offer'];
              }

            $db = mysqli_query($link,$update_sql);
            if ($db) {
            header("Location: ".url());
            }else {echo mysqli_error($link);}

            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
}else {
  $file = url().$target_file;
  $title = $_POST['title'];
  $sub = $_POST['SubTitle'];
  $status = $_POST['status'];
  if (isset($_POST['url'])) {

    $url = $_POST['url'];
    $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status', `offer_name`= '$url' WHERE id=".$_POST['edit_offer'];
  }else {
      $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status' WHERE id=".$_POST['edit_offer'];
  }

  $db = mysqli_query($link,$update_sql);
  if ($db) {
  header("Location: ".url());
  }else {echo mysqli_error($link);}
}

 }else {
   $file = url().$target_file;
   $title = $_POST['title'];
   $sub = $_POST['SubTitle'];
   $status = $_POST['status'];
   if (isset($_POST['url'])) {
     $url = $_POST['url'];
     $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status', `offer_name`= '$url' WHERE id=".$_POST['edit_offer'];
   }else {
       $update_sql = "UPDATE `offers` SET `title`= '$title', `sub`= '$sub', `status`= '$status' WHERE id=".$_POST['edit_offer'];
   }

   $db = mysqli_query($link,$update_sql);
   if ($db) {
   header("Location: ".url());
   }else {echo mysqli_error($link);}

 }
}

else {
    header("Location: ".url());
}
}

if (isset($_POST['add_redeem'])) {
if(!$demo) {
 $rand = rand();
  if (isset($_FILES["fileToUpload"])) {

  $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]).$rand;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }

        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $payment_type     = $_POST['payment_type'];
            $name             = $_POST['name'];
            $symbol           = $_POST['symbol'];
            $hint             = $_POST['hint'];
            $type             = $_POST['type'];
            $more             = $_POST['more'];
            $file             = url().$target_file;

            $add_r            = "INSERT INTO reward (payment_type, name, image, symbol, hint, input_type, details) VALUES ('$payment_type', '$name', '$file', '$symbol', '$hint', '$type', '$more')";
          	$send_r= mysqli_query($link, $add_r);
            if ($send_r) {
            header("Location: redeem.php");
            }else {echo mysqli_error($link);}

            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
 }

}else {
    header("Location: redeem.php");
}
}

if (isset($_POST['delt'])) {
    $url = $_POST['url'];
    if(!$demo) {
  $clm_name = $_POST['clm_name'];
  $r_id = $_POST['r_id'];
 $sql = "DELETE FROM $clm_name WHERE id='$r_id'";
  $res = mysqli_query($link, $sql);
if ($res) {
    $reward_amount = "SELECT * FROM reward_amounts WHERE r_id='$r_id'";
    $res1 = mysqli_query($link, $reward_amount);
    while($row = $res1->fetch_array()) {
    $array[] = $row;
    }
    foreach ($array as $value) {
       $id = $value['id'];
       $delete = "DELETE FROM reward_amounts WHERE id = '$id'";
        $res2 = mysqli_query($link, $delete);
    }
header("Location: ".$url);
} else {
echo "Error deleting record: " . mysqli_error($conn);}
    }else {
        header("Location: ".$url);
    }
}

if (isset($_POST['edit_redeem'])) {

  //print_r($_POST);DIE;

if(!$demo) {

if(!$_FILES["fileToUpload"]["name"]=="")
{
    $rand = rand();


  $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]).$rand;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }


        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $payment_type = $_POST['payment_type'];
            $name         = $_POST['name'];
            $symbol       = $_POST['symbol'];
            $hint         = $_POST['hint'];
            $type         = $_POST['type'];
            $more         = $_POST['more'];
            $file         = url().$target_file;

            $up           = "UPDATE `reward` SET `payment_type`= '$payment_type', `name`= '$name', `symbol`= '$symbol', `hint`= '$hint', `input_type`= '$type',`image`= '$file',`details`= '$more' WHERE id=".$_POST['edit_redeem'];
            $db = mysqli_query($link, $up);

            if ($db) {
            header("Location: redeem.php");
            }else {  echo mysqli_error($link);}

            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
}else {
  $payment_type = $_POST['payment_type'];
  $name         = $_POST['name'];
  $coins        = $_POST['coins'];
  $amount       = $_POST['amount'];
  $symbol       = $_POST['symbol'];
  $hint         = $_POST['hint'];
  $type         = $_POST['type'];
  $more         = $_POST['more'];

      $up       = "UPDATE `reward` SET `payment_type`= '$payment_type', `name`= '$name', `symbol`= '$symbol', `hint`= '$hint', `input_type`= '$type', `details`= '$more' WHERE id=".$_POST['edit_redeem'];
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: redeem.php");
  }else {  echo mysqli_error($link);}
}
}else {
    header("Location: redeem.php");
}
}

if (isset($_POST['view_action'])) {
  if(!$demo) 
  {
      $name = $_POST['view_action'];
      if($name != 3)
      {
         $up = "UPDATE `reward_list` SET `status`= '$name' WHERE id = ".$_POST['view_id'];
         $db = mysqli_query($link,$up);
         if ($db) 
        {
           header("Location: redeem-request.php");
        } 
        else 
        {
          echo mysqli_error($link);
        }
      }
      else
      {
        $qry = "SELECT 
                    `users`.`name`,
                    `users`.`phone`,
                    `users`.`user_upi_id`,
                    `users`.`user_bank_ac_no`,
                    `users`.`user_ifsc_code`, 
                    `reward_list`.`p_details`,
                    `reward_list`.`amount`,
                    `reward_list`.`id`,
                    `reward`.`payment_type`
                FROM
                    `reward_list`
                    LEFT JOIN `users` ON `users`.`id` = `reward_list`.`u_id`
                    LEFT JOIN reward ON `reward`.`id` = `reward_list`.`package_id`
                WHERE
                    `reward_list`.`id` =".$_POST['view_id'];
        $rs = mysqli_query($link, $qry);
        $dataArr = mysqli_fetch_assoc($rs);
        if($dataArr['amount'] >= 100)
        {

           if($dataArr['payment_type'] == 'UPI')
            {
              $data = array(
                              "name"    =>  $dataArr['name'], 
                              "mobile"  =>  $dataArr['phone'],
                              "amount"  =>  $dataArr['amount'],
                              "upi"     =>  $dataArr['user_upi_id'],// UPI ID
                              "note"    =>  "Pay ".substr($dataArr['name'], 0, 5).".Amt:".$dataArr['amount'],
                              "orderid" =>  "ORDUPI".mt_rand(11111111, 99999999)
                            );
             $resp = upiPayment($data);

            }
            else if($dataArr['payment_type'] == 'BANK')
            {
              $data =  array(
                              "name"     =>   $dataArr['name'], //"Anupam Singh",
                              "mobile"   =>   $dataArr['phone'], //"7505471128",
                              "account"  =>   $dataArr['user_bank_ac_no'], //"33021529402",
                              "ifsc"     =>   $dataArr['user_ifsc_code'], //"SBIN016472",
                              "amount"   =>   $dataArr['amount'],
                              "note"     =>   "Pay ".substr($dataArr['name'], 0, 5).".Amt:".$dataArr['amount'],
                              "orderid"  =>   "ORDBTR".mt_rand(11111111, 99999999)
                            );
              $resp = bankTranser($data);
               //echo "yes";die;
            }else{
              $_SESSION['resp'] = 'Payment Mode not Identified! It should be only "UPI" or "Bank Transfer"';
              header("Location: redeem-request.php?resp=".'Payment Mode not Identified! It should be only "UPI" or "Bank Transfer"');
              exit();
            }
            if($resp == 'SUCCESS')
            {
              $up = "UPDATE `reward_list` SET `status`= '$name' WHERE id = ".$_POST['view_id'];
              $db = mysqli_query($link,$up);
              $msg = "Payment Transfer Successfully!";
            }else{
              $msg = $resp;
            }
            $_SESSION['resp'] = $msg;
            header("Location: redeem-request.php?resp=".$msg);
            exit();
        }else{
          $_SESSION['resp'] = "Amount Should be greater equal or greater 100.";
           header("Location: redeem-request.php?resp=Amount Should be greater equal or greater than 100.");
              exit();
        }
        $_SESSION['resp'] = $resp;
       header("Location: redeem-request.php?resp=".$resp);
       exit();
      } 
  }else {
      header("Location: redeem-request.php");
         exit();
  }
}


if (isset($_POST['add-offer'])) {
    
    if(!$demo) {

  if (isset($_FILES["fileToUpload"])) {

  $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }


        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $title = $_POST['title'];
            $SubTitle = $_POST['SubTitle'];
            $url = $_POST['url'];
            $file = url().$target_file;
            $add_r = "INSERT INTO offers (title,image,sub,offer_name,type) VALUES ('$title','$file','$SubTitle','$url','1')";
           $send_r= mysqli_query($link,$add_r);
            if ($send_r) {
            header("Location: ".url());
            }else {
              echo mysqli_error($link);
            }
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

 }else {

   $title = $_POST['title'];
   $SubTitle = $_POST['SubTitle'];
   $add_r = "INSERT INTO offers (title,sub,offer_name,type) VALUES ('$title','$SubTitle','$url','1')";
 	$send_r= mysqli_query($link,$add_r);
   if ($send_r) {
   header("Location: ".url());
   }else {
     echo mysqli_error($link);
   }
 }
} else {
    header("Location: ".url());
}

}

if (isset($_POST['settings_user'])) {
    
    if(!$demo) {

  $d_b = $_POST['d_b'];
  $spin = $_POST['spin'];
  $Invited = $_POST['Invited'];
  $Referral = $_POST['Referral'];
  $Shere = $_POST['Shere'];
  $app_id = $_POST['os_app_id'];
  $api = $_POST['os_rest_api'];
  $scratch_limit = $_POST['scratch_limit'];
  $scratch_count_beetween = $_POST['scratch_count_beetween'];
  $daily_video_limit = $_POST['daily_video_limit'];

  $up = "UPDATE `settings` SET `daily_b_points`= '$d_b', `invited_user_bonus`= '$Invited', `referral_bonus`= '$Referral', `refer_msg`= '$Shere', `daily_spins`= '$spin',`os_app_id`= '$app_id', `os_rest_api`= '$api',`scratch_limit`='$scratch_limit', `scratch_count_beetween` = '$scratch_count_beetween',`daily_video_limit`='$daily_video_limit'";
  $db = mysqli_query($link,$up);

  if ($db) {

  header("Location: settings.php");
  }
  else {  echo mysqli_error($link);
  }
    }else {
        header("Location: settings.php");
    }
}

if (isset($_POST['settings_wall'])) {
    
    if(!$demo) {

  $ot_app = $_POST['ot_app'];
  $ot_k = $_POST['ot_k'];
  $p_id = $_POST['p_id'];
  $adg = $_POST['adg'];
  $OT_PUB = $_POST['ot_pub'];

  $up = "UPDATE `settings` SET `OT_APP_ID`= '$ot_app', `OT_KEY`= '$ot_k', `PF_ID`= '$p_id', `AG_WALLCODE`= '$adg',`OT_PUB`= '$OT_PUB'";
  $db = mysqli_query($link,$up);

  if ($db) {

  header("Location: settings.php");
  }
  else {  echo mysqli_error($link);
  }
    }else {
        header("Location: settings.php");
    }
}

if (isset($_POST['edit_user'])) {
    
    if(!$demo) {

  $u = $_POST['edit_user'];

  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $points = $_POST['points'];

  $up = "UPDATE `users` SET `email`= '$email', `name`= '$name', `phone`= '$phone', `points`= '$points' WHERE username = '$u'";
  $db = mysqli_query($link,$up);

  if ($db) {

  header("Location: users.php");
  }
  else {  echo mysqli_error($link);
  }
    }else {
        header("Location: users.php");
    }
}

if(isset($_POST['admin_update'])){
$u = $_POST['admin_update'];
if(!$demo) {
$rand = rand();
  if(!basename($_FILES["fileToUpload"]["name"])=="")
  {

    $target_dir = "img/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]).$rand;
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              echo "File is not an image.";
              $uploadOk = 0;
            }

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $pro = url().$target_file;


              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
  }else {
  $pro = $_POST['pro'];
echo "this";
  }

    if(isset($_POST['old']) && isset($_POST['new']) && !$_POST['old']=="" && !$_POST['new']==""){
      $old = $_POST['old'];
      $new = $_POST['new'];
        $old_pass = hash('sha256', $old);
        $new_pass = hash('sha256', $new);
        $check = mysqli_query($link,"SELECT * FROM tbl_admin");
        $re = mysqli_fetch_assoc($check);
        if($re['password']==$old_pass){
          $email = $_POST['email'];
          $name = $_POST['name'];
          $company = $_POST['company'];
          $username = $_POST['username'];
                $update = mysqli_query($link,"UPDATE tbl_admin SET email='$email',name='$name',company='$company', password='$new_pass', profile='$pro',username = '$username'");
            if($update){ 
                header("Location: profile.php");
            }else {
                echo "Update Failed With Password";
            }
        }else {
            echo "Password Not Match";
        }
    }else {
      $email = $_POST['email'];
      $name = $_POST['name'];
      $company = $_POST['company'];
      $username = $_POST['username'];
            $update = mysqli_query($link,"UPDATE tbl_admin SET email='$email',name='$name',company='$company' , profile='$pro', username='$username'");
            if($update){
                header("Location: profile.php");
            }else {
                echo "Update Failed";
            }
    }
}else {
    header("Location: profile.php");
}
}

if (isset($_POST['edit-task'])) {
    if(!$demo) {
  $invites = $_POST['invites'];
  $points = $_POST['points'];
  $up = "UPDATE `ref_achi` SET `invites`= '$invites', `points`= '$points' WHERE id=".$_POST['edit-task'];
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: refer-task.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: refer-task.php");
    }
}

if (isset($_POST['vpn_check'])) {
    if(!$demo) {
    if (isset($_POST['vpn'])) {
        $vpn = 1;
    }else
    {
        $vpn = 0;
    }
    
     if (isset($_POST['use_multiple_account'])) {
        $use_multiple_account = 1;
    }else
    {
        $use_multiple_account = 0;
    }
    
  $vpn = $_POST['vpn'];
  if($vpn==0 or $vpn == 1){
  
  $up = "UPDATE `settings` SET `vpn`= '$vpn', `use_multiple_account` = '$use_multiple_account'";
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: settings.php");
  }else {
    echo mysqli_error($link);
  }
  }else
    {
        echo "Invalid value";
    }
    }else {
        header("Location: settings.php");
    }
}

if ($_POST['consoliads_app_signature']) {
     if(!$demo) {
    $consoliads_app_signature = $_POST['consoliads_app_signature'];
    $iron_source_app_key = $_POST['iron_source_app_key'];
    $yodo_app_key = $_POST['yodo_app_key'];
    $chartboost_app_id = $_POST['chartboost_app_id'];
    $chartboost_app_signature = $_POST['chartboost_app_signature'];
    $vungle_app_id = $_POST['vungle_app_id'];
    $adcolony_app_id = $_POST['adcolony_app_id'];
    $start_io_app_id = $_POST['start_io_app_id'];
    $unity_game_id = $_POST['unity_game_id'];
    $admob_app_id = $_POST['admob_app_id'];
    $unity_banner_id = $_POST['unity_banner_id'];
    $spin_count = $_POST['spin_count'];
    $scratch_count = $_POST['scratch_count'];
    $banner_ad_type = $_POST['banner_ad_type'];
    $applovin_banner_id = $_POST['applovin_banner_id'];
    $adcolony_banner_id = $_POST['adcolony_banner_id'];
    $vungle_banner_id = $_POST['vungle_banner_id'];
    $interstital_ad_type = $_POST['interstital_ad_type'];
    $rewarded_ad_type = $_POST['rewarded_ad_type'];
    $applovin_interstital_id = $_POST['applovin_interstital_id'];
    $unity_interstital_id = $_POST['unity_interstital_id'];
    $adcolony_interstital_id = $_POST['adcolony_interstital_id'];
    $vungle_interstital_id = $_POST['vungle_interstital_id'];
    $native_ad_type = $_POST['native_ad_type'];
    $applovin_native_id = $_POST['applovin_native_id'];
    $applovin_rewarded_id = $_POST['applovin_rewarded_id'];
    $unity_rewarded_id = $_POST['unity_rewarded_id'];
    $adcolony_rewarded_id = $_POST['adcolony_rewarded_id'];
    $vungle_rewarded_id = $_POST['vungle_rewarded_id'];
    $admob_rewarded_id = $_POST['admob_rewarded_id'];
    $spin_count_per_day = $_POST['spin_count_per_day'];
    
     $up = "UPDATE `settings` SET `consoliads_app_signature`= '$consoliads_app_signature', `iron_source_app_key` = '$iron_source_app_key', `yodo_app_key` = '$yodo_app_key', `chartboost_app_id` = '$chartboost_app_id'
     , `chartboost_app_signature`='$chartboost_app_signature', `vungle_app_id`='$vungle_app_id', `adcolony_app_id`='$adcolony_app_id', `start_io_app_id`='$start_io_app_id',
     `unity_game_id`='$unity_game_id', `spin_count`='$spin_count', `banner_ad_type`='$banner_ad_type', `applovin_banner_id`='$applovin_banner_id', `adcolony_banner_id`='$adcolony_banner_id', `vungle_banner_id`='$vungle_banner_id', `interstital_ad_type`= '$interstital_ad_type',`applovin_interstital_id`='$applovin_interstital_id',`unity_interstital_id`='$unity_interstital_id',`adcolony_interstital_id`='$adcolony_interstital_id', `vungle_interstital_id`='$vungle_interstital_id',`native_ad_type`='$native_ad_type',`applovin_native_id`='$applovin_native_id',`applovin_rewarded_id`='$applovin_rewarded_id',`unity_rewarded_id`='$unity_rewarded_id',`adcolony_rewarded_id`='$adcolony_rewarded_id',`vungle_rewarded_id`='$vungle_rewarded_id',`admob_rewarded_id`='$admob_rewarded_id',`unity_banner_id`='$unity_banner_id',`admob_app_id`='$admob_app_id',`rewarded_ad_type`='$rewarded_ad_type',`spin_count_per_day`='$spin_count_per_day',`scratch_count`='$scratch_count'";
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: settings.php");
  }else {
    echo mysqli_error($link);
  }
  
}else {
        header("Location: settings.php");
    }
}

if ($_POST['add-task']) {
    if(!$demo) {
  $invites = $_POST['invites'];
  $points = $_POST['points'];
  $register_user = "INSERT INTO ref_achi (invites,points) VALUES ('$invites','$points')";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
  header("Location: refer-task.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: refer-task.php");
    }
}

if ($_POST['r_item']) {
    if(!$demo) {
  $coins = $_POST['coins'];
  $amount = $_POST['amount'];
  $r_id = $_POST['r_item'];
  $register_user = "INSERT INTO reward_amounts (coins,amount,r_id) VALUES ('$coins','$amount','$r_id')";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
  header("Location: redeem-list.php?i=".$_POST['r_item']);
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: redeem-list.php?i=".$_POST['r_item']);
    }
}

if (isset($_POST['edit_r_item'])) {
    if(!$demo) {
  $coins = $_POST['coins'];
  $amount = $_POST['amount'];
  $r_id = $_POST['edit_r_item'];
  $up = "UPDATE `reward_amounts` SET `coins`= '$coins', `amount`= '$amount' WHERE id=".$r_id;
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: redeem.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: redeem.php");
    }
}

if (isset($_POST['eboot'])) {
    
    if(!$demo) {

  if (isset($_FILES["fileToUpload"])) {

  $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "examples/eboot.".$imageFileType)) {
          
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            header("Location: settings.php");
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }

 }
    }else {
        header("Location: settings.php");
    }
}

if ($_POST['game_name']) {
    if(!$demo) {
  $name = $_POST['game_name'];
  $image = $_POST['image'];
  $url = $_POST['url'];
  $register_user = "INSERT INTO games (title,image,game) VALUES ('$name','$image','$url')";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
  header("Location: game.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: game.php");
    }
}

if (isset($_POST['edit_game_name'])) {
    if(!$demo) {
 $name = $_POST['edit_game_name'];
  $image = $_POST['image'];
  $url = $_POST['url'];
  $up = "UPDATE `games` SET `title`= '$name', `image`= '$image', `game`= '$url' WHERE id=".$_POST['game_id'];
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: game.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: game.php");
    }
}

if ($_POST['a_title']) {
    if(!$demo) {
  $a_title = $_POST['a_title'];
  $image = $_POST['image'];
  $url = $_POST['url'];
  $points = $_POST['points'];
  $time = $_POST['time'];
  $register_user = "INSERT INTO readTask (title,image,points,time,url) VALUES ('$a_title','$image','$points','$time','$url')";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
  header("Location: article.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: article.php");
    }
}

if (isset($_POST['aa_title'])) {
    if(!$demo) {
  $a_title = $_POST['aa_title'];
  $image = $_POST['image'];
  $url = $_POST['url'];
  $points = $_POST['points'];
  $time = $_POST['time'];
  $up = "UPDATE `readTask` SET `title`= '$a_title', `image`= '$image', `points`= '$points', `time`= '$time', `url`= '$url' WHERE id=".$_POST['a_id'];
  $db = mysqli_query($link,$up);
  if ($db) {
  header("Location: article.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: article.php");
    }
}

if ($_POST['afbads']) {
    if(!$demo) {
  $fbadsunit = $_POST['afbads'];
  $fbadtime = $_POST['afbtime'];
  $register_user = "UPDATE `settings` SET `fb_ad_id`= '$fbadsunit', `fb_ad_time`= '$fbadtime'";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
  header("Location: settings.php");
  }else {
    echo mysqli_error($link);
  }
    }else {
        header("Location: settings.php");
    }
}

if ($_POST['user_b']) {
    if(!$demo) {
  $id = $_POST['user_b'];
  $status = $_POST['status'];
  $register_user = "UPDATE `users` SET `status`= '$status' WHERE id = '$id'";
	$send_server= mysqli_query($link,$register_user);
  if ($send_server) {
      if(!isset($_POST['r']))
      {
  header("Location: users.php");
      }else
      {
         header("Location: redeem-request.php"); 
      }
  }else {
    echo mysqli_error($link);
  }
    }else {
         if(!isset($_POST['r']))
      {
  header("Location: users.php");
      }else
      {
         header("Location: redeem-request.php"); 
      }
    }
}


 ?>