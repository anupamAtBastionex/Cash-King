<?php
session_start();
include 'db.php';
include 'v.php';

$sql = mysqli_query($link,"SELECT * FROM tbl_admin");
$res = mysqli_fetch_assoc($sql);
$_SESSION['company']=$res['company'];
?>
<?php include 'inc/head.php';?>
<body class="crm_body_bg">

<section class="main_content dashboard_part large_header_bg" style="padding: 0;">

<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-12">
<div class="dashboard_header mb_50">
<div class="row">
<div class="col-lg-6">
<div class="dashboard_header_title">
<h3><?php echo $res['company'];?>- Login</h3>
</div>
</div>

</div>
</div>
</div>
<div class="col-lg-12">
<div class="white_box mb_30">
<div class="row justify-content-center">
<div class="col-lg-6">

<div class="modal-content cs_modal">
<div class="modal-header justify-content-center theme_bg_1">
<h5 class="modal-title text_white">Log in</h5>
</div>
<div class="modal-body">

<div class="text-center text-muted mb-4">
  <small>
<?php if(@$_SESSION['wrong']=='true'){
    unset($_SESSION['wrong']);
      echo "<div class='alert alert-warning' role='alert'>
        <span class='alert-icon'><i class='ni ni-like-2'></i></span>
        <span class='alert-text'><strong>Warning! </strong> Invalid login details!</span>
    </div>";
    }
    ?></small>
</div>

<form role="form" action="check_login.php" method="post">
<div class="form-group">
<input class="form-control" placeholder="Username" name="usernamee" type="text">
</div>
<div class="form-group">
<input class="form-control" placeholder="Password" name="password" type="password">
</div>
<button type="submit"class="btn_1 full_width text-center">Log in</button>

</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</section>

<script src="js/jquery-3.4.1.min.js"></script>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="vendors/scroll/scrollable-custom.js"></script>

<script src="js/custom.js"></script>

</body>
</html>