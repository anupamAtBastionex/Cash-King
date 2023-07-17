<?php
include 'session.php';
include 'db.php';

// Define the number of users to display per page
$usersPerPage = 20;

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $usersPerPage;

// Retrieve the users for the current page using LIMIT and OFFSET
$sql = "SELECT * FROM users LIMIT $usersPerPage OFFSET $offset";
$result = mysqli_query($link, $sql);

include 'inc/head.php';
?>

<body class="crm_body_bg">

    <?php include 'inc/nav.php';?>

    <section class="main_content dashboard_part large_header_bg">

        <?php include 'inc/profile.php';?>

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Users</h3>
                                    </div>
                                    <form style="display: flex;align-items: center;gap: 7px;" action="search_user.php">
                                        <input type="search" class="form-control" id="gsearch" name="search">
                                        <input class="btn_1" style="border:none;" type="submit">
                                    </form>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="QA_section">

                                    <div class="QA_table mb_30">

                                        <table class="table lms_table_activ ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Points</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Total Referrals</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- start here  -->

                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"> <a href="#" class="question_content"> <?php echo $row['username']; ?></a></th>
                                                        <td> <?php echo $row['points']; ?></td>
                                                        <td> <?php echo $row['email']; ?></td>
                                                        <td> <?php echo $row['total_ref']; ?></td>
                                                        <form action="admin_api.php" method="post" id="myform">
                                                            <input type='hidden' name='user_b' value='<?php echo $row['id']; ?>'>

                                                            <?php if ($row['status'] == "0") {
                                                                $id = $row['id'];
                                                                echo "
                                                            <input type='hidden' name='status' value='1'>
                                                            <td><Button type='submit' class='status_btn'>Active</Button></td>";
                                                            } else {
                                                                echo "
                                                            <input type='hidden' name='status' value='0'>
                                                            <td><Button type='submit' style='background: red;' class='status_btn'>Blocked</Button></td>";
                                                            } ?>

                                                        </form>

                                                        <th scope="col">
                                                            <div class="action_btns d-flex">
                                                                <a href="edit-user.php?i=<?php echo $row['username']; ?>" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                                                <a href="tracker.php?i=<?php echo $row['username']; ?>" class="action_btn mr_10"> <i class="fa-solid fa-database"></i> </a>
                                                                <!--<a href="#" class="action_btn mr_10"> <i class="fa-solid fa-ban"></i> </a>-->
                                                                <!-- <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>-->
                                                            </div>
                                                        </th>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                                <!-- end here  -->
                                            </tbody>
                                        </table>
                                        <div class="col-12">
                    <?php
                    // Get the total number of users
                    $totalUsersSql = "SELECT COUNT(*) AS total_users FROM users";
                    $totalUsersResult = mysqli_query($link, $totalUsersSql);
                    $totalUsersRow = mysqli_fetch_assoc($totalUsersResult);
                    $totalUsers = $totalUsersRow['total_users'];

                    // Calculate the total number of pages
                    $totalPages = ceil($totalUsers / $usersPerPage);

                    // Display the pagination links
                   echo "<ul class='pagination'>";

// Previous page link
if ($currentPage > 1) {
    echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>&laquo;</a></li>";
}

// Pagination links
$range = 3; // Number of links to show before and after the current page
$ellipsis = "<li class='page-item disabled'><span class='page-link'>...</span></li>";

for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) {
        echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
    } elseif ($i <= $range || $i > ($totalPages - $range) || ($i >= ($currentPage - $range) && $i <= ($currentPage + $range))) {
        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
    } elseif ($i == ($currentPage - $range - 1) || $i == ($currentPage + $range + 1)) {
        echo $ellipsis;
    }
}

// Next page link
if ($currentPage < $totalPages) {
    echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>&raquo;</a></li>";
}

echo "</ul>";

                    ?>
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

    <?php include 'inc/foot.php';?>