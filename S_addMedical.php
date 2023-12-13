<?php 
include 'misc/S_header.php'; 
$staff = new StaffView();

$staffInfo = $staff->displayClientID($_SESSION['clientID']);
$form = new StaffController();
$forming = $form->staffAction();

$user = new UsersView();
$userInfo = $user->displayUser();

if(isset($_POST['addMedical']))
{
    $caseStudy = $form->addClientMedical();
    $_SESSION['title'] = 'Added Successfully!!!';
    $_SESSION['message'] = 'The Data has been Successfully Added!!';
    $_SESSION['msg'] = 'success';
}
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
                <li class="breadcrumb-item"><a href="S_Index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="S_medicalAssistance.php">Medical Assistance</a></li>
                <li class="breadcrumb-item active"  aria-current="page">Medical Recording</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    
    </div>

             
    <div class="col-xl-12 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Record</h6>
                <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary"><i class="fa fa-medkit" aria-hidden="true"></i> Add Medicine</a>
            </div>
            <div class="card-body py-3 text-center">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="clientCode">Client Code:</label>
                        <input class="form-control" type="text" name="clientCode" id="clientCode" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 
                    </div>
                    <div class="form-group col-md-6">
                        <label for="claimant">Full Name of Claimant:</label>
                        <input class="form-control" type="text" name="claimant[]" id="claimant" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly> 
                    </div>
                </div>
            <form action="" method="post">
                <input class="form-control" type="hidden" name="clientCode[]" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 
                <input class="form-control" type="hidden" name="claimant[]" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly> 
                
                                

                <div class="paste-new-forms">

                </div>
                    
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-primary mt-3 px-5" name="addMedical">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
</div>


<!-- End of Main Content -->


<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append(
                    '<div class="main-form mt-3 ">\
                        <div class="form-row">\
                            <div class="col-md-5">\
                                <div class="form-group mb-4">\
                                <label for="medName"> Medicine Name: </label>\
                                <input class="form-control" type="hidden" name="clientCode[]" value="<?php echo $staffInfo['clientCode']; ?>" required>\
                                <input class="form-control" type="hidden" name="claimant[]" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" required>\
                                    <input class="form-control" type="text" name="medName[]" id="medName" required>\
                <input class="form-control" type="hidden" name="clientCode2[]" id="clientCode" value="<?php echo $staffInfo['clientCode']; ?>" readonly>\
                <input class="form-control" type="hidden" name="typeOfAssistance[]" id="typeofAssistance" value="Medicine Assistance" readonly>\
                <input class="form-control" type="hidden" name="receiveAssistance[]" id="receiveAssistance" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly>\
                <input class="form-control" type="hidden" name="AmountofAssistance[]" id="AmountofAssistance" value="Medicine" readonly>\
                <input class="form-control" type="hidden" name="nameofStaff[]" id="nameofStaff" value="<?php echo $userInfo['userFirst']; ?>, <?php echo $userInfo['userMid']; ?>, <?php echo $userInfo['userLast']; ?>" readonly>\
                <input class="form-control" type="hidden" name="staffPosition[]" id="staffPosition" value="<?php echo $userInfo['staffPosition']; ?>" readonly>\
                <input class="form-control" type="hidden" name="userCode[]" value="<?php echo $userInfo['userCode']; ?>" readonly>\
                <input class="form-control" type="hidden" name="cCTR[]" value="<?php echo $staffInfo['cCTR']; ?>" readonly>\
                                </div>\
                            </div>\
                            <div class="col-md-5">\
                                <div class="form-group mb-4">\
                                <label for="medQty"> Medicine Quantity: </label>\
                                    <input class="form-control" type="number" name="medQty[]" id="medQty" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <div class="form-group mb-4">\
                                    <button type="button" class="remove-btn btn btn-danger mt-4 px-5">Remove</button>\
                                </div>\
                            </div>\
                        </div>\
                    </div>');
            });

        });
    </script>


<?php include("misc/footer.html") ?>



