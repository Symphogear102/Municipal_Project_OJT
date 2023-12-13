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
                <li class="breadcrumb-item active" aria-current="page">Staff Configuration</li>
            </ol>
        </nav>
    </div> 

     <!-- User Management Code -->
    <div class="col-xl-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Staff Management List</h6>
            </div>

            <div class="card-body align-middle">
                <!-- Data table -->
                <table id="dtBasicExample" class="table table-bordered table-hover dt-responsive text-center " cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Birthdate</th>
                            <th>Contact</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if ($staff) {
                                while ($staffInfo = mysqli_fetch_assoc($staff)) {

                                    $userTypeCode = $staffInfo['userTypeCode']; 
                        ?>
                        <?php  
                            if ($userTypeCode > 2) {
                            } else {
                        ?>
                        <tr>
                            <td class="align-middle"><img src="img/<?php echo $staffInfo['userImage']; ?>" width="70"></td>
                            <td class="align-middle"><?php echo $staffInfo['userLast'];  ?>, <?php echo $staffInfo['userFirst'];  ?> <?php  echo $staffInfo['userMid'];?></td>
                            <td class="align-middle"><?php echo $staffInfo['userBirthDate'];  ?></td>
                            <td class="align-middle"><?php echo $staffInfo['userContact'];  ?></td>
                            <?php
                                if ($userTypeCode == 1) {
                                    $UserType = "Staff";
                                }

                                if ($userTypeCode == 2) {
                                    $UserType = "Admin";
                                }

                                if ($userTypeCode == 3) {
                                    $UserType = "Super Admin";
                                }

                                if ($userTypeCode == 4) {
                                    $UserType = "Delete";
                                }
                            ?>
                            <td class="align-middle"><?php echo $UserType; ?></td>
                            
                            <td class="align-middle">
                                <!-- Button trigger modal -->
                                </div>
                                
                                    <button type="submit" class="btn btn-primary my-1 px-3" data-toggle="modal" data-target="#exampleModal<?php echo $staffInfo['userCode']?>">
                                        <i class="fa fa-cog" aria-hidden="true">  Edit </i>
                                    </button>
                                
                                </div>
                            
                                <div>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $staffInfo['userCode']; ?>">
                                        <input type="hidden" name="userTypeCode" value="<?php echo $staffInfo['userTypeCode']; ?>">
                                        <button type="submit" name="Delete" class="btn btn-danger my-1">    
                                            <i class="fa fa-trash" aria-hidden="true"> Delete </i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $staffInfo['userCode']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center " id="exampleModalLabel">Update Staff Position</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <!--MODAL TABLE INSERT HERE!!!!!-->  
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-sm-6 text-secondary ">
                                                <input type="hidden" name="id" value="<?php echo $staffInfo['userCode']; ?>">
                                                <label for="userTypeCode"> Position: </label>
                                                <select id="userTypeCode" class="form-control" name="userTypeCode">
                                                    <option name="userTypeCode" selected value="1"> Staff </option>
                                                    <option name="userTypeCode" value="2"> Admin </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"> Close </i> </button>
                                        <button type="submit" name="updateUserinfo" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"> Save changes </i> </button>
                                    </form>
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
