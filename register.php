<?php include('include/header.php'); ?>

        <div class="container sign-in-up">
          <div class="row">
            <div class="col-md-6">
               <h3>ANDAMAN RENTAL SERVICE</h3>
               <hr>
              <p class="fs-1"><?php
$query = "SELECT * FROM about WHERE id = 1";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $abt = mysqli_fetch_array($result);
    echo $abt['about'];
} else {
    echo 'No about information found.';
}
?>
               </p>
            </div>
            
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="text-center mt-5">Register Account</h1>
                  
                  
                  <form method="post" class="mt-5 p-3">
                    
                    <?php 
                      if(isset($_POST['register'])){
                          
                          $fullname = $_POST['fullname'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $conf_pass = $_POST['confirm-password'];
                          $address = $_POST['address'];                         
                          $number = $_POST['phone_number'];
                          $gender = $_POST['gender'];
                          $district = $_POST['district'];
                          $area = $_POST['area'];
                          $date = date("Y-m-d");

                          
                           if(!empty($fullname) or !empty($email) or !empty($password) or !empty($conf_pass) or !empty($address) or !empty($district) or !empty($area) or !empty($number) or !empty($gender)){

                    // Check if user already exists
                    $check_query = "SELECT * FROM users WHERE email='$email' AND contact = '$number' ";
                    $check_result = mysqli_query($con, $check_query);

                    if(mysqli_num_rows($check_result) == 0) {

                      if($password === $conf_pass){

                        $cust_query="INSERT INTO users(`name`,`email`,`password`,`nearby`,`district`,`area`,`contact`,`gender`,`joined`) VALUES('$fullname','$email','$password','$address','$district','$area','$number','$gender','$date')";

                        if(mysqli_query($con,$cust_query)){
                            $message="You Are Registered Successfully!";
                        }

                      } 
                      else{
                          $error="Passwords do not Match";
                      }
                    } else {
                      $error="User already exists";
                    }
                  }
                  else{
                    $error="All (*) Fields Required";
                  }
              }
            ?>
                      <?php
                      if(isset($error)){
                      
                        echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
                    
                        }
                      else if(isset($message)){
                      
                        echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
                    
                        }
                      
                      ?>
                    <div class="form-group">
                    
                      <input type="text" name="fullname" placeholder="Full Name" class="form-control" >
                     </div>

                    <div class="form-group">
                      <input type="text" name="email" placeholder="Email" class="form-control" >
                     </div>

                     
                      <select name="gender" id="gender" class="form-control mb-2">
                        <option disabled selected> Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>

                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                            <input type="password" name="password" placeholder="password" class="form-control" >
                          </div>
                        </div>
                        <div class="col-sm-6 col-12 col-md-6 ">
                          <div class="form-group">
                            <input type="password" name="confirm-password" placeholder="Confirm password" class="form-control" >
                          </div>
                        </div>
                      </div>
                  

                      <div class="form-group">
                        <input type="text" name="address" placeholder="Address" class="form-control" >
                    </div>
                     
                    <div class="row">
                      <div class="col-md-6 col-6">
                        <div class="form-group">
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
                      </div>
                      
                      <div class="col-md-6 col-6">
                        <div class="form-group">
                           <select class="form-control" id="area" name="area" >
                    <option selected value="">Choose Area</option>
                  </select>
                       </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <input type="number" name="phone_number" placeholder="Phone Number" class="form-control" >
                   </div>

                      <div class="form-group text-center mt-4">
                        <input type="submit" name="register" class="btn btn-primary" value="Register">
                      </div>

                      <div class="text-center mt-4"> Already a Member? <a href="sign-in.php"> Sign in </a></div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
   
        <?php include('include/footer.php');?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        <script>
        $(document).ready(function () {
            $('#district').change(function () {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: 'getarea.php',
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