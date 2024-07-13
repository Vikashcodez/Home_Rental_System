<?php
include 'include/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $about = $_POST["about"];
    $date = date('Y-m-d H:i:s'); 

    $query = "UPDATE about SET about = ?, created_at = ? WHERE id = 1";
    
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $about, $date);
    
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('About Updated Successfully.');window.location='index.php?page';</script>";
    } else {
        echo "Error updating about: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
