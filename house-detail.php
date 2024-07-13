<?php include('include/header.php'); ?>
        
<div class="jumbotron">
    <h2 class="text-center mt-5">House detail</h2>
</div>
<style>
     
       
        #room_video {
            height: 100%;
            width: 25pc;
        }
       
   
</style>
<main>
    <div class="container">
        <center>
            <div class="w-75">
                <?php 
                if(isset($msg)){
                    echo $msg;
                }
                ?>
            </div>
        </center>
        <!--Section: Block Content-->
        <section class="my-5">
            <div class="row">
                <?php   
                if(isset($_GET['product_id'])){
                    $p_id = $_GET['product_id'];
                    
                    $pdetail_query = "SELECT r.*, d.district, a.area, u.name AS uploaded_by FROM rooms r LEFT JOIN district d ON d.id = r.district_id
                                    LEFT JOIN area a ON a.id = r.area_id
                                    LEFT JOIN users u ON u.id = r.user WHERE r.id = '$p_id'";
                    $pdetail_run   = mysqli_query($con,$pdetail_query);

                    if(mysqli_num_rows($pdetail_run) > 0){
                        $pdetail_row = mysqli_fetch_array($pdetail_run);
                        $pid      = $pdetail_row['id'];
                        $ptitle   = $pdetail_row['type'];
                        $pcat     = $pdetail_row['room_for'];
                        $p_price  = $pdetail_row['rent'];
                        $state    = $pdetail_row['location'];
                        $img1     = $pdetail_row['image'];
                        $desc     = $pdetail_row['description'];
                        $district = $pdetail_row['district'];
                        $area     = $pdetail_row['area'];
                        $loc = $pdetail_row['location'];
                        $kitchen = $pdetail_row['kitchen'];
                        $interior = $pdetail_row['interior'];
                        $vid = $pdetail_row['video'];
                        $toilet = $pdetail_row['toilet'];
                    }
                }
                ?>
                <div class="col-md-5 mb-4 mb-md-0">
                    <div class="view zoom z-depth-2 rounded">
                          <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

  
  <img class="img-fluid w-100" src="img/<?php echo $img1; ?>" id="expandedImg" style="width:100%">
<table class="table table-borderless mb-1">

    <tbody>
         <tr>
                                    <th style="margin: 5px"><img src="img/<?php echo $kitchen; ?>" style="width:100%; height: 45px;" alt="kitchen" onclick="myFunction(this);"></th>
                                    <th><img src="img/<?php echo $interior; ?>" style="width:100%; height: 45px;" alt="interior" onclick="myFunction(this);"></th>
                                    <th><img src="img/<?php echo $img1; ?>" style="width:100%; height: 45px;" alt="image" onclick="myFunction(this);"></th>
                                </tr>
    </tbody>
</table>
  <div id="imgtext"></div>

                    </div>
                </div>

                <div class="col-md-7">
                    <h5><i class="fa-solid fa-house"></i> <?php echo $ptitle; ?></h5>
                    <p class="mb-2 text-muted text-uppercase small">
                        <i class="fa-solid fa-person" style="color: #69dd71;"></i> <?php echo $pcat; ?>
                    </p>
                    <p><span class="mr-1"><i class="fa-solid fa-rupee-sign" style="color: #2a861d;"></i><strong> INR <?php echo $p_price; ?>/-</strong></span></p>
                    <p class="pt-1"><i class="fa-solid fa-toilet" style="color: #0fc00c;"></i> <?php echo $toilet; ?></p>
                    <p class="pt-1"><i class="fa-solid fa-audio-description" style="color: #1e5cc8;"></i> <?php echo $desc; ?></p>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Address : <i class="fa-solid fa-location-dot" style="color: #cac307;"></i> <?php echo $area . ' , ' . $district; ?></strong></th>
                                 
                                    
                                </tr>
                                <tr>
                                  <th class="pl-0 w-25" scope="row"><strong>location : <i class="fa-solid fa-location-dot" style="color: #cac307;"></i> <?php echo $loc ; ?></strong></th>
                                    
                                </tr>
                               
                                <tr>
                                        <th><video id="room_video" class="d-block " controls>
                                                    <source src="img/<?php echo $vid; ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video></th>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div>
            </div>
        </section>
        <!--Section: Block Content-->

        <!--Section: New products-->
        <section>
            <h3 class="text-center pt-5 mb-0">Related  </h3>
            <!-- Grid row -->
            <div class="row mt-5 mb-4">
                <!-- Grid column -->
        <?php
// Assuming you have already established a valid database connection in $con

$area = "some_area"; // Replace this with the area you want to query

$p_query = "SELECT * FROM rooms WHERE type = '$area' ORDER BY id DESC LIMIT 4";
$p_run = mysqli_query($con, $p_query);

if (mysqli_num_rows($p_run) > 0) {
    while ($p_row = mysqli_fetch_array($p_run)) {
        $pid = $p_row['id'];
        $ptitle = $p_row['type'];
        $pcat = $p_row['room_for'];
        $p_price = $p_row['rent'];
        $state = $p_row['location'];
        $img1 = $p_row['image'];
        $desc = $p_row['description'];
?>
        <div class="col-md-6 col-lg-3 mb-4">
            <img src="img/<?php echo $img1; ?>" class="hover-effect" width="100%" height="190px">
            <div class="text-center mt-3">
                <h5 title="<?php echo $ptitle; ?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                <h6>Rs. <?php echo $p_price; ?></h6>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 text-center">
                    <a href="product-detail.php?product_id=<?php echo $pid; ?>" type="submit" onclick="a()" class="btn btn-primary btn-sm hover-effect">
                        <i class="far fa-shopping-cart"></i>
                    </a>
                    <a href="product-detail.php?product_id=<?php echo $pid; ?>" class="btn btn-default btn-sm hover-effect text-dark">
                        <i class="far fa-info-circle"></i> View Details
                    </a>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo '<div class="text-center"><h4> NO RELATED HOMES </h4></div>';
}
?>

            </div>
            <!-- Grid row -->
        </section>
        <!--Section: New products-->
    </div>
</main>
 
<?php include('include/footer.php');?>
<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>
