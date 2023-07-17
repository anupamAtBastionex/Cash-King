<?php
include 'db.php' ;

include 'demo.php';

if($demo){
    header('location:apps_settings.php');
}else {

if(isset($_POST['submit'])){
    $is_a1_enable=$_POST['is_enable'];
    $a1_logo=$_POST['logo'];
    $a1_title=$_POST['title'];
    $a1_desc=$_POST['_desc'];
    $a1_link=$_POST['link'];
    $a1_pkg=$_POST['pkg'];
    $a1_coin=$_POST['coin'];
    $a1_timer=$_POST['timer'];
    
    if(isset($_POST['id'])){
     $id = $_POST['id'];
    $sql="UPDATE apps_control SET
    is_enable='$is_a1_enable',
    logo='$a1_logo',
    title='$a1_title',
    _desc='$a1_desc',
    link='$a1_link',
    pkg='$a1_pkg',
    coin='$a1_coin',
    timer='$a1_timer'
    WHERE id='$id'";
    }else{
        $sql = "INSERT INTO apps_control (is_enable,logo,title,_desc,link,pkg,coin,timer) VALUES 
        ('$is_a1_enable','$a1_logo','$a1_title','$a1_desc','$a1_link','$a1_pkg','$a1_coin','$a1_timer')";
    }
    $query=mysqli_query($link,$sql);
    if($query){
        header('location:apps_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}else if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query=mysqli_query($link,"DELETE FROM apps_control WHERE id = '$id'");
    if($query){
        header('location:apps_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}
}
?>