<?php
require 'include/dbcon.php';

if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    // Get the current status of the room
    $statusQuery = "SELECT status FROM users WHERE id = " . $userId;
    $statusResult = $con->query($statusQuery);

    if ($statusResult->num_rows > 0) {
        $row = $statusResult->fetch_assoc();
        $currentStatus = $row['status'];

        // Determine the new status based on the current status
        $newStatus = ($currentStatus == 'Active') ? 'Blocked' : 'Active';

        // Update the status of the room
        $updateQuery = "UPDATE users SET status = '$newStatus' WHERE id = " . $userId;

        if ($con->query($updateQuery)) {
            echo "user status updated successfully!";
        } else {
            echo "Failed to update user status: " . $con->error;
        }
    } else {
        echo "user not found!";
    }
} else {
    // If 'id' parameter is not provided
    echo "Invalid request!";
}
?>
