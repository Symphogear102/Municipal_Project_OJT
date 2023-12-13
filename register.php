<?php
session_start();
include 'include/DbConnection.class.php';
  include 'include/autoUser.inc.php';

$action = new AdminController();
$formAction = $action->action();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Municipal - Register</title>
    <link rel="icon"  href="img/logo.png"/>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg-7 my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                    
                        <div class="p-5">
                            <div class="text-center">
                                <div class="p-2">
                                    <img src="img/logo.png" height="150">
                                </div>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            
                            <form action=" " method="post" class="user">
                                <div class="form-group row">

                                    <div class="col-sm-4 mb-2 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="userFirst">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="exampleMiddleName"
                                            placeholder="Middle Name" name="userMid">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="userLast">
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Birth Date" name="userBirthDate">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleContactNumber" placeholder="ContactNumber" name="userContact">
                                    </div>
                                   
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleAge" placeholder="Age" name="userAge">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Username" name="userName">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Password" name="userPass">
                                    </div>
                                        
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Check Password" name="userCheckPass">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-dark btn-user btn-block" name="register">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>