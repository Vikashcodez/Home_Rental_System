<?php
require 'include/dbcon.php';

$id = $_GET['id'];



$query = "SELECT * FROM rooms  WHERE id = $id";


$result = $con->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

  
    $response = array(
        'rent' => $row['rent'],
        'location' => $row['location'],
        'type' => $row['type'],
        'toilet' => $row['toilet'],
        'for' => $row['room_for'],
        'videoUrl' => $row['video']
    );

    
    echo json_encode($response);
} else {
    
    $response = array('error' => 'No data found');
    echo json_encode($response);
}
