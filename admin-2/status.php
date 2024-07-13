<?php
require 'include/dbcon.php';

if (isset($_POST['id'])) {
    $roomId = $_POST['id'];

    // Get the current status of the room
    $statusQuery = "SELECT status FROM rooms WHERE id = " . $roomId;
    $statusResult = $con->query($statusQuery);

    if ($statusResult->num_rows > 0) {
        $row = $statusResult->fetch_assoc();
        $currentStatus = $row['status'];

        // Determine the new status based on the current status
        $newStatus = ($currentStatus == 'Available') ? 'not available' : 'Available';

        // Update the status of the room
        $updateQuery = "UPDATE rooms SET status = '$newStatus' WHERE id = " . $roomId;

        if ($con->query($updateQuery)) {
            echo "Room status updated successfully!";
        } else {
            echo "Failed to update room status: " . $con->error;
        }
    } else {
        echo "Room not found!";
    }
} else {
    // If 'id' parameter is not provided
    echo "Invalid request!";
}
?>
