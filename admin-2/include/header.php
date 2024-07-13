<?php 
ob_start();
session_start();

// Check if session variables exist
if (!isset($_SESSION['id']) || !isset($_SESSION['email']) || !isset($_SESSION['name'])) {
    header("Location: sign-in.php");
    exit();
}

// Access session variables
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];
require_once('include/dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ARS.in</title>

  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand p-2 fs-4" href="index.php">ARS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Dashboard</a>
      </li>
<?php 
if($role == "user"){
      echo' <li class="nav-item">
        <a class="nav-link" href="add_product.php"><i class="fas fa-plus"></i> Add New Room</a>
      </li>';
    }
    ?>
     <?php 
     if($role == "admin"){
     echo ' <li class="nav-item">
        <a class="nav-link" href="customers.php"><i class="fas fa-user"></i> View customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="invoice-manager.php"><i class="fas fa-user"></i> Invoice </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="content-manager.php"><i class="fas fa-user"></i> detalis </a>
      </li>';
      }
      else {
        echo '<li class="nav-item">
        <a class="nav-link" href="invoice.php"><i class="fas fa-user"></i> Invoice </a>
      </li>';
      }
      ?>  
      
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>   
      
       <li class="nav-item">
        <a class="nav-link" href="profile.php"><?php echo $name;?></a>
      </li>
      
    </ul>
  </div>  
</nav>
