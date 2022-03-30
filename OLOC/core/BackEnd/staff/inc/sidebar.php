<?php
    $s_id = $_SESSION['s_id'];
    $ret="SELECT  * FROM  staff  WHERE s_id=?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('i',$s_id);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
?>
 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">

    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="staff_dashboard.php">
        <h1>OWOM</h1>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../Uploads/Users/<?php echo $row->s_dpic;?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome! <?php echo $row->s_name;?></h6>
            </div>
            <a href="staff_profile.php" class="dropdown-item">

              <span>My profile</span>
            </a>

            <a href="staff_update_profile.php" class="dropdown-item">

              <span>Update profile</span>
            </a>
            
            <a href="staff_change_pwd.php" class="dropdown-item">

              <span>Change Password</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="staff_logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="staff_dashboard.php">
                <img src="assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item   ">
            <a class="nav-link  " href="staff_dashboard.php">
               Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_add_clients.php">
              </i>Add Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="staff_manage_clients.php">
             Manage Clients
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_add_instruments.php">
               Add Instruments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_manage_instruments.php">
               Manage Instruments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_manage_bookings.php">
               Hire Instruments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_approve_bookings.php">
               Manage Hiring
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_manage_payments.php">
              Payments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_manage_returns.php">
               Manage Returns
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="staff_advance_reporting.php">
               Advance Reporting
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link " href="staff_logout.php">
             Log Out
            </a>
          </li>

          
        </ul>
        
      </div>
    </div>
  </nav>

<?php }?>