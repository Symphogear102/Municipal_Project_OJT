<?php 
include 'misc/S_header.php'; 
$staff = new StaffView();

$staffInfo = $staff->displayClientID($_SESSION['clientID']);
$form = new StaffController();
$forming = $form->staffAction();
  
if(isset($_POST['insertCase']))
{
    $caseStudy = $form->insertCaseStudy();
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
            <li class="breadcrumb-item"> <a href="S_famComposition.php"> Select Client </a> </li>
            <li class="breadcrumb-item active" aria-current="page">Case Study</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      
    </div>

    

    <div class="col-xl-12 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Family Composition</h6>
                <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
            </div>
            <div class="card-body  text-center">
            <form action="" method="post">
                <input class="form-control" type="hidden" name="clientCode[]" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 

                <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="fName">Client Code:</label>
                    <input class="form-control" type="text" name="clientCode" id="clientCode" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 
                </div>
                
                <div class="form-group col-md-4">
                    <label for="fName">Full Name of Client:</label>
                    <input class="form-control" type="text" name="clientFullName" id="clientFullName" value="<?php echo $staffInfo['firstName']; ?>, <?php echo $staffInfo['middleName']; ?>, <?php echo $staffInfo['lastName']; ?>" readonly> 
                </div>

                <div class="form-group col-md-2">
                    <label for="age"> Age: </label>
                    <input class="form-control" type="text" name="age" id="clientOccupation" value="<?php echo $staffInfo['age']; ?>" readonly> 
                </div>

                <div class="form-group col-md-2">
                    <label for="birthDate">Birthdate: </label>
                    <input class="form-control" type="date" name="birthDate" id="clientOccupation" value="<?php echo $staffInfo['birthDate']; ?>" readonly> 
                </div>

                <div class="form-group col-md-2">
                    <label for="civilStatus"> Civil Status: </label>
                    <input class="form-control" type="text" name="civilStatus" id="civilStatus" placeholder="Enter Client Occupation" value="<?php echo $staffInfo['civilStatus']; ?>" readonly> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="ContactNumber">Contact Number:</label>
                    <input class="form-control" type="text" name="contactNum" id="ContactNumber" placeholder="Enter Contact Number" value="<?php echo $staffInfo['contactNum']; ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="clientEducation">Educational Attainment:</label>
                    <input class="form-control" type="text" name="clientEducation" id="clientEducation" placeholder="Enter Educational Attainment" value="<?php echo $staffInfo['clientEducation']; ?>" readonly> 
                </div>

                <div class="form-group col-md-4">
                    <label for="clientOccupation">Client Occupation:</label>
                    <input class="form-control" type="text" name="clientOccupation" id="clientOccupation" placeholder="Enter Client Occupation" value="<?php echo $staffInfo['clientOccupation'];?>" readonly> 
                </div>
            </div>
            <hr>
                <div class="paste-new-forms">   
                </div>
          
                    
            
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-primary mx-4 px-5" name="insertCase">Submit</button>
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
                    '<div class="main-form mt-4  ">\
                        <div class="form-row">\
                            <div class="col-md-4">\
                                <div class="form-group mb-2">\
                                <label for="famName"> Full Name: </label>\
                                <input class="form-control" type="hidden" name="clientCode[]" value="<?php echo $staffInfo['clientCode']; ?>" required>\
                                    <input class="form-control" type="text" name="famName[]" id="famName" required>\
                                </div>\
                            </div>\
                            <div class="col-md-4">\
                                <div class="form-group mb-2">\
                                <label for="famAge"> Age: </label>\
                                    <input class="form-control" type="text" name="famAge[]" id="famAge" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-4">\
                                <div class="form-group mb-2">\
                                <label for="famCivilStatus"> Civil Status: </label>\
                                <select id="inputState" class="form-control" name="famCivilStatus[]">\
                                    <option disabled selected> --Select-- </option>\
                                    <option value="Single"> Single </option>\
                                    <option value="Married"> Married </option>\
                                    <option value="Widowed"> Widowed </option>\
                                    <option value="Separated"> Separated </option>\
                                </select>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="form-row">\
                            <div class="col-md-4">\
                                <div class="form-group mb-2">\
                                <label for="famRelationship"> Relationship: </label>\
                                    <input class="form-control" type="text" name="famRelationship[]" id="famRelationship" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-4">\
                                <div class="form-group mb-2">\
                                <label for="famEducational"> Educational Attainment: </label>\
                                    <input class="form-control" type="text" name="famEducational[]" id="famEducational" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <div class="form-group mb-2">\
                                <label for="famOccupation"> Occupation: </label>\
                                    <input class="form-control" type="text" name="famOccupation[]" id="famOccupation" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <div class="form-group mb-2">\
                                <label for="famIncome"> Income: </label>\
                                    <input class="form-control" type="number" name="famIncome[]" id="famIncome" value="" required>\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                            <div class="form-group mb-4">\
                                    <button type="button" class="remove-btn btn btn-danger mx-4 px-5 ">Remove</button>\
                                </div>\
                            </div>\
                        </div>\
                        <hr>\
                    </div>');
            });

        });
</script>


<!-- Data table -->
<script>  
$('table').DataTable();  
</script>


<?php include("misc/footer.html") ?>



