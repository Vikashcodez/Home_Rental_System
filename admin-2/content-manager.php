<?php
// Include necessary files
require_once('include/header.php');
include 'gets.php';
$company = new company();
$det = $company->getCompanyDetails();
$abt = $company->getabt();
// Check if the user is not logged in, then redirect to sign-in page
if (!isset($_SESSION['email'])) {
    header('location: sign-in.php');
}

// Retrieve session data if the user is logged in
if (isset($_SESSION['email'])) {
    $session_id = $_SESSION['id'];
    $session_email = $_SESSION['email'];
    $session_name = $_SESSION['name'];
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
            <section id="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" id="myForm">
                            <!-- Edit About Section -->
                            <div class="col-md">
                                <h5>Edit About</h5>
                            </div>
                            <div class="col-md">
                                <textarea class="form-control rounded" id="about" name="about" rows="5"
                                    style="height: 100px;"><?php echo $abt['about']; ?></textarea>
                            </div>
                            <div class="col-12 text-center p-2">
                                <button type="button" class="btn btn-primary" id="updateBtn">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <form class="row g-3" id="contact">
                            <!-- Edit Company Details Section -->
                            <div class="col-md-12">
                                <h5>Edit Company Details</h5>
                            </div>
                            <div class="col-md-6">
                                <label for="tagLine" class="form-label">Tag Line</label>
                                <input type="text" class="form-control" id="tagLine" name="tagLine"
                                    value="<?php echo $det['tag_line']; ?>">

                            </div>

                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address"
                                    value="<?php echo $det['address']; ?>" name="address">
                            </div>
                            <div class="col-md-6">
                                <label for="contactNo" class="form-label">Contact No.</label>
                                <input type="number" class="form-control" id="contactNo" name="contactNo"
                                    value="<?php echo $det['contact_no']; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="emailId" class="form-label">Email Id</label>
                                <input type="email" class="form-control" id="emailId" name="emailId"
                                    value="<?php echo $det['email_id']; ?>">
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="agree">
                                    <label class="form-check-label" for="gridCheck">
                                        Agree
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" id="updateButton">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    <!-- Script for 'Edit About' Section -->
    <script>
        $(document).ready(function () {
            $('#updateBtn').click(function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formData = $('#myForm').serialize();

                        $.ajax({
                            type: 'POST',
                            url: 'process.php',
                            data: formData,
                            success: function (response) {
                                Swal.fire({
                                    title: 'Updated!',
                                    text: 'Your file has been updated.',
                                    icon: 'success'
                                });
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while updating the file.',
                                    icon: 'error'
                                });
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>

    <!-- Script for 'Edit Company Details' Section -->
    <script>
        $(document).ready(function () {
            $('#contact').submit(function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                // Create a FormData object to store the form data
                var formData = new FormData(this);

                // Display Swal confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform AJAX request
                        $.ajax({
                            type: 'POST',
                            url: 'insert.php', // Replace 'insert.php' with the actual URL of your insert script
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                console.log(response); // Output the response from the server

                                // Handle the response as needed

                                // Display success message with Swal
                                Swal.fire(
                                    'Updated!',
                                    'Your data has been updated.',
                                    'success'
                                );
                            },
                            error: function (xhr, status, error) {
                                console.log(xhr.responseText); // Output any error messages

                                // Handle the error as needed

                                // Display error message with Swal
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while updating the data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
