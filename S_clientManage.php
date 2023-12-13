<?php include('misc/S_header.php')?>

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

     <!-- Breadcrumb -->
    <div class="col-xl-12 col-lg-6">    
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="S_Index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Client Configuration</li>
            </ol>
        </nav>
    </div> 

     <!-- User Management Code -->
    <div class="col-xl-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Client List</h6>
            </div>

            <div class="card-body align-middle">
                <!-- Data table -->
                <table id="dtBasicExample" class="table table-bordered table-hover dt-responsive text-center " cellspacing="0">
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
                             <?php 
                                    if($info['clientDelete'] == 1)  {
                                ?>
                            <tr>
                                <td class="align-middle"><?php  echo $info['clientCode'];  ?></td>
                                <td class="align-middle"><?php  echo $info['lastName'];  ?>, <?php  echo $info['firstName'];  ?> <?php  echo $info['middleName'];?> <?php  echo $info['suffix'];  ?></td>
                                <td class="align-middle"><?php  echo $info['contactNum'];  ?></td>
                                <td class="align-middle"><?php  echo $info['age'];  ?></td>
                                <td class="align-middle"><?php  echo $info['gender'];  ?></td>
                                <td class="align-middle"><?php  echo $info['street']; ?>, <?php  echo $info['brgy']; ?>, <?php  echo $info['city']; ?>, <?php  echo $info['province']; ?></td>
                                <td class="align-middle">
                                  <!-- Button trigger modal -->
                                  <a href="S_clientInfo.php?editId=<?php echo $info['clientCode'] ?>"><button type="submit" class="btn btn-primary my-1 px-3" data-toggle="modal" data-target="#ClientModal<?php echo $info['clientCode']?>">
                                    <i class="fa fa-cog" aria-hidden="true">  Edit </i>
                                </button></a>
                                <form action="" method="post">
                                    <input type="hidden" name="clientid" value="<?php  echo $info['cCTR'];  ?>">
                                <button type="submit" name="deleteClient" class="btn btn-danger my-1">
                                    <i class="fa fa-trash" aria-hidden="true"> Delete </i>
                                </button>
                                    </form>
                              
                            </td>
                        </tr>
                        
<?php 
    }}}
?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

<!-- End of Main Content -->

<!-- Data table -->
<script>  
    $('table').DataTable();  
</script>


<?php include("misc/footer.html") ?>
