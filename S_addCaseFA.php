<?php 
include 'misc/S_header.php'; 
$staff = new StaffView();

$staffInfo = $staff->displayClientID($_SESSION['clientID']);
$caseInfo = new StaffController();
$trigger = $caseInfo->staffAction();

$_SESSION['caseType'] = $_POST['caseType'];
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
            <li class="breadcrumb-item"><a href="S_caseStudy.php">Select Client</a></li>
            <li class="breadcrumb-item active" aria-current="page">Client Info</li>
            <li class="breadcrumb-item active" aria-current="page">Financial Assistance</li>
            </ol>
        </nav>
    </div>

    <div class="col-xl-12   ">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Add New Record</h6>
            </div>
            <h6 class="mx-3 mt-2 text-bold">II. Problem Presented</h6>
             <div class="card-body s">

            <form action="" method="post">
            
                <div class="form-group col-md-6">
                    <label for="fName">Client Code:</label>
                    <input class="form-control" type="hidden" name="getAssitantType" value="<?php echo $_SESSION['caseType']; ?>" readonly> 
                    <input class="form-control" type="text" name="clientCode" id="clientCode" value="<?php echo $staffInfo['clientCode']; ?>" readonly> 

                    <input class="form-control" type="hidden" name="cCTR" id="userCode" value="<?php echo $staffInfo['cCTR']; ?>" readonly> 
                                  
                    <input class="form-control" type="hidden" name="AmountofAssistance" value="0.00" readonly>
                    <input class="form-control" type="hidden" name="userCode" id="userCode" value="<?php echo $userdata['userCode']; ?>" readonly>
                    <input class="form-control" type="hidden" name="typeOfAssistance" id="typeofAssistance" value="Financial Case Study" readonly> 
                    
                    
                </div>    
                <div class="form-group col-md-6">
                    <label for="fName">Full Name of Client:</label>
                <input class="form-control" type="text" name="clientFullName" value="<?php echo $staffInfo['firstName']; ?> <?php echo $staffInfo['middleName']; ?> <?php echo $staffInfo['lastName']; ?>" readonly> 
                </div>  
                <div class="form-group col-md-6">
                    <label for="fName">Unsettled Amount:</label>
                <input class="form-control" type="number" name="unsettledAmount" placeholder="0.00" required> 
                </div>

                <div class="form-group col-md-6">
                    <label for="fName">Name of the Patient:</label>
                    <input class="form-control" type="text" name="problemPresented1" placeholder="Enter Name of Patient" required> 
                </div>

                <div class="form-group col-md-6">
                    <!-- <label for="mName">Anong klaseng Assistant (financial/medical)?:</label> -->                    
                    <input class="form-control" type="hidden" name="problemPresented2"  value="Financial Assistance" required> 
                </div>

          <!-- <div class="form-group col-md-6">
            <label for="inputState"> Anong klaseng Assistance (financial/medical)?: </label>
            <select id="inputState" class="form-control" name="problemPresented2">
              <option disabled selected> --Select-- </option>
              <option value="financial"> financial </option>
              <option value="medical"> medical </option>
            </select>
          </div> -->

                <div class="form-group col-md-6">
                    <label for="lName">From which office/political figure are you asking assistance from:</label>
                    <input class="form-control" type="text" name="problemPresented3" placeholder="Enter name of Office/Political Figure" required> 
                </div>
            
                <div class="form-group col-md-6">
                    <label for="fName">Relationship to the client/patient:</label>
                    <input class="form-control" type="text" name="problemPresented4" placeholder="Enter relationship" required> 
                </div>
                <div class="form-group col-md-6">
                    <label for="mName">Based on the medical certificate, enter the condition of the client:</label>
                    <input class="form-control" type="text" name="problemPresented5"  placeholder="Enter condition of the patient" required> 
                </div>
                <div class="form-group col-md-6">
                    <label for="lName">Purpose of the assistance:</label>
                    <input class="form-control" type="text" name="problemPresented6" placeholder="Enter purpose of the assistance" required> 
                </div>

                    <input class="form-control" type="hidden" name="nameofStaff" value="<?php echo $userdata['userFirst'] ?> <?php echo $userdata['userMid'] ?> <?php echo $userdata['userLast'] ?>" readonly>                                         
                    <input class="form-control" type="hidden" name="staffPosition" value="<?php echo $userdata['staffPosition'] ?>" readonly>                 
                <hr> 

        <h6 class="mx-3 mt-4 text-bold">III. Family Background(Patient)</h6>
        <div class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mx-3" data-toggle="modal" data-target="#exampleModal2">
                Married
            </button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mx-3" data-toggle="modal" data-target="#exampleModal">
                Seperated
            </button>  
        
            <div class="card-body "> 

                <textarea name="familybackground" placeholder="Paste Here" id="" cols="90" rows="10" required></textarea>
            </div>
        </div>
        <div class="card-body text-center">
                  <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mx-3" data-toggle="modal" data-target="#exampleModal3">
                Recommendation Template
            </button>  
            <h6 class="m-0 font-weight-bold text-primary mt-3">Recommendation:</h6>
            <textarea name="recommendation" id="" cols="90" rows="10" placeholder="Paste Here" required></textarea>
        </div>

        <div class="form-group mb-4 text-center">
            <button type="submit" class="btn btn-primary mx-4 px-5" name="insertCaseFA">Submit</button>
        </div>
        </form>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seperated</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      (Copy/Edit)
        <?php $value = '(NAME) is a (native/bonafide) resident of Obando, Bulacan. He/She is living (with family or alone) for almost (year) years. They live in (THEIR OWN HOUSE MADE OF WOODEN OR CONCRETE MATERIALS). They fully depend on the income of their (FAMILY MEMBER) however, the income of the family is too minimal to support their basic needs and the financial expenses of the client. Thus, they sought MSWDO for proper intervention.' ?>
        <textarea name="recommendation" id="" cols="60" rows="10" required><?= $value ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Married</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        (Copy/Edit)
        <?php $value = '(NAME) is a (native/bonafide) resident of Obando, Bulacan. He/She is living with her common law (husband/wife) for almost (year) years and blessed to have (number of children) children. They live in (THEIR OWN HOUSE MADE OF WOODEN OR CONCRETE MATERIALS). They fully depend on the income of their (FAMILY MEMBER) however, the income of the family is too minimal to support their basic needs and the financial expenses of the client. Thus, they sought MSWDO for proper intervention.' ?>
        <textarea name="recommendation" id="" cols="60" rows="10" required><?= $value ?></textarea>
      </div>
      <div class="modal-footer">
        

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

   
<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recommendation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      (Copy/Edit)
        <?php $value = 'In view of the forgoing information, the undersigned worker respectfully recommends (NAME OF CLIENT) to avail financial assistance from your good office (OFFICE NAME/POLITICAL FIGURE) due to their indigent condition, (he/she) is found eligible in the said services' ?>
        <textarea name="recommendation" id="" cols="60" rows="10" required><?= $value ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Data table -->
<script>  
$('table').DataTable();  
</script>

<?php include("misc/footer.html") ?>
