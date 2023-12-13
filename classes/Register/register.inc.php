<?php
include 'include/DbConnection.class.php';

  class Register extends DbConnection {

    public function addForm($post)
    {
        $userFirst = $this->escape_string($_POST['userFirst']);
        $userMid = $this->escape_string($_POST['userMid']);
        $userLast = $this->escape_string($_POST['userLast']);
        $userContact = $this->escape_string($_POST['userContact']);
        $userBirthDate = $this->escape_string($_POST['userBirthDate']);
        $userAge = $this->escape_string($_POST['userAge']);

        $userName = $this->escape_string($_POST['userName']);
        $userPass = $this->escape_string($_POST['userPass']);

        $userCheckPass = $this->escape_string($_POST['userCheckPass']);

        if ($userPass == $userCheckPass) {
            $query="INSERT INTO usertb(userLast, userFirst, userMid, userContact, userBirthDate, userAge, userName, userPass) 
        VALUES('$userLast','$userFirst', '$userMid', '$userContact', '$userBirthDate', '$userAge', '$userName', '$userPass')";
        $sql = $this->connection->query($query);
        
            if ($sql==true) {
            header("Location:login.php");
            }else{
            echo "Registration failed try again!";
            }

        } else {
            echo $_SESSION['message'] = "ang bobo mo";
        }
    }       

}


?>