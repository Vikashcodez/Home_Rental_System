<?php include("include/header.php");
  if(!isset($_SESSION['email'])){
    header('location: signin.php');
}                       

?>

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <?php include("include/sidebar.php");?>
        </div>
        
        <div class="col-md-9">
            <div class="row">
              <div class="col-md-1">
                <i class="fad fa-home fa-6x text-primary"></i>
              </div>
              <div class="col-md-11 text-left mt-4 ">
               <h1 class="ml-3 display-4 font-weight-normal"> ALL ROOMS</h1>
              </div>
            </div>
            <hr>
       
          <table id="row-select" class="display table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>Room Image</th>
                                                <th>Location</th>
                                                <th>Rent</th>
                                                <th>Uploaded By</th>
                                                <th>View</th>
                                                <th>Date</th>
                                                <?php
                                                $sql = "SELECT * FROM users WHERE name = '$name' AND role = 'admin'";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    echo '<th>Status</th>
                    <th>Action</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                             
                                            $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
                                            FROM rooms r
                                            LEFT JOIN district d ON d.id = r.district_id
                                            LEFT JOIN area a ON a.id = r.area_id
                                            LEFT JOIN users u ON u.id = r.user ORDER BY r.id ASC";
                                            $result = $con->query($query);

                                            if ($result->num_rows > 0) {
                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<tr>
                                                <td>' . $count . '</td>
                                                <td><img src="' . $row['image'] . '" alt="Room Image" width="50" height="50"></td>
                                                <td>' . $row['area'] . ', ' . $row['district'] . '</td>
                                                <td>' . $row['rent'] . ' ₹</td>
                                                <td>' . $row['uploaded_by'] . '</td>
                                                <td>
                                                <button type="button" class="btn btn-outline-success" value="' . $row['id'] . '" onclick="openRoomModal(' . $row['id'] . ')" data-toggle="modal" data-target="#room_modal">
                                                    <i class="fad fa-eye"></i>
                                                </button>
                                                </td>
                                                <td>' . $row['date'] . '</td>';

                                                    $sql = "SELECT * FROM users WHERE name = '$name' AND role = 'admin'";
                                                    $adminResult = mysqli_query($con, $sql);

                                                    if (mysqli_num_rows($adminResult) > 0) {
                                                        echo '<td>
                                                        <button type="button" class="btn btn-warning btn-sm" onclick="avl(' . $row['id'] . ')">' . $row['status'] . '</button>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="del(' . $row['id'] . ')">Delete</button>
                                                    </td>';
                                                    }

                                                    echo '</tr>';
                                                    $count++;
                                                }
                                            } else {
                                                echo '<tr><td colspan="8">No room data found.</td></tr>';
                                            }
                                            $result->free_result();
                                            ?>
                                        </tbody>
                                    </table>
                  <div class="text-right">
                    
                  </div>
          
        </div>

<div class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="room_modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="room_modalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="video-container col-md-12">
                                                <video id="room_video" controls autoplay>
                                                    <source src="img/<?php echo $vid; ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="rent_room">Rent</label>
                                            <input type="number" class="form-control" id="rent_room" placeholder="Price"
                                                disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="location_room">Location</label>
                                            <input type="text" class="form-control" id="location_room"
                                                placeholder="Live location" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="room_type">Type</label>
                                            <input type="text" class="form-control" id="room_type"
                                                placeholder="Room type" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="toilet_type">Toilet</label>
                                            <input type="text" class="form-control" id="toilet_type"
                                                placeholder="Toilet type" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="room_for">Bachelors Allowed</label>
                                            <input type="text" class="form-control" id="room_for" placeholder="Room for"
                                                disabled>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</div>
<?php include("include/footer.php"); ?>