<?php
require 'include/dbcon.php';

if (isset($_POST['id'])) {
    $roomID = $_POST['id'];

    // Perform any validation or security checks here if needed

    $query = "DELETE FROM rooms WHERE id = " . $roomID;

    if ($con->query($query)) {
        echo "Room deleted successfully!";
    } else {
        echo "Failed to delete room: " . $con->error;
    }
} else {
    // If 'id' parameter is not provided
    echo "Invalid request!";
}
?>
