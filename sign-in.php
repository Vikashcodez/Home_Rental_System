<?php include('include/header.php'); ?>

<div class="container sign-in-up">
    <div class="row mb-5">
        <div class="col-md-6">
            <!-- Content for the left side of the page (if any) goes here -->
        </div>

        <div class="col-md-6" style="height:66.5vh;">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mt-5">Sign in</h1>

                    <form method="post" class="mt-5 p-3">

                       <?php
if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND status='Active' AND pay = 'Paid' ";
    $run = mysqli_query($con, $query);

    if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);

        $db_cust_id = $row['id'];
                                $db_cust_name = $row['name'];
                                $db_cust_email = $row['email'];
                                $db_cust_pass = $row['password'];
                                $db_cust_role = $row['role'];

        if ($password === $db_cust_pass) {
            $_SESSION['id'] = $db_cust_id;
            $_SESSION['name'] = $db_cust_name;
            $_SESSION['email'] = $db_cust_email;
            $_SESSION['role'] = $db_cust_role;

            header('location:admin-2/index.php');
            exit;
        } else {
            $error = "Invalid Email or Password";
        }
    } else {
        $query = "SELECT * FROM users WHERE email = '$email' AND status='Active' AND pay = 'Pending' ";
        $run = mysqli_query($con, $query);

        if (mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_array($run);

             $db_cust_id = $row['id'];
                                $db_cust_name = $row['name'];
                                $db_cust_email = $row['email'];
                                $db_cust_pass = $row['password'];
                                $db_cust_role = $row['role'];


            if ($password === $db_cust_pass) {
                $_SESSION['id'] = $db_cust_id;
                $_SESSION['name'] = $db_cust_name;
                $_SESSION['email'] = $db_cust_email;
                $_SESSION['role'] = $db_cust_role;

                header('location:admin-2/invoice.php');
                exit;
            } else {
                $error = "Invalid Email or Password";
            }
        }
    }
}
?>

<?php
if (isset($error)) {
    echo "<div class='alert bg-danger' role='alert'>
            <span class='text-white text-center'>$error</span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>";
}
?>


                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>

                        <a href="forget_pass.php">Forgot Password?</a>

                        <div class="form-group text-center mt-4">
                            <input type="submit" name="signin" class="btn btn-primary" value="Sign in">
                        </div>

                        <div class="text-center mt-4">Not a Member Yet <a href="register.php">Register</a></div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
