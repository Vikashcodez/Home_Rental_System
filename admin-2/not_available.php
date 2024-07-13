<?php include("include/header.php");
  if(!isset($_SESSION['email'])){
    header('location: signin.php');
}                       
if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
}

?>

<div class="container-fluid mt-2">
    <div class="row justify-content-center">
       
       
        <div class="col-md-9">
            <div class="row">
              <div class="col-md-1">
                <i class="fad fa-home-alt fa-6x text-danger"></i>
              </div>
              <div class="col-md-11 text-left mt-4 ">
               <h1 class="ml-3 display-4 font-weight-normal"> OCCUPIED ROOMS</h1>
              </div>
            </div>
            <hr>
        <form method="post">
        
                       <table id="row-select" class="thead-light display table table-bordered table-hover text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Sl. No.</th>
                                                <th>Room Image</th>
                                                <th>Location</th>
                                                <th>Rent</th>
                                                <th>Uploaded By</th>
                                                <th>View</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <?php
                                                $sql = "SELECT * FROM users WHERE name = '$name' AND role = 'admin'";
                                                $result = mysqli_query($con, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    echo '
                                                <th>Action</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            if($role == "admin"){                                           
                                             
                                            $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
                                            FROM rooms r
                                            LEFT JOIN district d ON d.id = r.district_id
                                            LEFT JOIN area a ON a.id = r.area_id
                                            LEFT JOIN users u ON u.id = r.user WHERE r.status = 'not available' ";
                                            $result = $con->query($query);

                                            if ($result->num_rows > 0) {
                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                    <td>' . $count .'</td>
                                                    <td><img src="' . $row['image'] . '" alt="Room Image" width="50" height="50"></td>
                                                    <td>' . $row['area'] . ', ' . $row['district'] . '</td>
                                                    <td>' . $row['rent'] . ' ₹</td>
                                                    <td>' . $row['uploaded_by'] . '</td>
                                                    <td>
                                                       <button type="button" class="btn btn-outline-success" value="' . $row['id'] . '" onclick="openRoomModal(' . $row['id'] . ')" data-toggle="modal"                                                 data-target="#room_modal"><i class="fad fa-eye fa-sm"></i></button>
                                                    </td>
                                                    <td>'. $row['date'] .'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm" onclick="avl(' . $row['id'] . ')">' . $row['status'] . '</button>
                                                    </td>
                                                ';
                                                

                                                    $sql = "SELECT * FROM users WHERE name = '$name' AND role = 'admin'";
                                                    $adminResult = mysqli_query($con, $sql);

                                                    if (mysqli_num_rows($adminResult) > 0) {
                                                        echo '
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
                                        }
                                        else {
                                             $query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by
                                            FROM rooms r
                                            LEFT JOIN district d ON d.id = r.district_id
                                            LEFT JOIN area a ON a.id = r.area_id
                                            LEFT JOIN users u ON u.id = r.user WHERE user = '$id' AND r.status = 'not available' ";
                                            $result = $con->query($query);

                                            if ($result->num_rows > 0) {
                                                $count = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                    <td>' . $count .'</td>
                                                    <td><img src="' . $row['image'] . '" alt="Room Image" width="50" height="50"></td>
                                                    <td>' . $row['area'] . ', ' . $row['district'] . '</td>
                                                    <td>' . $row['rent'] . ' ₹</td>
                                                    <td>' . $row['uploaded_by'] . '</td>
                                                    <td>
                                                       <button type="button" class="btn btn-outline-success" value="' . $row['id'] . '" onclick="openRoomModal(' . $row['id'] . ')" data-toggle="modal"                                                 data-target="#room_modal"><i class="fad fa-eye fa-sm"></i></button>
                                                    </td>
                                                    <td>'. $row['date'] .'</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm" onclick="avl(' . $row['id'] . ')">' . $row['status'] . '</button>
                                                    </td>
                                                ';
                                                

                                                    $sql = "SELECT * FROM users WHERE name = '$name' AND role = 'admin'";
                                                    $adminResult = mysqli_query($con, $sql);

                                                    if (mysqli_num_rows($adminResult) > 0) {
                                                        echo '
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
                                        }
                                            $result->free_result();
                                            ?>
                                        </tbody>
                                    </table>

                  <div class="text-right">
                    
                  </div>
                  
            </form>
        </div>

 <div class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="room_modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="room_modalLabel">Room Detail</h5>
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
                                                    <source src="" type="video/mp4">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
function del(dels) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'delete_room.php',
                type: 'POST',
                data: { 'id': dels },
                success: function (response)
                 {
                    Swal.fire(
                        'Deleted!',
                        'Your room has been deleted.',
                        'success'
                    );
                    location.reload();
                }
            });
        }
    });
}
</script>

<script>
    function avl(val) {
       
        $.ajax({
            url: 'status.php',
            type: "POST",
            data: { id: val },
            success: function (response) {
                console.log('success');
                location.reload();
            }
        });
    }

    

    function openRoomModal(id, videoUrl) {
        $.ajax({
            url: 'get_data.php',
            type: 'GET',
            dataType: 'json',
            data: { id: id },
            success: function (response) {
                $('#rent_room').val(response.rent);
                $('#location_room').val(response.location);
                $('#room_type').val(response.type);
                $('#toilet_type').val(response.toilet);
                $('#room_for').val(response.for);

                $('#room_video source').attr('src', response.videoUrl);
                $('#room_video').get(0).load();

                console.log('Data loaded successfully!');
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }

    $('#room_modal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var id = button.val();
        var videoUrl = button.data('video-url');
        openRoomModal(id, videoUrl);
    });
</script>

<style>
    .video-container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .video-container video {
        width: 100%;
        height: auto;
    }
</style>