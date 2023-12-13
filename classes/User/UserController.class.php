<?php

class UserController extends User {
    
    //Checking login in user
    public function login(){

        if (isset($_POST['login'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($_POST['userName']) {
                    $userName = $_POST['userName'];
                    $userPass = $_POST['userPass'];
                }

                $auth = $this->check_login($userName, $userPass);
                
                if (!$auth) {
                    echo "<script> window.location.href='Index.php';</script>";
                } else {
                    if ($userName == "" || $userPass == "") {
                        echo "<script> window.location.href='Index.php';</script>";
                    } else {
                        $_SESSION['userTypeCode'] = $auth['userTypeCode'];
                        $_SESSION['userCode'] = $auth['userCode'];
                        $_SESSION['userName'] = $auth['userName'];
                        $_SESSION['userPass'] = $auth['userPass'];
                        $_SESSION['user'] = $auth['user'];
                        $_SESSION['mode'] = $auth['mode'];
                       
                        $this->userTypeCode();
                    }
                }
            }
        }
    }

    public function userTypeCode() {
        if(isset($_SESSION['userID']) || isset($_SESSION['user'])){
            
            if($_SESSION['userTypeCode'] == '1')    {
            $_SESSION['title'] = 'Hello Staff!!!';
            $_SESSION['message'] = 'Your account has been Successfully Login!!';
            $_SESSION['msg'] = 'success';

            if($_SESSION['mode'] == "Active") {
                echo "<script> window.location.href='S_Index.php';</script>";
            }            
            else if($_SESSION['mode'] == "Inactive") {
                echo "<script> window.location.href='404_error_found.php';</script>";
            }
        }

            if($_SESSION['userTypeCode'] == '2') {
            $_SESSION['title'] = 'Hello Admin!!!';
            $_SESSION['message'] = 'Your account has been Successfully Login!!';
            $_SESSION['msg'] = 'success';

            if($_SESSION['mode'] == "Active") {
                echo "<script> window.location.href='A_Index.php';</script>";
            }
            else if($_SESSION['mode'] == "Inactive") {
                echo "<script> window.location.href='404_error_found.php';</script>";
            }
        }
        
            if($_SESSION['userTypeCode'] == '3') {
            $_SESSION['title'] = 'Hello Super Admin!!!';
            $_SESSION['message'] = 'Your account has been Successfully Login!!';
            $_SESSION['msg'] = 'success';

            if($_SESSION['mode'] == "Active") {
                echo "<script> window.location.href='A_Index.php';</script>";
            }
            else if($_SESSION['mode'] == "Inactive") {
                echo "<script> window.location.href='404_error_found.php';</script>";
            }
        }

        else {
            echo "Not Logged In!";
        };
    }
}
}
?>