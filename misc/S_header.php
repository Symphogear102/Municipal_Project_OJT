<?php
//start session
session_start();

$editId = $_SESSION['user'];
$_SESSION['editId'] = $_SESSION['user'];




if(isset($_GET['clientID']) && !empty($_GET['clientID'])) {
    $clientID = $_GET['clientID'];
    $_SESSION['clientID'] = $clientID;
  }

include 'include/DbConnection.class.php';
include 'include/autoUser.inc.php';

if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    echo "<script> window.location.href='Index.php';</script>";
}

if (isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    if($_SESSION['userTypeCode'] == 2) {
        echo "<script> window.location.href='A_Index.php';</script>";
        $_SESSION['userTypeCode'] = 2;
    }
}

if (isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    if($_SESSION['userTypeCode'] == 3) {
        echo "<script> window.location.href='A_Index.php';</script>";
        $_SESSION['userTypeCode'] = 3;
    }
}

$client = new ClientView();
$data = $client->displayClientInfo();
$staff = $client->displayAllUserInfo();

$user = new UsersView();
$userdata = $user->displayUser();


$form = new StaffController();
$forming = $form->staffAction();

$family = new StaffView();
$familyInfo = $family->displayFamilyInfo();


$countrow = $user->countRow();
$countClientRow = $user->countClientRow();
$countMedicalRow = $user->countMedicalRow();
$countBurialRow = $user->countBurialRow();
$countFinancialRow = $user->countFinancialRow();
$countFoodRow = $user->countFoodRow();


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
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    
 <style>
    html {
        scroll-behavior: smooth;
        }
 </style>
<script src="DataTables/datatables.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="S_Index.php">
                <div class="sidebar-brand-icon ">
                    <img src="img/logo2.png" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">MSWDO<sup>Obando</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="S_Index.php">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users"></i>
                    <span>Client Management</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">CLIENT</h6>
                        <a class="collapse-item" href="S_addClient.php">Add Client</a>
                        <a class="collapse-item" href="S_famComposition.php">Add Family Compositions</a>
                        <a class="collapse-item" href="S_clientManage.php">Update Client Information</a>
                        <a class="collapse-item" href="S_clientHistory.php">View Client History</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-users"></i>
                    <span>Client Assistance</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">CLIENT</h6>
                        <a class="collapse-item" href="S_burialAssistance.php">Add Client</a>
                        <a class="collapse-item" href="S_financialAssistance.php">Add Family Compositions</a>
                        <a class="collapse-item" href="S_clientManage.php">Update Client Information</a>
                        <a class="collapse-item" href="S_clientHistory.php">View Client History</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="S_burialAssistance.php">
                    <i class="fa fa-address-card"></i>
                    <span>Burial Assistance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="S_financialAssistance.php">
                    <i class="fa fa-credit-card"></i>
                    <span>Financial Assistance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="S_medicalAssistance.php">
                    <i class="fa fa-medkit"></i>
                    <span>Medicine Assistance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="S_foodAssistance.php">
                    <i class="las la-utensils" aria-hidden="true"></i>
                    <span>Food Assistance</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="S_caseStudy.php">
                    <i class="fa fa-file-pdf"></i>
                    <span>Social Case Study</span></a>
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
                                <a class="dropdown-item" href="S_Profile.php?editId=<?php echo $userdata['userCode'] ?>" name="id">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
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