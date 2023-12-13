<?php
include 'include/DbConnection.class.php';
include 'include/autoUser.inc.php';

$addClient = new ShitController();
$show = $addClient->action();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSWDO - Obando</title>

    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"> </script>  
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>  
    <!-- Piechart -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    
 
<script src="DataTables/datatables.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="A_Index.php">
                <div class="sidebar-brand-icon ">
                    <img src="img/logo2.png" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">MSWDO<sup>Obando</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="A_Index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-plus"></i>
                    <span>Add Users</span>
                </a>
                <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Add User Functions</h6>
                        <a class="collapse-item" href="A_addUser.php">Add Staff</a>
                        <a class="collapse-item" href="A_addClient.php">Add Client</a>
                    </div>
                </div>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Management Functions</h6>
                        <a class="collapse-item" href="A_userManage.php">Staff Management</a>
                        <a class="collapse-item" href="A_clientManage.php">Client Management</a>
                    </div>
                </div>
                
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-bars"></i>
                    <span>View Records</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Record Viewing</h6>
                        <a class="collapse-item" href="A_staffHistory.php">Staff History</a>
                        <a class="collapse-item" href="A_clientHistory.php">Client History</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userdata['userFirst'] ?> <?php echo $userdata['userLast'] ?></span>
                                <img src="img/<?php echo $userdata['userImage']; ?>" alt="Admin" class="rounded-circle" width="30px" height="30px">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="A_Profile.php?editId=<?php echo $userdata['userCode'] ?>" name="id">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profiles
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


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


  <div class="col-xl-12 col-lg-6">    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="A_Index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Client</li>
      </ol>
    </nav>
  </div> 


<div class="col-xl-12">
  <div class="card shadow mb-4">
    <div class="card-body ">
      <div class="text-xl font-weight-bold text-primary text-uppercase text-center mb-1"> 
        <h5 class="font-weight-bold" >add new Client</h5> 
      </div>
      <hr>
     <h6 class="text text-uppercase py-2"> Personal Information: </h6>
      <form action="" method="POST">   

      <div class="form-row">
          <div class="form-group col-md-3">
            <label for="fName">First Name:</label>
            <input class="form-control" type="text" name="firstName" id="fName" placeholder="Enter First Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="mName">Middle Name:</label>
            <input class="form-control" type="text" name="middleName" id="mName" placeholder="Enter Middle  Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="lName">Last Name:</label>
            <input class="form-control" type="text" name="lastName" id="lName" placeholder="Enter Last Name" required> 
          </div>
          <div class="form-group col-md-3">
            <label for="Suffix">Suffix:</label>
            <input class="form-control" type="text" name="suffix" id="Suffix" placeholder="Enter Suffix">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="Age">BirthDate:</label>
            <input class="form-control" type="date" name="birthDate" id="Age" placeholder="Enter Age" required>
          </div>
          <div class="form-group col-md-4">
            <label for="Age">Age:</label>
            <input class="form-control" type="text" name="age" id="Age" placeholder="Enter Age" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"> Gender: </label>
            <select id="inputState" class="form-control" name="gender">
              <option disabled selected> --Select-- </option>
              <option value="M"> Male </option>
              <option value="F"> Female </option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="birthPlace">Birthplace:</label>
            <input class="form-control" type="text" name="birthPlace" id="birthPlace" 
            placeholder="Enter Birthplace" required>
          </div>
          <div class="form-group col-md-4">
            <label for="ContactNumber">Contact Number:</label>
            <input class="form-control" type="text" name="contactNum" id="ContactNumber" 
            placeholder="Enter Contact Number" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputState"> Civil Status: </label>
            <select id="inputState" class="form-control" name="civilStatus">
            <option disabled selected> --Select-- </option>
              <option value="Single"> Single </option>
              <option value="Married"> Married </option>
              <option value="Widowed"> Widowed </option>
              <option value="Separated"> Separated </option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="Date">Date:</label>
            <input class="form-control" type="date" name="date" id="date" placeholder="" required>
          </div>
        </div>

      <hr>
        <h6 class="text text-uppercase py-2"> Address: </h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="Street">Street:</label>
            <input class="form-control" type="text" name="street" id="Username" placeholder="Enter Street" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState"> Barangay: </label>
            <select id="inputState" class="form-control"  name="brgy">
            <option disabled selected> --Select-- </option>
              <option value="Binuangan">Binuangan</option>
              <option value="Catanghalan">Catanghalan</option>
              <option value="Hulo">Hulo</option>
              <option value="Lawa">Lawa</option>
              <option value="Salambao">Salambao</option>
              <option value="Paco">Paco</option>
              <option value="Pag-Asa">Pag-Asa</option>
              <option value="Paliwas">Paliwas</option>
              <option value="Panghulo">Panghulo</option>
              <option value="San Pascual">San Pascual</option>
              <option value="Tawiran">Tawiran</option>
        
            </select>
          </div>
          
          <div class="form-group col-md-3">
            <label for="City">City</label>
            <input class="form-control" type="text" name="city" id="password" placeholder="Enter City" required>
          </div>

          <div class="form-group col-md-3">
            <label for="Province">Province:</label>
            <input class="form-control" type="text" name="province" id="Username" placeholder="Enter Province" required>
          </div>

        </div>

      <hr>
        <h6 class="text text-uppercase py-2"> Additional Information: </h6>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="MonthlyIncome">Monthly Income:</label>
            <input class="form-control" type="text" name="monthlyIncome" id="monthlyIncome" 
            placeholder="0.00" required>
          </div>

          <div class="form-group col-md-3">
            <label for="Educational Attainment">Educational Attainment:</label>
            <input class="form-control" type="text" name="clientEducation" id="clientEducation" 
            placeholder="Educational Attainment" required>
          </div>

          <div class="form-group col-md-3">
            <label for="MonthlyIncome">Occupation:</label>
            <input class="form-control" type="text" name="clientOccupation" id="clientOccupation" 
            placeholder="Occupation" required>
          </div>

          <div class="form-group col-md-3">
            <label for="religion">Religion:</label>
            <input class="form-control" type="text" name="religion" id="religion" 
            placeholder="Enter Religion" required>
          </div>
         
          <div class="form-group col-md-2">
            <label for="inputState"> No. of Children: </label>
            <select id="inputState" class="form-control" name="numofChildren">
              <option disabled selected> --Select-- </option>
              <option value="0"> 0 </option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3 </option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
              <option value="6"> 6 </option>
              <option value="7"> 7 </option>
              <option value="8"> 8 </option>
              <option value="9"> 9 </option>
              <option value="10"> 10 </option>
              <option value="11"> 11 </option>
              <option value="12"> 12 </option>
              <option value="13"> 13 </option>
              <option value="14"> 14 </option>
              <option value="15"> 15 </option>
              <option value="16"> 16 </option>
              <option value="17"> 17 </option>
              <option value="18"> 18 </option>
              <option value="19"> 19 </option>
              <option value="20"> 20 </option>
            </select>
          </div>

          <div class="form-group col-md-2">
            <label for="inputState"> Solo Parent: </label>
            <select id="inputState" class="form-control" name="soloParent">
            <option disabled selected> --Select-- </option>
              <option value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>            
    
          <div class="form-group col-md-2">
            <label for="inputState"> Senior: </label>
            <select id="inputState" class="form-control" name="senior">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> PWD: </label>
            <select id="inputState" class="form-control" name="pwd">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> Youth: </label>
            <select id="inputState" class="form-control" name="youth">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputState"> 4P's: </label>
            <select id="inputState" class="form-control" name="4pc">
            <option disabled selected> --Select-- </option>
              <option selected value="Yes"> Yes </option>
              <option value="No"> No </option>
            </select>
          </div>
        </div>
        
      <hr>
      <div class="d-flex justify-content-center">
        <button type="submit" name="add_Register" class="btn btn-outline-primary  btn-lg align-center px-5 "> <i class="fa fa-user-plus" aria-hidden="true"> Add Users </i> </button>
      </div>
      </form>
    </div>
  </div>
</div>

  <?php include("misc/footer.html") ?>

