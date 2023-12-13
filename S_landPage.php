<?php 
include 'misc/S_header.php'; 
$staff = new StaffView();

$staffInfo = $staff->displayClientID($_SESSION['clientID']);

$caseInfo = new AdminController();
$trigger = $caseInfo->action();

$button = $staff->displayButton($_SESSION['caseType']);
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
            <li class="breadcrumb-item active" aria-current="page">Generating Report</li>
            </ol>
        </nav>
    </div>
    <!-- Page Heading -->
    <div class="row text-center">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 text-center">
        
        <?php 
        if($button['caseType'] == '1') {
            echo '<form action="burial_generate_report.php" method="post">';
            echo '<input type="hidden" name="caseType" value="'.$_SESSION['caseType'].'">';
            echo '<input type="hidden" name="clientIDreport" value="'.$staffInfo['cCTR'].'">';
            echo '<input type="hidden" name="clientIDgeneratedReport" value="'.$staffInfo['clientCode'].'">';
            
            echo '<button type="submit" name="generate_pdf" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fa fa-file fa-sm text-white-50 mx-2"></i>Generate PDF File</button>';
            echo '</form>';
        } elseif ($button['caseType'] == '2') {
            echo '<form action="financial_generate_report.php" method="post">';
            echo '<input type="hidden" name="caseType" value="'.$_SESSION['caseType'].'">';
            echo '<input type="hidden" name="clientIDreport" value="'.$staffInfo['cCTR'].'">';
            echo '<input type="hidden" name="clientIDgeneratedReport" value="'.$staffInfo['clientCode'].'">';
            
            echo '<button type="submit" name="generate_pdf" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fa fa-file fa-sm text-white-50 mx-2"></i>Generate PDF File</button>';
            echo '</form>';
        } elseif($button['caseType'] == '3') {
            echo '<form action="medical_generate_report.php" method="post">';
            echo '<input type="hidden" name="caseType" value="'.$_SESSION['caseType'].'">'; 
            echo '<input type="hidden" name="clientIDreport" value="'.$staffInfo['cCTR'].'">';
            echo '<input type="hidden" name="clientIDgeneratedReport" value="'.$staffInfo['clientCode'].'">';
            
            echo '<button type="submit" name="generate_pdf" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-file fa-sm text-white-50 mx-2"></i>Generate PDF File</button>';
            echo '</form>';
        } elseif($button['caseType'] == '4') {
            echo '<form action="food_generate_report.php" method="post">';
            echo '<input type="hidden" name="caseType" value="'.$_SESSION['caseType'].'">';
            echo '<input type="hidden" name="clientIDreport" value="'.$staffInfo['cCTR'].'">';
            echo '<input type="hidden" name="clientIDgeneratedReport" value="'.$staffInfo['clientCode'].'">';
            
            echo '<button type="submit" name="generate_pdf" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-file fa-sm text-white-50 mx-2"></i>Generate PDF File</button>';
            echo '</form>';
        }
     ?>
    </div>
    


    <div class="col-xl-12 col-lg-6">
      <div class="card shadow mb-4">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">CLIENT'S INFORMATION</h6>
                
            </div>
            <!-- Card Header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-6 text-secondary">
                        <?php echo $staffInfo['lastName']; ?> <?php echo $staffInfo['firstName'];  ?> <?php echo $staffInfo['middleName'];  ?>
                    </div>
                </div>
                    <hr>
                    <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Gender:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['gender']; ?>
                    </div>
                <div class="divider d-none d-sm-block"></div>
                    <div class="col-sm-2">
                        <h6 class="mb-0">Age:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['age']; ?>
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Birthdate:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['birthDate']; ?>
                    </div>
                <div class="divider d-none d-sm-block"></div>
                    <div class="col-sm-2">
                        <h6 class="mb-0">Birthplace:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['age']; ?>
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Address:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $staffInfo['street']; ?>, <?php  echo $staffInfo['brgy']; ?>, <?php  echo $staffInfo['city']; ?>, <?php  echo $staffInfo['province']; ?>
                    </div>
                </div>
                    <hr>
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Contact Number:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['contactNum']; ?>
                    </div>

                    <div class="col-sm-2">
                        <h6 class="mb-0">Civil Status:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                        <?php echo $staffInfo['civilStatus']; ?>
                    </div>
                </div>
                <hr>
                
                <div class="row">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Occupation:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <?php echo $staffInfo['clientOccupation']; ?>
                    </div>
        
                    <div class="col-sm-2">
                        <h6 class="mb-0">Monthly Income:</h6>
                    </div>
                    <div class="col-sm-3 text-secondary">
                    <?php echo $staffInfo['monthlyIncome']; ?>
                    </div>
                </div>
                <hr> 
                <!-- <?php 
                if ($staffInfo['soloParent'] == "Yes" ) {
                            $soloparent = "  <i class='fa fa-check-circle' ></i>";
                } else {
                    $soloparent = " <i class='fa fa-times-circle'></i>";
                } 

                if ($staffInfo['senior'] == "Yes" ) {
                            $Senior = "  <i class='fa fa-check-circle' ></i>";
                } else {
                    $Senior = " <i class='fa fa-times-circle'></i>";
                }

                if ($staffInfo['pwd'] == "Yes" ) {
                            $pwd = "  <i class='fa fa-check-circle' ></i>";
                } else {
                    $pwd = " <i class='fa fa-times-circle'></i>";
                }

                if ($staffInfo['youth'] == "Yes" ) {
                            $youth = "  <i class='fa fa-check-circle' ></i>";
                } else {
                    $youth = " <i class='fa fa-times-circle'></i>";
                }

                if ($staffInfo['4pc'] == "Yes" ) {
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
                        <?php echo $staffInfo['numofChildren']; ?>
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
            <h6 class="ml-3 font-weight-bold text-primary">FAMILY COMPOSITION</h6>
            <div class="card-body mb-3">
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
                    <?php 
                                if ($familyInfo) {
                                    while ($test = mysqli_fetch_assoc($familyInfo)) {

                            ?>
                            <?php
                                if ($test['clientCode'] === $staffInfo['clientCode']) {
                            ?>
                            <tr>
                                <td><?php  echo $test['famName'];  ?></td>
                                <td><?php  echo $test['famAge'];  ?> </td>
                                <td><?php  echo $test['famCivilStatus'];  ?></td>
                                <td><?php  echo $test['famRelationship'];  ?></td>
                                <td><?php  echo $test['famEducational'];  ?></td>
                                <td><?php  echo $test['famOccupation'];  ?></td>
                                <td><?php  echo $test['famIncome'];  ?></td>
                                
                        </tr>

                        <?php
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>
      


<!-- Data table -->
<script>  
$('table').DataTable();  
</script>

<?php include("misc/footer.html") ?>
