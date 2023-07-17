<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php include 'inc/head.php';?>
<body class="crm_body_bg">

<?php include 'inc/nav.php';?>

<?php 
include 'db.php' ; 
session_start();
    $sql=mysqli_query($link, "SELECT * FROM apps_control");
    $num=mysqli_num_rows($sql);
  if($num>=1){
    $row = array();
    while($to = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        array_push($row,$to);
    }
  }
?>


<section>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="update_apps_settings.php" method="post">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">App Settings</h3>
                                </div>
                                <div class="card-body" style="padding:50px;">

                                    <div class="form-group">
                                        <label for="is_enable">App Enabled</label><br>
                                        <select name="is_enable" class="form-control">
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="logo">App Logo (eg. Image Url)</label><br>
                                        <input class="form-control" type="text" id="logo" name="logo"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">App Name</label><br>
                                        <input class="form-control" type="text" id="title" name="title"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="_desc">App Description</label><br>
                                        <input class="form-control" type="text" id="_desc" name="_desc"
                                            value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="link">App Link</label><br>
                                        <input class="form-control" type="text" id="link" name="link"
                                            value="">
                                    </div>


                                    <div class="form-group">
                                        <label for="pkg">App Package Name</label><br>
                                        <input class="form-control" type="text" id="pkg" name="pkg"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="coin">App Coins</label><br>
                                        <input class="form-control" type="text" id="coin" name="coin"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="timer">App Timer (in minute)</label><br>
                                        <input class="form-control" type="text" id="timer" name="timer"
                                            value="">
                                    </div>
                                    <input type="submit" name="submit" value="Add New Application"
                                        class="btn btn-block btn-primary w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="main_content dashboard_part large_header_bg">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper form-center">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">
            
            <?php include 'inc/profile.php';?>

            <div>
                <br>
                <button type="button" data-toggle="modal" data-target="#addModal"
                    class="btn btn-block btn-success w-100">Add New Application</button>
                <br>

                <?php
                        for($i = 0;$i < $num;$i++) {
                    ?>
                <form action="update_apps_settings.php" method="post">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">App Setting <?php $pos = $i; echo($pos += 1)?></h3>
                                </div>
                                <div class="card-body" style="padding:50px;">

                                    <div class="form-group">
                                        <label for="is_enable">App Enabled</label><br>
                                        <select name="is_enable" class="form-control">
                                            <?php
                                            $op3 = ( ($row[$i]['is_enable']) == "true" ) ? 'Yes' : 'No';
                                            ?>
                                            <option value="<?= ($row[$i]['is_enable']) ?? '' ?>" hidden><?= $op3 ?>
                                            </option>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="logo">App Logo (eg. Image Url)</label><br>
                                        <input class="form-control" type="text" id="logo" name="logo"
                                            value="<?php echo ($row[$i]['logo']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">App Name</label><br>
                                        <input class="form-control" type="text" id="title" name="title"
                                            value="<?php echo ($row[$i]['title']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="_desc">App Description</label><br>
                                        <input class="form-control" type="text" id="_desc" name="_desc"
                                            value="<?php echo ($row[$i]['_desc']);?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="link">App Link</label><br>
                                        <input class="form-control" type="text" id="link" name="link"
                                            value="<?php echo ($row[$i]['link']);?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="pkg">App Package Name</label><br>
                                        <input class="form-control" type="text" id="pkg" name="pkg"
                                            value="<?php echo ($row[$i]['pkg']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="coin">App Coins</label><br>
                                        <input class="form-control" type="text" id="coin" name="coin"
                                            value="<?php echo ($row[$i]['coin']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="timer">App Timer (in minute)</label><br>
                                        <input class="form-control" type="hidden" id="id" name="id"
                                            value="<?php echo ($row[$i]['id']);?>">
                                        <input class="form-control" type="text" id="timer" name="timer"
                                            value="<?php echo ($row[$i]['timer']);?>">
                                    </div>
                                    <input type="submit" name="submit" value="Update"
                                        class="btn btn-block btn-primary w-100">
                                        <br>
                                    <input type="submit" name="delete" value="Delete"
                                        class="btn btn-block btn-danger w-100">    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                        }
                ?>
            </div>
        </div>

    </section>
</div>
</section>
</body>
<?php include 'inc/foot.php';?>