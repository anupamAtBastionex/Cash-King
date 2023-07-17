<?php
session_start();
include 'db.php';
include 'v.php';

 $verify_qry    = "SELECT * FROM license ORDER BY id DESC LIMIT 1";
 $verify_result = mysqli_query($link, $verify_qry);
  $verify_row   = mysqli_fetch_assoc($verify_result);
    $item_id    = $verify_row['package_name'];
    $purchase_code1    = $verify_row['license'];
if(isset($_POST['usernamee'])){
	$email=$_POST['usernamee'];
	 $password=$_POST['password'];
	 $pwd = hash('sha256', $password);

     //echo $pwd;die;
     //echo "SELECT * FROM tbl_admin WHERE username='$email' and password='$pwd'";die;
	$res=mysqli_query($link,"SELECT * FROM tbl_admin WHERE username='$email' and password='$pwd'");
	$num=mysqli_num_rows($res);
    //echo $num;die;
	if($num>=1)
    {
        $_SESSION['username']=$email;
		   // if ($item_id == $var_item_id) {

		   //   $_SESSION['username']=$email;
		   //                verify_code($purchase_code1,"false",$var_item_id,$var_personal_token,$link);
           //          } else {
           //              header("location: key.php");
           //          }
	}
	else{
		$_SESSION['wrong']=true;
		header('location:login.php');
	}
}



if(isset($_POST['purchase_code'])){
    $product_code = $_POST['purchase_code'];

    //verify_code($product_code,"true",$var_item_id,$var_personal_token,$link);
}

function verify_code($purchase_code,$isFromVerification,$item_id_my,$token,$con){
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.envato.com/v3/market/author/sale?code='.$purchase_code,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token
  ),
));

$envatoRes = curl_exec($curl);
curl_close($curl);
$envatoRes=json_decode($envatoRes);

 if (isset($envatoRes->item->name)) {
             $item_id=$envatoRes->item->id;
             $item_name=$envatoRes->item->name;
             $buyer=$envatoRes->buyer;
             $license=$envatoRes->license;
             $purchase_date=$envatoRes->sold_at;
            
            if ($item_id != $item_id_my) {
                  $_SESSION['wrong_code'] = true;
                  header('location:key.php');
            } else {
                mysqli_query($con,'TRUNCATE TABLE license');
                
                $q1=mysqli_query($con,"insert into license (license,package_name,is_blocked) values ('$purchase_code','$item_id','false')");
                
                if($q1){
                     if($isFromVerification == "true"){
                  header('location:login.php');
                  echo("zzzz"); 
              }else{
                  $_SESSION['login']=true;
                  header('location:index.php');
             }
                }else{
                  echo("hi".mysqli_error($con)); 
                }
            }
        } else { 
            $_SESSION['wrong_code'] = true;
          header('location:key.php');
          echo("zzzz");
        }
    
}

 $_SESSION['login']=true;
 //echo "asdfasdfs";die;
header('location:index.php');
?>