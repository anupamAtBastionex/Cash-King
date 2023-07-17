 <?php
include '../db.php';

if(isset($_REQUEST['get_video_settings'])){
    $query=mysqli_query($link,"SELECT * FROM video_control");
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
		}
	else{
		$response['status']=False;
		$response['message']='No Video Settings Found';
		$response['error']=mysqli_error($link);
	}
	echo json_encode($response);
	exit();
}


?>