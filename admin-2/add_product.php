<?php 
 require_once('include/header.php');
 if(!isset($_SESSION['email'])){
  header('location: signin.php');
}
if(isset($_SESSION['email'])){
    $session_id = $_SESSION['id'];
    $session_email = $_SESSION['email'];
    $session_name = $_SESSION['name'];
}
?>



<div class="container-fluid mt-2">
    <script src="ckeditor/ckeditor.js"></script>
      <div class="row">
        <div class="col-md-3 col-lg-3">
            <?php require_once('include/sidebar.php'); ?>
        </div>
        
        <div class="col-md-9 col-lg-9">
          
           <form class="row" method="post"  enctype="multipart/form-data">
           <?php
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $type = $_POST['room_type'];
    $room_for = $_POST['room_for'];
    $toilet = $_POST['toilet_type'];
    $district = $_POST['district'];
    $area = $_POST['area'];
    $terms = $_POST['agree'];
    $description = $_POST['description'];
    $rent = $_POST['rent'];
    $contact = $_POST['contact'];
    $image = $_FILES['room_img']['name'];
    $tmp_image = $_FILES['room_img']['tmp_name'];
    $interior = $_FILES['interior']['name'];
    $tmp_image1 = $_FILES['interior']['tmp_name'];
    $kitchen = $_FILES['kitchen']['name'];
    $tmp_image2 = $_FILES['kitchen']['tmp_name'];
    $tour = $_FILES['tour']['name'];
    $tmp_vid = $_FILES['tour']['tmp_name'];

    // File size limit in KB (50KB)
    $fileSizeLimitKB = 50;

    // Check if the uploaded files are within the size limit
    if ($_FILES['room_img']['size'] <= $fileSizeLimitKB * 1024 &&
        $_FILES['interior']['size'] <= $fileSizeLimitKB * 1024 &&
        $_FILES['kitchen']['size'] <= $fileSizeLimitKB * 1024 &&
        $_FILES['tour']['size'] <= $fileSizeLimitKB * 1024) {

        if (!empty($user) or !empty($type)) {
            $query = "INSERT INTO rooms (user, type, room_for, toilet, district_id, area_id, terms, description, rent,contact, image, interior,kitchen,video) VALUES ('$user', '$type', '$room_for', '$toilet', '$district', '$area', '$terms', '$description', '$rent','$contact', '$image', '$interior','$kitchen','$tour')";

            if (mysqli_query($con, $query)) {
                $path = "img/" . $image;
                $path1 = "img/" . $interior;
                $path2 = "img/" . $kitchen;
                $path3 = "img/" . $tour;

                if (move_uploaded_file($tmp_image, $path) && move_uploaded_file($tmp_image1, $path1) && move_uploaded_file($tmp_image2, $path2) && move_uploaded_file($tmp_vid, $path3)) {
                    copy($path, "../" . $path);
                    copy($path1, "../" . $path1);
                    copy($path3, "../" . $path3);

                    $msg = "House has been published.";
                } else {
                    $msg = "Failed to move uploaded files.";
                }
            } else {
                $msg = "Error executing query: " . mysqli_error($con);
            }
        }
    } else {
        $msg = "File size should be up to 50KB.";
    }
}
?>

                <input type="hidden" name="user" id="user" value="<?php echo $id; ?>" required> 
              <div class="col-md-4">
                <label for="room_type" class="form-label">Room Type</label>
               <select class="form-select" aria-label="Default select example" name="room_type" id="room_type" required>
                  <option selected disabled>Open this select menu</option>
                  <option value="2BHK">2BHK</option>
                  <option value="3BHK">3BHK</option>
                  <option value="FLAT">FLAT</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="room_for" class="form-label">Room For</label>
                 <select class="form-select" aria-label="Default select example" name="room_for" id="room_for" required>
                  <option selected disabled>Open this select menu</option>
                  <option value="NO BACHELORS">NO BACHELORS</option>
                  <option value="FAMILY">FAMILY</option>
                  <option value="ALL">ALL</option>
                </select>
            </div>
            <div class="col-4">
                <label for="rent" class="form-label">Rent</label>
                <input type="number" class="form-control" id="rent" name="rent" placeholder="in INR" required>
            </div>
            <div class="col-md-6">
                <label for="toilet_type" class="form-label">Toilet</label>
               <select class="form-select" aria-label="Default select example" name="toilet_type" id="toilet_type" required>
                  <option selected disabled>Open this select menu</option>
                  <option value="WESTERN">WESTERN</option>
                  <option value="INDIAN">INDIAN</option>
                  <option value="I & W">BOTH</option>
                  <option value="NON ATTACHE">NON ATTACHE</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="water" class="form-label">Water Availability</label>
                 <select class="form-select" aria-label="Default select example" name="water" id="water" required>
                  <option selected disabled>Open this select menu</option>
                  <option value="24X7">24X7</option>
                  <option value="WEEKLY">WEEKLY</option>
                  <option value="ALTERNATE">ALTERNATE</option>
                  <option value="OTHERS">OTHERS</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">District</label>
               <select class="form-control" id="district" name="district" required>
            <option selected disabled value="">Choose District</option>
            <?php
            $sql = "SELECT * FROM district";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['district'] . '</option>';
              }
            } else {
              echo '<option value="">No districts found</option>';
            }
            ?>
          </select>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Area</label>
                 <select class="form-control" id="area" name="area" >
                    <option selected value="">Choose Area</option>
                  </select>
            </div>
            <div class="col-6">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="col-6">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="google map location" required>
            </div>
            <div class="col-3">
                <label for="room_img" class="form-label">Image</label>
              <input type="file" name="room_img" id="room_img" class="form-control-file border"required >
            </div>
             <div class="col-3">
                <label for="interior" class="form-label">Interior Image</label>
                <input type="file" class="form-control" id="interior" name="interior"required >
            </div>
             <div class="col-3">
                <label for="kitchen" class="form-label">Kitchen Image</label>
                <input type="file" class="form-control" id="kitchen" name="kitchen" required>
            </div>
            <div class="col-3">
                <label for="tour" class="form-label">Tour Video</label>
                <input type="file" class="form-control" id="tour" name="tour">
            </div>
            <div class="col-md-12 mt-1">
               <div class="form-floating">
                  <textarea class="form-control" placeholder="write Description" id="description" name="description" required></textarea>
                  <label for="description" required>Description</label>
                </div>
            </div>
         
        <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="agree" name="agree" value="agree" required>
              <label class="form-check-label" for="gridCheck">
               all information are correct
            </label>
        </div>
    </div>
    <div class="col-12 text-center mb-4">
        <button type="submit" name="submit" value="submit" class="btn btn-success">ADD</button>
    </div>
</form>

        </div>
        
     </div>
        
<script>
 CKEDITOR.replace('detail', {
    filebrowserBrowseUrl: '/brows.php',
    filebrowserUploadUrl: '/upload.php'
});
</script>
      </div>
      <?php 
 require_once('include/footer.php');
?>
<script>
        $(document).ready(function () {
            $('#district').change(function () {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: '../getarea.php',
                    cache: false,
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $("#area").html(data);
                    }
                });
            });
        });
    </script>