<?php
include 'db.php' ;
include 'demo.php';

if($demo){
    header('location:video_settings.php');
}else {
if(isset($_POST['submit'])){#
    $is_enable=$_POST['is_enable'];
    
    
    $title=$_POST['title'];
    
    $link1=$_POST['link'];

    
    $coin=$_POST['coin'];
    
    
    $timer=$_POST['timer'];

    $browser=$_POST['browser'];

    if(isset($_POST['id'])){
    $id=$_POST['id'];
    $sql="UPDATE video_control SET
    is_enable='$is_enable',title='$title',link='$link1',coin='$coin', timer='$timer',browser='$browser'
    WHERE id='$id'";
    }else {
        $sql="INSERT INTO video_control (is_enable,title,link,coin,timer,browser) VALUES ('$is_enable','$title','$link1','$coin','$timer','$browser')";
    }
    $query=mysqli_query($link,$sql);
    if($query){
        header('location:video_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}else if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query=mysqli_query($link,"DELETE FROM video_control WHERE id = '$id'");
    if($query){
        header('location:video_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}
}
?>