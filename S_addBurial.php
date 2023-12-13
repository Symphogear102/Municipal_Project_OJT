<?php 
include 'misc/S_header.php'; 
$staff = new StaffView();

$staffInfo = $staff->displayClientID($_SESSION['clientID']);
$form = new StaffController();
$forming = $form->staffAction();
$user = new UsersView();
$userInfo = $user->displayUser();
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

<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="S_Index.php"> Home </a></li>
            <li class="breadcrumb-item"><a href="S_burialAssistance.php"> Select Client </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Burial Assistance</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      
    </div>

    
    
    <div class="col-xl-12   ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Clients List</h6>
            </div>
            <div class="card-body text-center">
                <!-- Data table -->
                <form action ="" method="post">
                    
                    <input class="form-control" type="hidden" name="userCode" id="userCode" value="<?php echo $userInfo['userCode']; ?>" readonly>
                    <input class="form-control" type="hidden" name="staffPosition" id="staffPosition" value="<?php echo $userInfo['staffPosition']; ?>" readonly> 
                    <input class="form-control" type="hidden" name="nameofStaff" id="nameofStaff" value="<?php echo $userInfo['userFirst']; ?>, <?php echo $userInfo['userMid']; ?>, <?php echo $userInfo['userLast']; ?>" readonly>  
                    <input class="form-control" type="hidden" name="typeOfAssistance" id="typeofAssistance" value="Burial Assistance" readonly> 
                    <input class="form-control" type="hidden" name="receiveAssistance" id="receiveAssistance" value= "<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly> 
                    <input class="form-control" type="hidden" name="cCTR" id="userCode" value="<?php echo $staffInfo['cCTR']; ?>" readonly>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="fName">Client Code:</label>
                    <input class="form-control" type="text" name="clientCode" id="clientCode" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 
                </div>
                
                <div class="form-group col-md-4">
                    <label for="fName">Full Name of Client:</label>
                    <input class="form-control" type="text" name="clientName" id="clientFullName" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly> 
                </div>

                <div class="form-group col-md-4">
                    <label for="nameofDeceased">Name of the Deceased:</label>
                    <input class="form-control" type="text" name="nameofDeceased" id="nameofDeceased" value="" required> 
                </div>

                <div class="form-group col-md-2">
                    <label for="dateofDeath">Date of Death:</label>
                    <input class="form-control" type="date" name="dateofDeath" id="nameofDeceased" value="" required> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="causeofDeath">Cause of Death:</label>
                    <input class="form-control" type="text" name="causeofDeath" id="nameofDeceased" value="" required> 
                </div>

                <div class="form-group col-md-4">
                    <label for="amounttoSettle">Amount to Settle:</label>
                    <input class="form-control" type="number" name="amounttoSettle" id="nameofDeceased" value="" required> 
                </div>
                
                <div class="form-group col-md-4">
                    <label for="dateIssued">Issued Amount:</label>
                    <input class="form-control" type="number" name="issuedAmount" id="nameofDeceased" value="" required> 
                </div>
            </div>
            <div>
                <button class="btn btn-primary my-2 px-5" type="submit" name="addBurial">Submit</button>                    
            </div>
                
            </form>
        </div>
    </div>
</div>
</div>
</div>

<!-- End of Main Content -->


<?php include("misc/footer.html") ?>



