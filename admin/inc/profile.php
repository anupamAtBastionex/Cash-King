
<?php $sql = mysqli_query($link,"SELECT * FROM tbl_admin");
$res = mysqli_fetch_assoc($sql);
?>

<div class="container-fluid no-gutters">
<div class="row">
<div class="col-lg-12 p-0 ">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<label class="switch_toggle d-none d-lg-block" for="checkbox">
<input type="checkbox" id="checkbox">
<div class="slider round open_miniSide"></div>
</label>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">

<li>
<a class="bell_notification_clicker" href="notification.php"> <img src="img/icon/bell.svg" alt="">
<!--<span></span>-->
</a>

</li>

</div>
<div class="profile_info">
<img src="<?php echo $res['profile']; ?>" alt="#">
<div class="profile_info_iner">
<div class="profile_author_name">
<p><?php echo $_SESSION['username']; ?> </p>
</div>
<div class="profile_info_details">
<a href="profile.php">My Profile </a>
<a href="settings.php">Settings</a>
<a href="logout.php">Log Out </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>