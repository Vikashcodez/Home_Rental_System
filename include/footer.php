<?php
$query = "SELECT * FROM company_details WHERE id = '1'";
$run = mysqli_query($con, $query);

if ($run) {
    
    $det = mysqli_fetch_assoc($run);
}
?>

<div class="container-fluid mt-5 bg-info text-dark">
    <div class="row justify-content-center">
        <h3 class="text-center mt-5"><img src="include/logo.png" style="height:5pc;"></h3>
    </div>
    <div class="row text-center mt-3 justify-content-center">
        <div class="col-8">
            <p>"Unlock Your Rental Potential: Find Your Perfect Room Today!"
            </p>
        </div>
    </div>
    <div class="container p-3">
        <div class="row justify-content-center">
            <img src="img/star.png" style="width: 15%">
        </div>
        <div class="row text-center">
            <div class="col-md-4">Address
                <p><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> <?php echo $det['address']; ?></p>
            </div>
            <div class="col-md-4">Contact No
                <p><i class="fa-solid fa-phone" style="color: #ffffff;"></i> <?php echo $det['contact_no']; ?></p>
            </div>
            <div class="col-md-4">Email Id
                <p><i class="fa-solid fa-envelope" style="color: #ffffff;"></i> <?php echo $det['email_id']; ?></p>
            </div>
        </div>
    </div>
</div>



  <div class="row bg-secondary .bg-opacity-10 justify-content-center text-center ">
    <p>@copyright reserved by<b> ARS</b></p>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<style>
  p{
    font-family:  'Arima', cursive;
  }
  </style>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>