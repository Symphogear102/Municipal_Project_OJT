<?php include('misc/S_header.php');
$updateProfile = new StaffController();
$show = $updateProfile->staffAction();
    

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

<!-- Begin Page Content -->
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="S_Index.php">Home</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Medical Assistance</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      
    <a href="S_addClient.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-user-plus fa-sm text-white-50"></i> Add New Client</a>
    </div>

    
    
    <div class="col-xl-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">ADD MEDICINE ASSISTANCE (Client List)</h6>
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
                                        
                                <a  href="S_addCaseMA.php?clientID=<?php echo $info['cCTR'] ?>">
                                    <button class="btn btn-primary" type="button" name="maSubmit">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> Select
                                    </button>
                                </a>


                                <!-- <i class="fa fa-check-circle" aria-hidden="true"> Select Client </i>  -->
                               
                            </td>
                        </tr>
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
<!-- End of Main Content -->


<!-- Data table -->
<script>  
$('table').DataTable();  
</script>


<?php include("misc/footer.html") ?>