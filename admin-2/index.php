<?php
include('include/header.php');

if (!isset($_SESSION['email'])) {
    header('location:signin.php');
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id']; // Corrected variable assignment
}
?>

<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <!---sidenavbar Column-->
               <!---Main Column -->
        <div class="col-md-9 col-lg-9 justify-content-center">
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fad fa-home fa-2x"></i>
                            </div>
                            <?php
                            if ($role == "admin") {
                                $query = "SELECT COUNT(*) AS num_available FROM rooms WHERE status='Available'";
                            } else {
                                $query = "SELECT COUNT(*) AS num_available FROM rooms WHERE status='Available' AND user = ?";
                            }

                            // Using prepared statements to prevent SQL injection
                            if ($stmt = mysqli_prepare($con, $query)) {
                                if ($role != "admin") {
                                    // If not an admin, bind the user ID parameter to the prepared statement
                                    mysqli_stmt_bind_param($stmt, "s", $id);
                                }

                                // Execute the prepared statement
                                mysqli_stmt_execute($stmt);

                                // Bind the result to variables
                                mysqli_stmt_bind_result($stmt, $num_new_orders);

                                // Fetch the result
                                mysqli_stmt_fetch($stmt);

                                // Close the prepared statement
                                mysqli_stmt_close($stmt);
                            }

                            // Display the result
                            echo '<div class="mr-5"> <span style="font-size: 24px;">' . $num_new_orders . '</span> Available</div>';
                            ?>

                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="available.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fad fa-home fa-2x"></i>
                            </div>
                            <?php
                            if ($role == "admin") {
                                $query = "SELECT * FROM rooms  WHERE status='not available'";
                                $run = mysqli_query($con, $query);
                                $num_new_orders = mysqli_num_rows($run);
                            } else {
                                $query = "SELECT * FROM rooms  WHERE status='not available' AND user = '$id'";
                                $run = mysqli_query($con, $query);
                                $num_new_orders = mysqli_num_rows($run);
                            }
                            ?>
                            <div class="mr-5"> <span style="font-size:24px;"><?php echo $num_new_orders; ?></span> Not Available</div>

                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="not_available.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fad fa-home fa-2x"></i>
                            </div>
                            <?php
                            if ($role == "admin") {
                                $query = "SELECT * FROM rooms ";
                                $run = mysqli_query($con, $query);
                                $num_new_orders1 = mysqli_num_rows($run);
                            } else {
                                $query = "SELECT * FROM rooms  WHERE user = '$id'";
                                $run = mysqli_query($con, $query);
                                $num_new_orders1 = mysqli_num_rows($run);
                          }
                            ?>
                            <div class="mr-5"> <span style="font-size:24px;"><?php echo $num_new_orders1; ?></span> Total Rooms</div>

                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="pending_pro.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <?php
                if ($role == "admin") {
                    echo '<div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-info o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fad fa-user fa-2x"></i>
                                </div>';

                    $query = "SELECT * FROM users WHERE role='user'";
                    $run = mysqli_query($con, $query);
                    $num_new_users = mysqli_num_rows($run);

                    echo '<div class="mr-5"><span style="font-size:24px;">' . $num_new_users . '</span> Users</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="customers.php">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>';
                }
                ?>

            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include('include/footer.php'); ?>
