<?php
  session_start();
  include('inc/config.php');
  include('inc/checklogin.php');
  check_login();
  //hold logged in user session.
  $a_id = $_SESSION['a_id'];
  //register staff
  
		if(isset($_POST['book_car']))
		{
            $a_id = $_SESSION['a_id'];
            $cc_id = $_GET['cc_id'];
            $instrument_id  = $_GET['instrument_id'];
            $instrument_name  = $_POST['instrument_name'];
            $instrument_type = $_POST['instrument_type'];
            $instrument_regno = $_GET['instrument_regno'];
            $b_duration = $_POST['b_duration'];
            $c_name = $_POST['c_name'];
            $c_natidno =$_POST['c_natidno'];
            $c_phone = $_POST['c_phone'];
            $b_number = $_POST['b_number'];
            $instrument_price = $_POST['instrument_price'];
            //$s_pwd = sha1(md5($_POST['s_pwd']));//enc this shit 
            //$c_bio = $_POST['c_bio'];

            //$s_dpic=$_FILES["s_dpic"]["name"];
		        //move_uploaded_file($_FILES["s_dpic"]["tmp_name"],"../Uploads/Users/".$_FILES["s_dpic"]["name"]);//move uploaded image
            
            //$h_front_dpic=$_FILES["h_front_dpic"]["name"];
            //move_uploaded_file($_FILES["h_front_dpic"]["tmp_name"],"dist/img/houses/".$_FILES["h_front_dpic"]["name"]);
            
            //sql to insert captured values
            $query="INSERT INTO bookings (a_id, cc_id, instrument_id, instrument_name, instrument_type, instrument_regno, b_duration, c_name, c_natidno, c_phone, b_number, instrument_price) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssssssss',$a_id, $cc_id, $instrument_id, $instrument_name, $instrument_type, $instrument_regno, $b_duration, $c_name, $c_natidno, $c_phone, $b_number, $instrument_price);
            $stmt->execute();

            if($stmt)
            {
                      $success = "instrument  hiring request submitted";
                      
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
        <div class="row">
            <div class="card col-md-12">
                <h2 class="card-header">Hire  <?php echo $row->instrument_name;?></h2>
                <div class="card-body">
                    <!--Form-->
                    <form method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Instrument Name</label>
                                <input type="text" required readonly name="instrument_name" value="<?php echo $row->instrument_name;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Instrument Type</label>
                                <input type="text" required readonly name="instrument_type" value="<?php echo $row->instrument_type;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Instrument Registration Number</label>
                                <input type="text" required readonly name="instrument_regno" value="<?php echo $row->instrument_regno;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-6" style="display:none">
                                <label for="exampleInputEmail1">Booking Number</label>
                                    <?php 
                                        $length = 4;    
                                        $alph_num =  substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                        $num =  substr(str_shuffle('0123456789'),1,$length);

                                    ?>
                                <input type="text" required name="b_number" value="<?php echo $alph_num;?>-<?php echo $num;?> " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            
                        </div>
                       
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Hiring  Duration (Maximum 7 Days)</label>
                                <select class="form-control" name="b_duration">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Price Per Day</label>
                                <input type="text" required readonly name="instrument_price" value="<?php echo $row->instrument_price;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <?php }?>
                            <?php
                            
                                $a_id = $_SESSION['a_id'];
                                $ret="SELECT  * FROM  admin  WHERE a_id=?";
                                $stmt= $mysqli->prepare($ret) ;
                                $stmt->bind_param('i',$a_id);
                                $stmt->execute() ;//ok
                                $res=$stmt->get_result();
                                //$cnt=1;
                                while($row=$res->fetch_object())
                                {
                            ?>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Client Name</label>
                                <input type="text" value="<?php echo $row->a_name;?>" required name="c_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Client Phone Number</label>
                                <input type="text" required name="c_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Client ID Number</label>
                                <input type="text"  required name="c_natidno" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                        </div> 
                        <?php }?>
                        <button type="submit" name="book_car" class="btn btn-outline-success">Hire</button>
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