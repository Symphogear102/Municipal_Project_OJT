<?php

class Admin extends User {

    public function __construct(){

        parent::__construct();
    }
    
    //Checking login in user
    public function addUserRegister($userLast, $userFirst, $userMid, $userContact, $userBirthDate, $userAge, $userName, $userPass)
    {
       $sql = "INSERT INTO usertb (userLast, userFirst, userMid, userContact, userBirthDate, userAge, userName, userPass) 
       VALUES ('$userLast', '$userFirst', '$userMid', '$userContact', '$userBirthDate', '$userAge', '$userName', '$userPass')";

        $query = $this->setInfo($sql);
        if($query) {
            header('location:Index.php');
            return $query;
        }
    }

    public function updateUserProfile($id, $userFirst, $userMid, $userLast, $userName, $userBirthDate, $userContact) {
        $sql = "UPDATE usertb SET userFirst = '$userFirst', userMid = '$userMid', userLast = '$userLast', userName = '$userName', userBirthDate = '$userBirthDate', userContact = '$userContact' WHERE userCode = '$id'";
        
        $query = $this->setInfo($sql);
        if($query == true) {
            header("Location:A_Profile.php");
            return $query;    
        } else {
            echo "Something Wrong";
        }
    }

    
    public function changeServerStatus($mode) {
        $sql = "UPDATE usertb SET mode = '$mode' WHERE userTypeCode = '1' OR userTypeCode = '2'";
        
        $query = $this->setInfo($sql);
        if($query == true) {
            echo "<script> window.location.href='A_Index.php';</script>";
            return $query;    
        } else {
            echo "Something went wrong";
        }
    }

    public function updateUser_S_Profile($id, $userFirst, $userMid, $userLast, $userName, $userBirthDate, $userContact) {
        $sql = "UPDATE usertb SET userFirst = '$userFirst', userMid = '$userMid', userLast = '$userLast', userName = '$userName', userBirthDate = '$userBirthDate', userContact = '$userContact' WHERE userCode = '$id'";
        
        $query = $this->setInfo($sql);
        if($query == true) {
            echo "<script> window.location.href='S_Profile.php';</script>";
            return $query;    
        } else {
            echo "Something Wrong";
        }
    }

    

    public function addUserProfile($userImage, $userLast, $userFirst, $userMid, $userContact, $userBirthDate, 
    $userAge, $userGender, $userTypeCode, $userName, $userPass)
    {
       $sql = "INSERT INTO usertb (userImage, userLast, userFirst, userMid, userContact, userBirthDate, userAge, userGender, userTypeCode, userName, userPass) 
       VALUES ('$userImage','$userLast', '$userFirst', '$userMid', '$userContact', '$userBirthDate', '$userAge', '$userGender', '$userTypeCode', '$userName', '$userPass')";

        $query = $this->setInfo($sql);
        return $query;
    
    }

    public function generateClientID($default, $clientCode, $brgy)
	{
		$sql = "SELECT * FROM clienttb WHERE brgy = '$brgy' ORDER BY codeClientUnique DESC LIMIT 1";
		$row = $this->getDetails($sql);

		if ($row > 0) {
            $clientID = $row['codeClientUnique'];
			$getString = $clientID + 1;
            $Add = str_pad($getString, 4, 0, STR_PAD_LEFT);
			$newclientID = $default.'-'.$clientCode.'-'.$Add;

		} else {
			$newclientID = "031414-$clientCode-0001";
		}
		return $newclientID;
	}

    public function insertUniqueID($brgy) {
        $sql = "SELECT * FROM clienttb WHERE brgy = '$brgy' ORDER BY codeClientUnique DESC LIMIT 1";
		$row = $this->getDetails($sql);

		if ($row > 0) {
            $clientID = $row['codeClientUnique'];
			$string = $clientID + 1;
            $uniqueClientCode = str_pad($string, 4, 0, STR_PAD_LEFT);
			$newclientID = $uniqueClientCode;

        } else {
            $newclientID = "0001";
        }
        return $newclientID;
    }

    public function addClientProfile($clientID, $uniqueCode, $lastName, $firstName, $middleName, $age, $gender, $suffix, $province, $city, $brgy, $street, 
    $contactNum, $birthDate, $birthPlace, $civilStatus, $clientEducation, $clientOccupation, $religion, $monthlyIncome, $numofChildren, $soloParent, $senior, $pwd, $youth, $fourpc)
	{
        $sql = "INSERT INTO clienttb (clientCode, codeClientUnique, lastName, firstName, middleName, age, gender, suffix, province, city, brgy, street, 
        contactNum, birthDate, birthPlace, civilStatus, clientEducation, clientOccupation, religion, monthlyIncome, numofChildren, soloParent, senior, pwd, youth, 4pc) 
        VALUES ('$clientID', '$uniqueCode', '$lastName', '$firstName', '$middleName', '$age', '$gender', '$suffix', '$province', '$city', '$brgy', '$street',
        '$contactNum', '$birthDate', '$birthPlace', '$civilStatus', '$clientEducation', '$clientOccupation', '$religion', '$monthlyIncome', '$numofChildren', '$soloParent', '$senior', '$pwd', '$youth', '$fourpc')";

		$query = $this->setInfo($sql);
		if ($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Client has been Successfully Added into the Database!';
            $_SESSION['msg'] = 'success';   
         
			return $query;
		} else {
			$_SESSION['message'] = "Oops! Something went wrong!";
            $_SESSION['msg'] = 'danger';
            exit(0);
		}
	}
    

    public function updateStaffProfile($id, $userTypeCode) {
        $sql = "UPDATE usertb SET userTypeCode = '$userTypeCode' WHERE userCode = '$id'";
        
        $query = $this->setInfo($sql);
        if($query == true) {
            header("Location:A_userManage.php");
            exit(0);
            return $query;    
        } else {
            echo "Something Wrong";
        }
    }


    public function uploadUserImage($id, $image_name, $image_size, $error, $folder, $path, $path_location, $path_extension)
    {
        
        $sql = "UPDATE usertb SET userImage = '$image_name' WHERE userCode = '$id'";

        $query = $this->setInfo($sql);
        if($query) {
            $_SESSION['title'] = 'Updated Successfully!!!';
            $_SESSION['message'] = 'Your Profile has been Successfully Change!';
            $_SESSION['msg'] = 'success';
            return $_SESSION['message'];
            return $query;
        } else {
            $_SESSION['title'] = 'Oops, There is something Wrong!!!';
            $_SESSION['message'] = 'You should only used the Proper Format!';
            $_SESSION['msg'] = 'error';
            return $_SESSION['message'];
            }
        }


        public function softDeleteUser($id, $userTypeCode) {
            $sql = "UPDATE usertb SET userTypeCode = '$userTypeCode' WHERE userCode = '$id'";
            $query = $this->setInfo($sql);
            
            if($query) {
                
                header("Location:A_userManage.php");
                exit(0);
                return $query;
            }
        }

        public function softDeleteClient($clientid, $clientDelete) {
            $sql = "UPDATE clienttb SET clientDelete = '$clientDelete' WHERE cCTR = '$clientid'";
            $query = $this->setInfo($sql);
            
            if($query) {
                // $_SESSION['title'] = 'Deleted Successfully !!!';
                // $_SESSION['message'] = 'The Client has been Succesfully Removed!';
                // $_SESSION['msg'] = 'info';
                // return $_SESSION['message'];
                echo "<script> window.location.href='A_clientManage.php';</script>";
            
            } else {
                $_SESSION['title'] = 'Oops!!!!';
                $_SESSION['message'] = 'There is Something Wrong';
                $_SESSION['msg'] = 'Danger';
                return $_SESSION['message'];
                echo "<script> window.location.href='A_clientManage.php';</script>";
            }   
        }

        public function sample($userCode)
		{
            $query = "SELECT usertb.userCode, usertb.userTypeCode, activitylog.*
			FROM usertb INNER JOIN activitylog WHERE usertb.userCode = $userCode AND activitylog.userCode = '$userCode'";
            $row = $this->setInfo($query);
			return $row;
		}


        public function sampleClient($clientCode)
		{
            $query = "SELECT * FROM clienttb INNER JOIN activitylog WHERE clienttb.cCTR = $clientCode AND activitylog.cCTR = '$clientCode'";
            $row = $this->setInfo($query);
			return $row;
		}
        
        public function insertBurialCaseeeeee($client, $caseBurialStudy, $family, $recommend)
        {
        $sql = "INSERT INTO caseinfo_tb (clientCode, problemPresented, familyBackground, recommendation, caseType)
        VALUES ('$client', '$caseBurialStudy', '$family', '$recommend', '1')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        echo "<script> window.location.href='S_landPage.php';</script>";
        return $query;
        }

        public function recordActLogBurialCase($clientCode, $typeOfAssistance, $receiveAssistance, $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR)
        {
            $sql = "INSERT INTO activitylog (clientCode, typeOfAssistance, receiveAssistance, Amount, nameofStaff, staffPosition, userCode, cCTR)
            VALUES ('$clientCode', '$typeOfAssistance', '$receiveAssistance', '$AmountofAssistance', '$nameofStaff', '$staffPosition', '$userCode', '$cCTR')";
            $query = $this->setInfo($sql);
            
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            return $query;
        }

        public function addClientCase($clientFullName, $unsettledAmount, $clientCode, $userCode)
        {
       $sql = "INSERT INTO fa_tb (claimant, unsettledAmount, clientCode, userCode) 
       VALUES 
       ('$clientFullName', '$unsettledAmount', '$clientCode', '$userCode')";

            $query = $this->setInfo($sql);
            if($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            echo "<script> window.location.href='S_addFinancial.php';</script>";
            exit(0);
            return $query;
            }
        }

    }