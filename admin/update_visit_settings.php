<?php
include 'db.php' ;
include 'demo.php';
if($demo){
    header('location:visit_settings.php');
}
else {

if(isset($_POST['submit'])){
    $is_visit_enable=$_POST['is_visit_enable'];
    $visit_title=$_POST['visit_title'];
    $visit_link=$_POST['visit_link'];
    $visit_coin=$_POST['visit_coin'];
    $visit_timer=$_POST['visit_timer'];
    $browser=$_POST['browser'];
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql="UPDATE visit_control SET is_visit_enable='$is_visit_enable',
        visit_title='$visit_title',
        visit_link='$visit_link',
        visit_coin='$visit_coin',
        visit_timer='$visit_timer',
        browser='$browser'
        WHERE id='$id'";
    }else{
        $sql = "INSERT INTO visit_control (is_visit_enable,visit_title,visit_link,visit_coin,visit_timer,browser) VALUES 
        ('$is_visit_enable','$visit_title','$visit_link','$visit_coin','$visit_timer','$browser')";
    }
    $query=mysqli_query($link,$sql);
    if($query){
        header('location:visit_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}else if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query=mysqli_query($link,"DELETE FROM visit_control WHERE id = '$id'");
    if($query){
        header('location:visit_settings.php');
    } else{
        echo (mysqli_error($link));
    }
}

}
?>