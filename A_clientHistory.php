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

    //  $updates = new UsersView();
    //  $showUpdate = $updates->displayRecordById($editId);
     
    //  $updateProfile = new AdminController();
    //  $show = $updateProfile->action();

    //  $stat = new StaffView();
    //  $status = $stat->displayServerStatus();
    
    $view = new StaffController();
    $viewHistory = $view->staffAction();
   ?>
   <!-- Sweet Alert End --> 

<!-- Begin Page Content -->
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="A_Index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client List</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->

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
                                <th>Client Full Name</th>
                                <th>Contact Number</th>
                                <th>Barangay</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Civil Status</th>
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
                                <td><?php  echo $info['lastName'];  ?>, <?php  echo $info['firstName']; ?> <?php  echo $info['middleName'];?></td>
                                <td><?php  echo $info['contactNum'];  ?></td>
                                <td><?php  echo $info['brgy'];  ?></td>
                                <td><?php  echo $info['age'];  ?></td>
                                <td><?php  echo $info['gender'];  ?></td>
                                <td><?php  echo $info['civilStatus'];  ?></td>
                                <td>
                                <a href="A_viewClientHistory.php?editId=<?php echo $info['cCTR'] ?>" style="color:green"><button  class="btn btn-primary" >Select</button></a>
                                </td>
                            </tr>                     
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
<!-- piechart -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Random 1", "Random 2", "Random 3"],
                datasets: [{
                    data: [1200, 1700, 800],
                    backgroundColor: ["rgba(255,0,0, 0.5)", "rgba(0,0,255, 0.5)", "rgba(255,255,0, 0.5)"]
                }]
            }     
        });
    });
</script>

<?php include("misc/footer.html") ?>
