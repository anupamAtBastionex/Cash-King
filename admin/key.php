<?php
session_start();
include 'db.php';?>

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
<h3>Activation</h3>
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
<h5 class="modal-title text_white">Purchase Verification</h5>
</div>
<div class="modal-body">

<div class="text-center text-muted mb-4">
  <small>
<?php if($_SESSION['wrong_code']=="true"){
    unset($_SESSION['wrong_code']);
      echo "<div class='alert alert-warning' role='alert'>
        <span class='alert-icon'><i class='ni ni-like-2'></i></span>
        <span class='alert-text'><strong>Warning!</strong> Invalid purchase code!</span>
    </div>";
    }
    ?>
</small>
</div>

<form role="form" action="check_login.php" method="post">
<div class="form-group">
<input class="form-control" placeholder="Enter Item Purchase Code" name="purchase_code" type="text">
</div>
<button type="submit"class="btn_1 full_width text-center">Verify</button>

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