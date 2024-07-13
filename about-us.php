<?php include('include/header.php');
  ?>
  
        <div class="container sign-in-up">
          <div class="row">
            <div class="col-md-5">
             <img src="img/about-us-actor.png" width="100%">
            </div>
            <div class="col-md-7" style="height:66.5vh;">
               <h1>Andaman Rental Service</h1>
               <hr>
              <p style="font-size:15px;">
                
            <?php
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
          </div>
        </div>
   
        <?php include('include/footer.php');?>