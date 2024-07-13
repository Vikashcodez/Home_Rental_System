<?php
// Include the database connection file
include 'include/dbcon.php';

if (isset($_POST["id"])) {
    $districtId = $_POST["id"];
    
    // Assuming that you have a table named "area" with columns "id", "area_name", and "district_id"
    $query = "SELECT * FROM `area` WHERE district_id = '$districtId';";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '" class="col-sm-6"">' . $row['area'] . '</option>';
        }
    } else {
        echo '<option value="">No areas found</option>';
    }
}

?>







