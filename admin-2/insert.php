<?php
include 'include/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tagLine = $_POST["tagLine"];
    $address = $_POST["address"];
    $contactNo = $_POST["contactNo"];
    $emailId = $_POST["emailId"];

    $tagLine = mysqli_real_escape_string($con, $tagLine);
    $address = mysqli_real_escape_string($con, $address);
    $contactNo = mysqli_real_escape_string($con, $contactNo);
    $emailId = mysqli_real_escape_string($con, $emailId);

    $query = "UPDATE company_details SET tag_line=?, address=?, contact_no=?, email_id=? WHERE id=1";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $tagLine, $address, $contactNo, $emailId);
        if (mysqli_stmt_execute($stmt)) {
            echo "Company details updated successfully";
        } else {
            echo "Error updating company details: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
