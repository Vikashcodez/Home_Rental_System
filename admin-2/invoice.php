<?php 
require_once('include/header.php');

if(!isset($_SESSION['email'])){
    header('location: sign-in.php');
}
if(isset($_SESSION['email'])){
    $session_id = $_SESSION['id'];
    $session_email = $_SESSION['email'];
    $session_name   = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Rental Invoice</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS (optional) -->
    <!-- Add your custom styles here -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 ">
                <div class="text-center mb-4">
                    <h2>ARS Rental Invoice</h2>
                </div>
                <div class="card" id="card">
                    <div class="card-body">
                        <!-- Invoice details and table -->
                        <div class="table-responsive">
                            <?php 
                            $query = "SELECT * FROM rooms WHERE user = '$id' ";
                            $run = mysqli_query($con,$query);
                            $nums = mysqli_num_rows($run);

                            $total = $nums * 100 ;
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Month</th>
                                        <th>No. of House</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $query = "SELECT * FROM invoice WHERE id = '1'";
                                 $run = mysqli_query($con, $query);
                                 if ($run) {
                                    $row = mysqli_fetch_assoc($run);
                                    if ($row) {
                                        $date = $row['date']; 
                                        $qr = $row['qr'];
                                        ?>
                                        <tr>
                                            <td>1</td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $nums; ?>/-</td>
                                            <td>100/-</td>
                                            <td><?php echo $total; ?>/-</td>
                                        </tr>
                                        

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right">Total:</td>
                                    <td><?php echo $total; ?>/-</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Billing Information:</h5>
                            <p><?php echo $name; ?></p>
                            <p><?php

                            $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
                            FROM rooms r
                            LEFT JOIN district d ON d.id = r.district_id
                            LEFT JOIN area a ON a.id = r.area_id
                            LEFT JOIN users u ON u.id = r.user  ";

                            $result = mysqli_query($con,$query);
                            if($result){
                                $row = mysqli_fetch_assoc($result);

                                echo $row['district'] . ',' . $row['area'];
                            }
                            ?>
                        </p>
                        <p>IFSC CODE: CNRB0019904</p>
                        <p>ACCOUNT No: 99042200046459</p>
                        <p>UPI ID: mlamlamlaakhil@okaxis</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Payment Details:</h5>
                        <p>Payment Method: Google Pay</p>
                        <button class="btn btn-primary p-2" onclick="printDiv('card')" > PRINT </button>
                    </div>
                </div>
                

            </div>

        </div>

    </div>
    <div class="col-md-6 mt-2 justify-content-center text-center"> 
               <img src="pay/<?php echo $qr; ?>" style="height: 55%;
    width: 80%;">
               <div class="row">
                <form method="post" enctype="multipart/form-data" class="form mt-2">
                    <?php
if (isset($_POST['submit'])) {
    $user = $_POST['id'];
    $image = $_FILES['pay']['name'];
    $tmp_image = $_FILES['pay']['tmp_name'];
    $date = date('Y-m-d');

    // Assuming you have a database connection established earlier and stored in $con
    // Replace "your_table_name" with the actual table name in your database

    // Check if the user already exists in the table
    $query = "SELECT * FROM payment WHERE user = '$user'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // User already exists, update the details
        $query = "UPDATE payment SET pay = '$image', date = '$date' WHERE user = '$user'";
    } else {
        // User doesn't exist, insert the user
        $query = "INSERT INTO payment (user, pay, date) VALUES ('$user', '$image', '$date')";
    }

    if (mysqli_query($con, $query)) {
        $path = "pay/" . $image;

        if (move_uploaded_file($tmp_image, $path)) {
            copy($path, "" . $path);
            header("Location: index.php");
            exit(); // Add exit() to stop further execution after redirection
        } else {
            echo "Failed to upload the file.";
        }
    } else {
        echo "Error executing the query: " . mysqli_error($con);
    }
}
?>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="pay" class="form-label ">For confirmaion upload your payment screenshot here .. !</label>
                    <input type="file" name="pay" id="pay" class="form-control ">
                    <button type="submit" name="submit" value="submit" class="btn btn-success">ADD</button>
                </form>
               </div>
            </div>
            <?php
                                    }
                                }
                                ?>
</div>
</div>

<!-- Bootstrap JS and jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JS (optional) -->
<!-- Add your custom scripts here -->
</body>

</html>
<script>
    function printDiv(card) {
     var printContents = document.getElementById(card).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
