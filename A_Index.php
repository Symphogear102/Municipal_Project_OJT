<?php include('misc/header.php')?>
    <!-- Sweet Alert  -->
    <?php if (isset($_SESSION['message'])) { ?>
    <script>
      swal({
          title: "<?php echo $_SESSION['title'] ?>",
          text: "<?php echo $_SESSION['message'] ?>",
          icon: "<?php echo $_SESSION['msg'] ?>",
          button: "OK!",
          timer: 3000,
      });
    </script>
   <?php
   unset($_SESSION['message']);
     } 
     
     $updates = new UsersView();
     $showUpdate = $updates->displayRecordById($editId);
     
     $updateProfile = new AdminController();
     $show = $updateProfile->action();

     $stat = new StaffView();
     $status = $stat->displayServerStatus();

   ?>
   <!-- Sweet Alert End --> 

<!-- Begin Page Content -->
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="A_Index.php">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
    data-toggle="modal" data-target="#modalMaintenance" name="modal">
        <i class="fas fa-cogs fa-sm text-white-50">
        </i> Change Server Status
    </button>            
    </div>

    <!--OUTSIDE MODAL STATUS-->
    <div class="card border-left-primary col-xl-2 col-md-6 mb-2">
    <?php
            if ($status['mode'] == "Active")
            {   $mode = $status['mode'];
                echo"<h6> Server is Currently: <p style='color:green'>" . $mode . "</h6>";
            }

            else if ($status['mode'] == "Inactive")
            {   $mode = $status['mode'];
                echo"<h6> Server is Currently: <p style='color:red'>" . $mode . "</h6>";
            }
    ?>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Client Count </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countClientRow ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Financial Assistant </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countFinancialRow ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Medical Assistant </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $countMedicalRow ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-heartbeat fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Burial Assistant </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countBurialRow ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <!-- <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Line Chart</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Medical
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Burial 
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Financial 
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>  -->

<!-- container-fluid -->

    <div class="col-xl-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List of Clients</h6>
            </div>
            <div class="card-body ">
                <!-- Data table -->
                <table id="dtBasicExample" class="table table-bordered table-hover dt-responsive text-center" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Client Code</th>
                                <th>Full Name</th>
                                <th>Contact Number</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if ($data) {
                                    while ($info = mysqli_fetch_assoc($data)) {
                            ?>
                            <tr>
                                <td><?php  echo $info['clientCode'];  ?></td>
                                <td><?php  echo $info['lastName'];  ?>, <?php  echo $info['firstName'];  ?> <?php  echo $info['middleName'];?> <?php  echo $info['suffix'];  ?></td>
                                <td><?php  echo $info['contactNum'];  ?></td>
                                <td><?php  echo $info['age'];  ?></td>
                                <td><?php  echo $info['gender'];  ?></td>
                                <td><?php  echo $info['street']; ?>, <?php  echo $info['brgy']; ?>, <?php  echo $info['city']; ?>, <?php  echo $info['province']; ?></td>
                                <td>
                                  <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $info['clientCode']?>">
                                <i class="fa fa-eye" aria-hidden="true"> View </i> 
                                </button>
                            </td>
                        </tr>

                         <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $info['clientCode']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Client's Full Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <!--MODAL TABLE INSERT HERE!!!!!-->  
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Client Code</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $info['clientCode']?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $info['lastName']?>, <?php echo $info['firstName']?>, <?php echo $info['middleName']?>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $info['gender']?>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Brithdate</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $info['birthDate']?>
                                    </div>
                                <div class="divider d-none d-sm-block"></div>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        <?php echo $info['age']?>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php  echo $info['street']; ?>, <?php  echo $info['brgy']; ?>, <?php  echo $info['city']; ?>, <?php  echo $info['province']; ?>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact Number</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $info['contactNum']?>
                                    </div>
                        
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Civil Status</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $info['civilStatus']?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Monthly Income</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $info['monthlyIncome']?>
                                    </div>
                        
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Number of Children</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $info['numofChildren']?>
                                    </div>
                                </div>
                                <hr> 
                                <?php 
                                if ($info['soloParent'] == "Yes" ) {
                                         $soloparent = "  <i class='fa fa-check-circle' ></i>";
                                } else {
                                    $soloparent = " <i class='fa fa-times-circle'></i>";
                                } 

                                 if ($info['senior'] == "Yes" ) {
                                         $Senior = "  <i class='fa fa-check-circle' ></i>";
                                } else {
                                    $Senior = " <i class='fa fa-times-circle'></i>";
                                }

                                if ($info['pwd'] == "Yes" ) {
                                         $pwd = "  <i class='fa fa-check-circle' ></i>";
                                } else {
                                    $pwd = " <i class='fa fa-times-circle'></i>";
                                }

                                if ($info['youth'] == "Yes" ) {
                                         $youth = "  <i class='fa fa-check-circle' ></i>";
                                } else {
                                    $youth = " <i class='fa fa-times-circle'></i>";
                                }

                                if ($info['4pc'] == "Yes" ) {
                                         $fourpeace = "  <i class='fa fa-check-circle' ></i>";
                                } else {
                                    $fourpeace = " <i class='fa fa-times-circle'></i>";
                                }
                                    ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Solo Parent</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                        
                                    <?php echo $soloparent;?>
                                    </div>
                        
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Senior</h6>
                                    </div>
                                    <div class="col-sm-3 text-secondary">
                                    <?php echo $Senior; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">PWD</h6>
                                    </div>
                                    <div class="col-sm-2 text-secondary">
                                    <?php echo $pwd; ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">Youth</h6>
                                    </div>
                                    <div class="col-sm-2 text-secondary">
                                    <?php echo $youth; ?>
                                    </div>
                        
                                    <div class="col-sm-2">
                                        <h6 class="mb-0">4PC</h6>
                                    </div>
                                    <div class="col-sm-2 text-secondary">
                                    <?php echo $fourpeace; ?>
                                    </div>
                                </div>
                                </div>                               
                              
                                <div class="modal-footer">
                                    <div class="justify-content-between d-flex"></div>
                                    <button type="button" class="btn btn-secondary mx-4  " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> CLOSE </i></button>
       
                                </div>
                                </div>
                            </div>
                            </div>

                            
                        <?php 
                            } 
                                }
                        ?>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMaintenance" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Server Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
                               
          
          <?php
            if ($status['mode'] == "Active")
            {   $mode = $status['mode'];
                echo"<h6> Current Status: <p style='color:green'>" . $mode . "</h6>";
            }

            else if ($status['mode'] == "Inactive")
            {   $mode = $status['mode'];
                echo"<h6> Current Status: <p style='color:red'>" . $mode . "</h6>";
            }
          ?>

          <select id="inputState" class="form-control" name="mode">
              <option disabled selected> --Select-- </option>
              <option value="Active">Active</option>            
              <option value="Inactive">Inactive</option>
            </select>
          </div>
          <div class="d-flex justify-content-center">
          <button type="submit" name="maintenance" class="btn btn-dark px-5 my-2">Save changes</button>
        </div>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- End of Main Content -->


<!-- Data table -->
<script>  
$('table').DataTable();  
</script>
<!-- piechart -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>


</script>

<?php include("misc/footer.html") ?>
