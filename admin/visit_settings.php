<?php
include 'session.php';
include 'db.php';
include 'v.php';
include 'inc/head.php';
?>
<body class="crm_body_bg">
<?php 
include 'inc/nav.php';
include 'db.php' ; 
//session_start();
    $sql=mysqli_query($link, "SELECT * FROM visit_control");
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Website</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="update_visit_settings.php" method="post">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Website</h3>
                                </div>
                                <div class="card-body" style="padding:50px;">

                                    <div class="form-group">
                                        <label for="is_visit_enable">Website Enabled</label><br>
                                        <select name="is_visit_enable" class="form-control">
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="visit_title">Website Name</label><br>
                                        <input class="form-control" type="text" id="visit_title" name="visit_title"
                                            value="">
                                    </div>



                                    <div class="form-group">
                                        <label for="visit_link">Website Link</label><br>
                                        <input class="form-control" type="text" id="visit_link" name="visit_link"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="visit_coin">Website Coins</label><br>
                                        <input class="form-control" type="text" id="visit_coin" name="visit_coin"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="visit_timer">Website Timer (in minute)</label><br>
                                        <input class="form-control" type="text" id="visit_timer" name="visit_timer"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="browser">Website Open
                                            with:</label><br>
                                        <select name="browser" class="form-control">
                                            <option value="external">External</option>
                                            <option value="inapp">InApp</option>
                                        </select>
                                    </div>

                                    <input type="submit" name="submit" value="Add New Website"
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

<?php include 'inc/profile.php';?>
<!-- Content WrVideoer. Contains page content -->
<div class="content-wrapper form-center">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div>
                <br>
                <button type="button" data-toggle="modal" data-target="#addModal"
                    class="btn btn-block btn-success w-100">Add New Website</button>
                <br>

                <?php
                        for($i = 0;$i < $num;$i++) {
                    ?>
                <form action="update_visit_settings.php" method="post">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Website Setting <?php $pos = $i; echo($pos += 1)?></h3>
                                </div>
                                <div class="card-body" style="padding:50px;">

                                    <div class="form-group">
                                        <label for="is_visit_enable">Website Enabled</label><br>
                                        <select name="is_visit_enable" class="form-control">
                                            <?php
            	                                $op3 = ( ($row[$i]['is_visit_enable']) == "true" ) ? 'Yes' : 'No';
                                            ?>
                                            <option value="<?= ($row[$i]['is_visit_enable']) ?? '' ?>" hidden>
                                                <?= $op3 ?></option>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="visit_title">Website Name</label><br>
                                        <input class="form-control" type="text" id="visit_title" name="visit_title"
                                            value="<?php echo ($row[$i]['visit_title']);?>">
                                    </div>



                                    <div class="form-group">
                                        <label for="visit_link">Website Link</label><br>
                                        <input class="form-control" type="text" id="visit_link" name="visit_link"
                                            value="<?php echo ($row[$i]['visit_link']);?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="visit_coin">Website Coins</label><br>
                                        <input class="form-control" type="text" id="visit_coin" name="visit_coin"
                                            value="<?php echo ($row[$i]['visit_coin']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="visit_timer">Website Timer (in minute)</label><br>
                                        <input class="form-control" type="hidden" id="id" name="id"
                                            value="<?php echo ($row[$i]['id']);?>">
                                        <input class="form-control" type="text" id="visit_timer" name="visit_timer"
                                            value="<?php echo ($row[$i]['visit_timer']);?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="browser">Website Open
                                            with:</label><br>
                                        <select name="browser" class="form-control">
                                            <?php
            	                            $op3 = ( ($row[$i]['browser']) == "external" ) ? 'External' : 'InApp';
                                            ?>
                                            <option value="<?= ($_SESSION['browser']) ?? '' ?>"
                                                hidden><?= $op3 ?></option>
                                            <option value="external">External</option>
                                            <option value="inapp">InApp</option>
                                        </select>
                                    </div>
                                    
                                    <input type="submit" name="submit" value="Update Website"
                                            class="btn btn-block btn-primary w-100">
                                            <br>
                                    <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you Sure')" class="btn btn-danger btn-danger w-100">
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