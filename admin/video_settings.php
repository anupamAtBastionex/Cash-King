<?php
include 'session.php';
include 'db.php';
include 'v.php';?>


<?php include 'inc/head.php';?>

<body class="crm_body_bg">
    
<?php include 'inc/nav.php';?>    

<?php
//include 'db.php' ; 
//session_start();

$sql=mysqli_query($link, "SELECT * FROM video_control");
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_video_settings.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Video Settings</h3>
                                    </div>
                                    <div class="card-body" style="padding:50px;">

                                        <div class="form-group">
                                            <label for="is_enable">Video Enabled</label><br>
                                            <select name="is_enable" class="form-control">
                                                <option value="true">Yes</option>
                                                <option value="false">No</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Video Name</label><br>
                                            <input class="form-control" type="text" id="title" name="title" value="">
                                        </div>


                                        <div class="form-group">
                                            <label for="link">Video Link</label><br>
                                            <input class="form-control" type="text" id="link" name="link" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="coin">Video Coins</label><br>
                                            <input class="form-control" type="text" id="coin" name="coin" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="timer">Video Timer (in minute)</label><br>
                                            <input class="form-control" type="text" id="timer" name="timer" value="">
                                        </div>

                                        <div class="form-group">
                                        <label for="browser">Video Open
                                            with:</label><br>
                                        <select name="browser" class="form-control">
                                            <option value="external">External</option>
                                            <option value="inapp">InApp</option>
                                        </select>
                                    </div>

                                        <input type="submit" name="submit" value="Add Video"
                                            class="btn btn-block btn-primary w-100">
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main_content dashboard_part large_header_bg">
<!-- Content WrVideoer. Contains page content -->
<div class="content-wrapper form-center">

    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
<?php include 'inc/profile.php';?> <br>
            <div>
                <button type="button" data-toggle="modal" data-target="#addModal"
                    class="btn btn-block btn-success w-100">Add New Video</button>
                <br>
                <?php
                        for($i = 0;$i < $num;$i++) {
                    ?>
                <form action="update_video_settings.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Video Setting <?php $pos = $i; echo($pos += 1)?></h3>
                                </div>
                                <div class="card-body" style="padding:50px;">

                                    <div class="form-group">
                                        <label for="is_enable">Video Enabled</label><br>
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
                                        <label for="title">Video Name</label><br>
                                        <input class="form-control" type="text" id="title" name="title"
                                            value="<?php echo ($row[$i]['title']);?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="link">Video Link</label><br>
                                        <input class="form-control" type="text" id="link" name="link"
                                            value="<?php echo ($row[$i]['link']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="coin">Video Coins</label><br>
                                        <input class="form-control" type="text" id="coin" name="coin"
                                            value="<?php echo ($row[$i]['coin']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="timer">Video Timer (in minute)</label><br>
                                        <input class="form-control" type="hidden" id="id" name="id"
                                            value="<?php echo ($row[$i]['id']);?>">
                                        <input class="form-control" type="text" id="timer" name="timer"
                                            value="<?php echo ($row[$i]['timer']);?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="browser">Video Open
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

                                    <input type="submit" name="submit" value="Update"
                                        class="btn btn-block btn-primary w-100">
                                    <br>
                                     <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you Sure')" class="btn btn-danger btn-danger w-100">
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