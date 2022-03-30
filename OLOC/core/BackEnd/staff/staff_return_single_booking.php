<?php
  session_start();
  include('inc/config.php');
  include('inc/checklogin.php');
  check_login();
  //hold logged in user session.
  $s_id = $_SESSION['s_id'];
  //register staff
  
		if(isset($_POST['return_car']))
		{
            
            $b_id = $_GET['b_id'];
            $instrument_id = $_GET['instrument_id'];
            $b_instrument_return_status = $_POST['b_instrument_return_status'];
            $instrument_status = $_POST['instrument_status'];
        
            //sql to insert captured values
            $query1="UPDATE bookings SET b_instrument_return_status =? WHERE b_id =? ";
            $query2="UPDATE instruments SET instrument_status =? WHERE instrument_id =? ";

            $stmt1 = $mysqli->prepare($query1);
            $stmt2 = $mysqli->prepare($query2);

            $rc=$stmt1->bind_param('si', $b_instrument_return_status, $b_id);
            $rc=$stmt2->bind_param('si', $instrument_status, $instrument_id);

            $stmt1->execute();
            $stmt2->execute();


            if($stmt1 && $stmt2)
            {
                      $success = "instrument returned";
                      
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

    <div class="container-fluid mt--7">
        <?php
                            
            $b_id = $_GET['b_id'];
            $ret="SELECT  * FROM  bookings  WHERE b_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$b_id);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
            {
        ?>
        <div class="row">
            <div class="card col-md-12">
                <h2 class="card-header">Return <?php echo $row->instrument_name;?></h2>
                <div class="card-body">
                    <!--Form-->
                    <form method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" required readonly name="instrument_name" value="<?php echo $row->instrument_name;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Type</label>
                                <input type="text" required readonly name="instrument_type" value="<?php echo $row->instrument_type;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Registration Number</label>
                                <input type="text" required readonly name="instrument_regno" value="<?php echo $row->instrument_regno;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Number Of Days Hired</label>
                                <input type="text" required readonly name="b_number" value="<?php echo $row->b_duration;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Client Name</label>
                                <input type="text" readonly value="<?php echo $row->c_name;?>" required name="c_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Client Phone Number</label>
                                <input type="text" required readonly value="<?php echo $row->c_phone;?>" name="c_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Client ID Number</label>
                                <input type="text"  readonly required name="c_natidno" value="<?php echo $row->c_natidno;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Booking Number</label>
                                   
                                <input type="text" required readonly name="b_number" readonly value="<?php echo $row->b_number;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-4" style="display:none">
                                <label for="exampleInputEmail1">Return Status</label>
                                <input type="text" required readonly name="b_instrument_return_status" readonly value="Returned" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-4" style="display:none">
                                <label for="exampleInputEmail1"Status</label>
                                <input type="text" required readonly name="instrument_status" readonly value="Available" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            


                        </div> 
                        <?php }?>
                        <button type="submit" name="return_car" class="btn btn-outline-success">Return</button>
                    </form>
                    <!-- ./ Form -->
                </div>    
            </div>
        </div>
      <!-- Footer -->
        <?php include("inc/footer.php");?>      
    </div>
  </div>
 
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