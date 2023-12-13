<?php 
include 'misc/S_header.php';

  $updates = new UsersView();

  $showUpdate = $updates->displayRecordById($editId);

  $updateProfile = new AdminController();
  $show = $updateProfile->action();

  $staff = new StaffView();
$staffInfo = $staff->displayClientID($_SESSION['clientID']);

$familyInfo = $staff->displayFamilyInfo($editId);

$form = new StaffController();
$forming = $form->staffAction();
  


?>
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
   ?>
   <!-- Sweet Alert End --> 
            
  <div class="col-xl-12 col-lg-6 mb-">    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="S_Index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </nav>

    <!-- Clients Info -->
    <div class="col-xl-12 col-lg-6">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Client's Information</h6>
            </div>
            <!-- Card Header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $showUpdate['userFirst']; ?> <?php echo $showUpdate['userMid']; ?> <?php echo $showUpdate['userLast']; ?>
                    </div>
                </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Gender:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
                <div class="divider d-none d-sm-block"></div>
                    <div class="col-sm-2">
                        <h6 class="mb-0">Age:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Birthdate:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
                <div class="divider d-none d-sm-block"></div>
                    <div class="col-sm-2">
                        <h6 class="mb-0">Birthplace:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Address:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <!--  -->
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Contact Number:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
        
                    <div class="col-sm-2">
                        <h6 class="mb-0">Civil Status:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!-- <?php echo $info['civilStatus']?> -->
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Occupation:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
        
                    <div class="col-sm-2">
                        <h6 class="mb-0">Monthly Income:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <!--  -->
                    </div>
                </div>
                <hr> 
                <!-- <?php 
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
                    ?> -->
                <div class="row">
                <div class="col-sm-3">
                        <h6 class="mb-0">No. of Children:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                    <!--  -->
                    </div>
                    <div class="col-sm-3">
                        <h6 class="mb-0">Solo Parent:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                        
                    <?php echo $soloparent;?>
                    </div>
        
                    <div class="col-sm-3">
                        <h6 class="mb-0">Senior:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                    <?php echo $Senior; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">PWD:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                    <?php echo $pwd; ?>
                    </div>
                    <div class="col-sm-3">
                        <h6 class="mb-0">Youth:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                    <?php echo $youth; ?>
                    </div>
        
                    <div class="col-sm-3">
                        <h6 class="mb-0">4PC:</h6>
                    </div>
                    <div class="col-sm-1 text-secondary">
                    <?php echo $fourpeace; ?>
                    </div>
                </div>
            </div>
            <hr>
            <h6 class="ml-3 font-weight-bold text-primary">Family Composition</h6>
            <div class="card-body">
                <table id="dtBasicExample" class="table table-bordered table-hover dt-responsive text-center" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>CS</th>
                            <th>Relationship</th>
                            <th>E. Attainment</th>
                            <th>Occupation</th>
                            <th>Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      
    <div class="col-xl-12 col-lg-6 mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">something functions</h6>
            </div>
            <div class="card-body ">
                flkasndmalsd
            </div>
        </div>
    </div>
</div>



<!-- Data table -->
<script>  
$('table').DataTable();  
</script>

<?php include("misc/footer.html") ?>
