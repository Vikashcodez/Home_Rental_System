<?php include('include/header.php'); ?>

       <div class="jumbotron">
           <h1 class="text-center mt-5">Contact us</h1>
       </div>
       
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-6">
              <h3>DEVELOPERS</h3>
              <hr>
              <p>Andaman Rental Services</p>
            </div>
            <div class="col-md-6">
                 <?php




if (isset($_POST['submit'])) {
    // Step 3: Validate the data (You can add your validation logic here)

    // Retrieve form data
    $fullname = $_POST['Fullname'];
    $email = $_POST['email'];
    $message = $_POST['Message'];

    // Step 4: Insert the data into the database
    $sql = "INSERT INTO query (name, email, query) VALUES ('$fullname', '$email', '$message')";

    if ($con->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


?>

<!-- Step 5: Create the HTML form -->
<form action="" method="post" class="p-3">
    <h3>Query</h3>
    <div class="form-group">
        <input type="text" name="Fullname" placeholder="Full Name" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" name="email" placeholder="Email" class="form-control">
    </div>

    <div class="form-group">
        <textarea class="form-control" rows="5" cols="20" name="Message" placeholder="Message"></textarea>
    </div>

    <div class="form-group text-center mt-4">
        <input type="submit" name="submit" class="btn btn-primary" value="Send">
    </div>
</form>

                </div>
         </div>
          
         
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4003334.183071444!2d91.52193666288647!3d11.515512236712386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3064a00f2b650ff3%3A0xce80055648fccb2c!2sAndaman%20and%20Nicobar%20Islands!5e0!3m2!1sen!2sin!4v1690906138760!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         
       </div>
         
       <?php include('include/footer.php');?>