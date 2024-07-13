<?php  require_once('include/header.php');
if(!isset($_SESSION['email'])){
  header('location: signin.php');
}

?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="container-fluid mt-2 justify-content-center">
     <div class="row">
           

        <?php 
         if(!isset($_SESSION['email']))
         {
            header('location: signin.php');
          }
         ?>
        
              <div class="col-md col-lg">
                <div class="row justify-content-center">
                  <div class="col-md-1">
                    <i class="fad fa-users fa-6x text-primary"></i>
                  </div>
                  <div class="col-md-11 text-left mt-4">
                      <h3 class="ml-5 display-4 font-weight-normal">NEW INVOICE</h3>
                  </div>
                  <hr>
                  
                </div>

                 <div class="container text-center">
                  <form class="row" method="post"  enctype="multipart/form-data">
               <?php
if (isset($_POST['submit'])) {
    $image = $_FILES['pay']['name'];
    $tmp_image = $_FILES['pay']['tmp_name'];
    $date = $_POST['dates'];
    $description = $_POST['desc'];

    // Form validation
    if (!empty($image) && !empty($date) && !empty($description)) {

        // Assuming the database connection is established earlier
        // $con = mysqli_connect("hostname", "username", "password", "database_name");

        // Prepare the query with placeholders
        $query = "UPDATE invoice SET qr = ?, date = ?, description = ? WHERE id = '1'";

        // Using prepared statements to prevent SQL injection
        if ($stmt = mysqli_prepare($con, $query)) {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "sss", $image, $date, $description);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $path = "pay/" . $image;

                if (move_uploaded_file($tmp_image, $path)) {
                    copy($path, "" . $path);
                }
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>

  <div class="row">
    <div class="col">
      <label for="pay" class="form-label">GPAY QR</label>
                  <input type="file" name="pay" id="pay" class="form-control">
    </div>
    <div class="col">
      <label for="dates" class="form-label">FOR MONTH OF</label>
      <input type="date" name="dates" id="dates" class="form-control">
    </div>
    <div class="col">
      <label for="desc">Description</label>
      <input type="text" name="desc" id="desc" class="form-control">
    </div>
  </div>
  <div class="col-12 text-center mb-4">
        <button type="submit" name="submit" value="submit" class="btn btn-success">ADD</button>
    </div>
</form>
<div class="container-fluid  justify-content-center ">
  <div class="row text-center justify-content-center mt-3">
<table class="table table-responsive" >
           
                      <thead class="thead-light">
                              <th>#</th>
        <th>QR</th>
        <th>Date</th>
        <th>description</th>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM invoice WHERE id= '1'";
        $run = mysqli_query($con,$query);

         if(mysqli_num_rows($run)>0){
          while($row = mysqli_fetch_array($run)){
         $qr = $row['qr'];
         $date = $row['date'];
         $descrip = $row['description'];

         ?>
        <td>1</td>
        <td><img src="pay/<?php echo $qr; ?>" style="height: 150px; width: 100%;" ></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $descrip; ?></td>
        <?php 
      }
    }
      ?>
      </tbody>
    </table>
    
<table class="table table-responsive">
    <thead class="thead-light">
        <th>#</th>
        <th>QR</th>
        <th>Name</th>
        <th>Date</th>
        <th>Payment</th>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM payment";
        $run = mysqli_query($con, $query);

        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $id = $row['id'];
                $name = $row['user'];
                $payment = $row['pay'];
                $date = $row['date'];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td id="myImg><img src="pay/<?php echo $payment ; ?>" style="height: 50px; width: 100%" id="myImg"></td>
                    <?php
                    $query = "SELECT * FROM users WHERE id = '$name'";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        while ($userRow = mysqli_fetch_assoc($result)) {
                            $paymentStatus = $userRow['pay'];
                            $uname = $userRow['name'];

                        }
                    }
                    ?>
                    <td><?php echo $uname; ?></td>
                    <td><?php echo  $date; ?></td>
                    <td>
                        <?php
                        if ($paymentStatus == 'Paid') {
                            echo '<button type="button" class="btn btn-success btn-sm" onclick="pre(' . $name . ')">' . $paymentStatus . '</button>';
                        } else {
                            echo '<button type="button" class="btn btn-danger btn-sm" onclick="pre(' . $name . ')">' . $paymentStatus . '</button>';
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            // No payment records found
            ?>
            <tr>
                <td colspan="5">No payment records found.</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

        </div>
     </div>
     <div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
  </div>
      <?php 
 require_once('include/footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <script>
    function pre(val){
      console.log(val);
                $.ajax({

            url: 'pays.php',
            type: "POST",
            data: { id: val },
            success: function (response) {
               location.reload();
                
            }
        });
    }
  </script>
  <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>