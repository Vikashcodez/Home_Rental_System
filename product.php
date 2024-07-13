<?php include('include/header.php');


if(isset($_GET['page'])){
  $page_id = $_GET['page'];
}
else{
  $page_id = 1;
}

$required_pro = 12;

$query = "SELECT * FROM rooms  ORDER BY id";
$run   = mysqli_query($con,$query);
$count_rows = mysqli_num_rows($run);

$pages = ceil($count_rows / $required_pro);
$product_start = ($page_id - 1) * $required_pro;  




?>


<div class="jumbotron">
  <h2 class="text-center mt-5">ALL HOMES</h2>
</div>

<div class="container mt-5">
 <div class="row">
  <div class="col-md-3 col-12">
    <div class="list-group">
     <a href='product.php' class='list-group-item'><i class='fal fa-home ml-2'></i> ALL  </a>
     <?php  
     $cat_query = "SELECT * FROM categories ORDER BY id ASC";
     $cat_run   = mysqli_query($con,$cat_query);
     if(mysqli_num_rows($cat_run) > 0){
      While($cat_row = mysqli_fetch_array($cat_run)){
        $cid      = $cat_row['id'];
        $cat_name = ucfirst($cat_row['category']);

        echo " <a href='product.php?cat_id=$cid' class='list-group-item'> $cat_name </a>";
      }

    }
    else{
      echo " <a class='list-group-item'> No Category </a>";
    }

    ?>
  </div>
</div>

<div class="col-md-9 col-12">
 <div class="row">
  <div class="col-md-6"></div>
  <div class="col-md-6">
   <form method="post">
    <div class="input-group">
      <input type="text" class="form-control" name="search" placeholder="Search State Or product">
      <div class="input-group-append">
        <input class="btn btn-primary rounded-left" type="submit" name="sear_submit" vlaue="Search" >
      </div>
    </div>
  </form>
</div>
</div>

<?php 
if(isset($msg)){
 echo $msg;
}
else if(isset($error)){
  echo $error;
}
?>

<!----Product list-->
<div class="row">

  <?php   

  if(isset($_GET['cat_id'])){
   $catid = $_GET['cat_id'];
   $cat_query = "SELECT * FROM categories WHERE id=$catid ORDER BY id ASC";
   $run   = mysqli_query($con,$cat_query);
   $row   = mysqli_fetch_array($run);
   $catname = $row['category'];

// Properly quote the $catname value in the SQL query
   $p_query = "SELECT * FROM rooms WHERE type='$catname' ORDER BY id DESC LIMIT $product_start,$required_pro";


 } else if(isset($_POST['sear_submit'])){
  $search = $_POST['search'];
  $p_query = "SELECT * FROM rooms WHERE type LIKE '%$search%' OR room_for LIKE '%$search%' OR location LIKE '%$search%' ";
}
else{
  $p_query = "SELECT * FROM rooms ORDER BY id DESC LIMIT $product_start,$required_pro";
}

$p_run   = mysqli_query($con,$p_query);

if(mysqli_num_rows($p_run) > 0 ){
  while($p_row = mysqli_fetch_array($p_run)){
   $pid      = $p_row['id'];
   $ptitle  = $p_row['type'];
   $pcat    = $p_row['room_for'];
   $p_price = $p_row['rent'];
   $state    = $p_row['location'];
   $img1    = $p_row['image'];
   $status = $p_row['status'];
   ?>

   <div class="col-md-4 mt-4 border rounded p-1 mb-1 mx-0.5">
    <img src="img/<?php echo $img1; ?>" class="hover-effect" width="100%" height="190px">
    <div class="text-center mt-3">
     <h5 title="<?php echo $ptitle; ?>"><?php echo substr($ptitle,0,20); ?>...</h5>
     <h6>Rs. <?php echo $p_price; ?></h6>
   </div>

   <div class="row">
    <div class="col-md-12 col-sm-12 col-12 text-center">

                                       
<?php 
if ($status == "Available") {
    echo '<a href="house-detail.php?product_id=' . $pid . '" class="btn btn-warning btn-sm text-dark">
        <i class="far fa-check-circle"></i> ' . $status . '
    </a>';
}


else {
  echo '<a href="" class="btn btn-danger btn-sm hover-effect text-dark disabled">
        <i class="far fa-ban "></i>  ' . $status . '
    </a>';
}
?>

   </div>

 </div>
</div>

<?php  
}
}
else{
  echo "<h3 class='text-center'> Products Are Not Available Yet </h3>";
}

?>
</div>                               
<!--end product list-->

<!---Pagination-->

<ul class="pagination pagination-md mt-5 justify-content-center">
 <?php for($i=1; $i <= $pages; $i++ ){
  echo "<li class='page-item ".($i == $page_id ? ' active ' : '')."'><a class='page-link' href='product.php?page=$i'>$i</a></li>";
}?>
</ul>

<!---end pagination-->

</div>
</div>
</div>
<?php include('include/footer.php'); ?>