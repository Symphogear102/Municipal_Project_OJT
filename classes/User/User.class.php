<?php

class User extends DbConnection {

    public function __construct(){

        parent::__construct();
    }
    
    //Checking login in user
    public function check_login($userName, $userPass){
            $sql = "SELECT * FROM usertb WHERE userName = '$userName' AND userPass = '$userPass'";
            $query = $this->connect()->query($sql);

            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                $_SESSION['user'] = $row['userCode'];
                $_SESSION['userTypeCode'] = $row['userTypeCode'];
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['mode'] = $row['mode'];
            } else {
                return false;
        }
    }

    public function getDetails($sql){

        $query = $this->connect()->query($sql);
        
        $row = $query->fetch_array();
            
        return $row;       
    }

    protected function setInfo($sql) {
        $query = $this->connect()->query($sql);
        return $query;
    }


    public function validateIfString($value)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $value)) {
            $_SESSION['title'] = 'Oops, There is something Wrong!!!';
            $_SESSION['message'] = 'This field ' . $value . ' must be all letters!';
            $_SESSION['msg'] = 'error';
            return $_SESSION['message'];
        }
    }

    public function validateIfNumber($value)
    {
        if (!preg_match("/^[0-9]*$/", $value)) {
            $_SESSION['title'] = 'Oops, There is something Wrong!!!';
            $_SESSION['message'] = 'Contact Number must be a numbers!';
            $_SESSION['msg'] = 'error';
            return $_SESSION['message'];
        }
    }

    public function validateIfFloat($value)
    {
        if (!preg_match("/(^\d+\.\d+$|^\d+$)/", $value)) {
            $_SESSION['title'] = 'Oops, There is something Wrong!!!';
            $_SESSION['message'] = 'Monthly Income must be in Numbers only!';
            $_SESSION['msg'] = 'error';
            return $_SESSION['message'];
        }
    }
}