<?php include('misc/header.php')?>

    <!-- Sweet Alert  -->
    <?php if (isset($_SESSION['message'])) { ?>
        <script>
        swal({
            title: "<?php echo $_SESSION['title'] ?>",
            text: "<?php echo $_SESSION['message'] ?>",
            icon: "<?php echo $_SESSION['msg'] ?>",
            button: "OK!",
            timer: 4000,
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
                <li class="breadcrumb-item"><a href="A_Index.php">Home</a></li>
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
                                  <button type="submit" class="btn btn-primary my-1 px-3" data-toggle="modal" data-target="#ClientModal<?php echo $info['clientCode']?>">
                                    <i class="fa fa-eye" aria-hidden="true">  View </i>
                                </button>
                                <form action="" method="post">
                                    <input type="hidden" name="clientid" value="<?php  echo $info['cCTR'];  ?>">
                                <button type="submit" name="deleteClient" class="btn btn-danger my-1">
                                    <i class="fa fa-trash" aria-hidden="true"> Delete </i>
                                </button>
                                    </form>
                              
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="ClientModal<?php echo $info['clientCode']?>" tabindex="-1" role="dialog" aria-labelledby="ClientModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ClientModalLabel">Client's Full Information</h5>
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

<!-- End of Main Content -->

<!-- Data table -->
<script>  
    $('table').DataTable();  
</script>


<?php include("misc/footer.html") ?>
