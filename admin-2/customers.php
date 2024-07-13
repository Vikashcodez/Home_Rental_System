<?php  require_once('include/header.php');
if(!isset($_SESSION['email'])){
  header('location: signin.php');
}
?>
<div class="container-fluid mt-2">
     <div class="row justify-content-center">
           

        <?php 
         if(!isset($_SESSION['email']))
         {
            header('location: signin.php');
          }
         ?>
        
              <div class="col-md-9 col-lg-9">
                <div class="row">
                  <div class="col-md-1">
                    <i class="fad fa-users fa-6x text-primary"></i>
                  </div>
                  <div class="col-md-11 text-left mt-4">
                      <h1 class="ml-5 display-4 font-weight-normal">View All Customers:</h1>
                  </div>
                </div>
                 <hr>
                 <table class="table table-responsive table-hover text-center">
                      <thead class="thead-light">
                          <tr>
                              <th>#Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>district</th>
                              <th>nearby</th>
                              <th>joined</th>
                              <th>Contact Number</th>
                              <th>Status</th>
                              <th>payment</th>
                          </tr>
                      </thead>
                        <tbody>
                          <?php     
                            $query = "SELECT * FROM users where role='user' ";
                            $run   = mysqli_query($con,$query);
                                        
                            if(mysqli_num_rows($run) > 0){
                              while($row = mysqli_fetch_array($run)){
                                $cust_id         = $row['id'];
                                $cust_name       = $row['name'];
                                $cust_email      = $row['email'];
                                $cust_pass       = $row['password'];
                                $cust_add        = $row['district'];    
                                $cust_city       = $row['nearby'];
                                $cust_postalcode = $row['joined'];
                                $cust_number     = $row['contact'];
                                $cust_status     = $row['status'];
                                $cust_pay        = $row['pay'];
                  
                            ?> 
                             <tr>
                                 <td >
                                     <?php echo $cust_id;?>
                                 </td>

                                 <td width="150px">
                                    <?php echo $cust_name;?>
                                 </td>

                                 <td>
                                    <?php echo $cust_email;?>
                                 </td>

                                 <td><input type="password" value="<?php echo $cust_pass;?>" disabled ></td>

                                 <td><?php echo $cust_add;?> </td>
                                 <td> 
                                 <?php echo $cust_city ?>  
                                 </td>
                                 <td><?php echo $cust_postalcode;?></td>
                                
                                 <td> <?php echo $cust_number;?></td>

                                 <td>
                                  <?php
                                   if($cust_status == "Active"){
                                  echo '<button type="button" class="btn btn-warning btn-sm" onclick="status(' . $cust_id . ')">' . $cust_status . '</button>';
 } 
 else {
  echo '<button type="button" class="btn btn-danger btn-sm" onclick="status(' . $cust_id . ')">' . $cust_status . '</button>';
 }
                                ?> </td>

                                 <td>
                                  <?php
                                  if($cust_pay == "Paid"){
                                  echo'<button type="button" class="btn btn-success btn-sm" onclick="pre(' . $cust_id . ')">' .$cust_pay .'</button>'; }
                                  else {
                                    echo'<button type="button" class="btn btn-danger btn-sm" onclick="pre(' . $cust_id . ')">' .$cust_pay .'</button>';
                                  }
                                ?></td>
                             </tr>   
                           <?php 
                               }

                            }else {
                                echo "<h2 class='text-center text-secondary'>Not Any Customer Registered Yet</h2>";
                                }
                    ?>
      
                      </tbody> 
                  </table>   
             </div>
     </div>
  </div>
      <?php 
 require_once('include/footer.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


  <script>
    function status(val) {
               $.ajax({
            url: 'stats.php',
            type: "POST",
            data: { id: val },
            success: function (response) {
              
                location.reload();
            }
        });
    }
  </script>
  <script>
    function pre(val){
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