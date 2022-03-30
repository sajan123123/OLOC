<?php
  session_start();
  include('inc/config.php');
  include('inc/checklogin.php');
  check_login();
  //hold logged in user session.
  $s_id = $_SESSION['s_id'];
  //register car
  
		if(isset($_POST['update_car']))
		{
            $instrument_cat_id = $_POST['instrument_cat_id'];
            $instrument_regno = $_POST['instrument_regno'];
            $instrument_name = $_POST['instrument_name'];
            $instrument_type = $_POST['instrument_type'];
            $instrument_price = $_POST['instrument_price'];
            $instrument_features = $_POST['instrument_features'];

            //save car images
            $exterior_img  = $_FILES["exterior_img"]["name"];
		    move_uploaded_file($_FILES["exterior_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["exterior_img"]["name"]);//move uploaded image
            
            $interior_img  = $_FILES["interior_img"]["name"];
		    move_uploaded_file($_FILES["interior_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["interior_img"]["name"]);//move uploaded image
                        
            $front_img  = $_FILES["front_img"]["name"];
		    move_uploaded_file($_FILES["front_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["front_img"]["name"]);//move uploaded image
            
            $rear_img=$_FILES["rear_img"]["name"];
            move_uploaded_file($_FILES["rear_img"]["tmp_name"],"../Uploads/Instrument/".$_FILES["rear_img"]["name"]);
            
            //sql to insert captured values
            $instrument_id = $_GET['instrument_id'];

            $query="UPDATE  instruments SET instrument_cat_id = ?, instrument_regno = ?, instrument_name = ?, instrument_price =?, instrument_type = ?, instrument_features = ?, exterior_img = ?, rear_img = ?, interior_img = ?, front_img =? where instrument_id = ?";
            $stmt = $mysqli->prepare($query);
            echo $instrument_cat_id;
            $rc=$stmt->bind_param('ssssssssssi', $instrument_cat_id, $instrument_regno, $instrument_name, $instrument_price, $instrument_type, $instrument_features, $exterior_img, $rear_img, $interior_img, $front_img, $instrument_id);
            $stmt->execute();

            if($stmt)
            {
                      $success = "instrument updated";
                      
                      //echo "<script>toastr.success('Have Fun')</script>";
            }
            else {
              $err = "Please Try Again Or Try Later";
            }
			
			
		}
?>

<!DOCTYPE html>
<html lang="en">

<?php include("inc/head.php");?>

<body class="">
 <!--Sidebar-->
 <?php include("inc/sidebar.php");?>
  
  <div class="main-content">
    <!-- Navbar -->
   <?php include("inc/nav.php");?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header  pb-8 pt-5 pt-md-8" style="min-height: 300px; background-image: url(../../img/header-bg.jpg); background-size: cover; background-position: center top;">
        <span class="mask bg-gradient-default opacity-5"></span>
    </div>
        <?php
                            
            $instrument_id = $_GET['instrument_id'];
            $ret="SELECT  * FROM  instruments  WHERE instrument_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$instrument_id);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
            {
        ?>

        <div class="container-fluid mt--7">
            <!--Pie chart to show number of car categories-->
            <div class="row">
                <div class="card col-md-12">
                    <h2 class="card-header">Update <?php echo $row->instrument_name;?></h2>
                    <div class="card-body">
                        <!--Form-->
                        <form method="post" enctype="multipart/form-data" >

                                    <label for="exampleInputEmail1">Instrument Name</label>
                                    <input type="text" value="<?php echo $row->instrument_name;?>" required name="instrument_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Instrument Registration Number</label>
                                    <input type="text" required value="<?php echo $row->instrument_regno;?>" name="instrument_regno" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Hiring Price Per Day (Nrs_)</label>
                                    <input type="text" required value="<?php echo $row->instrument_price;?>" name="instrument_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Instrument Type</label>
                                    <select class="form-control" name="instrument_type" onChange="getCarCategoryId(this.value);" id="instrument_type" >
                                        <option>select instrument type</option>
                                        <?php
                                            //get all car categories
                                            $ret="SELECT * FROM instrument_categories ORDER BY RAND() LIMIT 10 ";
                                            $stmt= $mysqli->prepare($ret) ;
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                            {
                                        ?>
                                            <option value="<?php echo $row->instrument_cat_name;?>"> <?php echo $row->instrument_cat_name;?></option>
                                        <?php }?>
                                    </select>

                                    <label for="exampleInputEmail1">Intrument caategory id</label>
                                    <input type="text" required name="instrument_cat_id" id="car_category_id" class="form-control"  aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Extrior Picture</label>
                                    <input type="file" required  name="exterior_img" class="form-control btn btn-outline-success" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Interior Picture </label>
                                    <input type="file" required name="interior_img" class="form-control btn btn-outline-success" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Rear Picture </label>
                                    <input type="file" required name="rear_img" class="form-control btn btn-outline-success" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    <label for="exampleInputEmail1">Front Picture </label>
                                    <input type="file" required name="front_img" class="form-control btn btn-outline-success" id="exampleInputEmail1" aria-describedby="emailHelp">

                            <hr>

                            <?php
                                $instrument_id = $_GET['instrument_id'];
                                $ret="SELECT  * FROM  instruments  WHERE instrument_id=?";
                                $stmt= $mysqli->prepare($ret) ;
                                $stmt->bind_param('i',$instrument_id);
                                $stmt->execute() ;//ok
                                $res=$stmt->get_result();
                                //$cnt=1;
                                while($row=$res->fetch_object())
                                {
                            ?>


                                    <label for="exampleInputEmail1">Distinct Features</label>
                                    <textarea type="text" required name="instrument_features"  class="form-control" id="instrument_features" aria-describedby="emailHelp"><?php echo $row->instrument_features;?></textarea>

                            <?php }?>
                            <button type="submit" name="update_car" class="btn btn-outline-success">Update instrument</button>
                        </form>
                        <!-- ./ Form -->
                    </div>    
                </div>
            </div>
        <!-- Footer -->
            <?php include("inc/footer.php");?>      
        </div>
    <?php }?>
  </div>
 
  <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script type="text/javascript">
    CKEDITOR.replace('instrument_features')
  </script>
  <script src="assets/js/canvasjs.min.js"></script>
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>