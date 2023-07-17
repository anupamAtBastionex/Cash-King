 <?php
include '../db.php';

if(isset($_REQUEST['get_apps_settings'])){
    $query=mysqli_query($link,"SELECT * FROM apps_control");
    $num=mysqli_num_rows($query);
    $response['number of rows']=$num;
	if($num>=1){
		$response=array();
		$response['status']=True;
		$row = array();
	while($to = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($row,$to);
	}
		$response['data']=$row;
		$response['date']=date('d-m-Y');
	}
	else{
		$response['status']=False;
		$response['date']=date('d-m-Y');
		$response['message']='No Apps Settings Found';
		$response['error']=mysqli_error($link);
	}
	echo json_encode($response);
	exit();
}


?>