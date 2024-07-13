<?php 
 require_once('include/header.php');

if(!isset($_SESSION['email'])){
    header('location: sign-in.php');
}
if(isset($_SESSION['email'])){
    $session_id = $_SESSION['id'];
    $session_email = $_SESSION['email'];
   
}
?>
<div class="container-fluid mt-2">
     <div class="row">
           <div class="col-md-3 col-lg-3">
            <?php require_once('include/sidebar.php'); ?>
            </div>
        
            <div class="col-md-9 col-lg-9">

               <div class="row">
                  <div class="col-md-1">
                    <i class="fad fa-user-cog fa-6x text-primary"></i>
                  </div>
                  <div class="col-md-11 text-left mt-4">
                  <h1 class="ml-5 display-4 font-weight-normal">Profile Setting:</h1>
                  </div>
                </div>
              <hr>

              <!-- Extended material form grid -->
             <form method="post" enctype="multipart/form-data">
                <?php
                 $query = "SELECT * FROM users WHERE email='$session_email'";
                 $run   = mysqli_query($con,$query);
                 $row   = mysqli_fetch_array($run);
                    
                    $db_name         = $row['name'];
                    $db_email        = $row['email'];
                    $db_password     = $row['password'];               
                    
                    
                 
                 
                 if(isset($_POST['submit']))
                 {  
                     $name         = $_POST['name'];
                     $password     = $_POST['password'];                   
                     
                     
                     
                     $u_query ="UPDATE admin SET name='$name', password='$password' WHERE id ='$session_id'";
                      if(mysqli_query($con,$u_query)){
                         $message = "Profile Has Been Updated";
                         
                          
                     }
                 }
                 ?>
                 <div class="row">
                  <?php if(isset($message)){
                        echo "<p style='color:green; font-weight:bold;'>$message</p>";
                    }?>
                   <div class="col-md-12 mt-4">
                      <label for="name" class="font-weight-bold">Email:</label> <?php echo $db_email;?>
                    </div>
                  </div>
                 
                  
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name" class="font-weight-bold">Name:</label>
                        <input type="text" name="name" value="<?php echo $db_name;?>" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="name" class="font-weight-bold">Password:</label>
                        <input type="password" name="password" value="<?php echo $db_password;?>" class="form-control" id="inputPassword4MD" placeholder="Password">
                      </div>

                    
                    
                  </div>
                  <div>
                  <input type="submit" name="submit" class="btn btn-primary btn-md" value="Submit">
              </div>
                </form>
            </div>
    </div>
                <!-- Extended material form grid -->
            </div>

     <?php 
 require_once('include/footer.php');
?>