<?php

class ShitController extends Shit {

    public function __construct(){

        parent::__construct();
    }

    
    public function action()
    {       
        if (isset($_POST['addUser'])) {
        $update = $this->addUserAcc();
        if ($update) {                
            // echo "<script> window.location.href='A_addUser.php';</script>";
            }
        }

        if (isset($_POST['A_addClient'])) {
            $update = $this->addClient();
            if ($update) {
                echo "<script> window.location.href='A_addClient.php';</script>";
            }
        }

        if (isset($_POST['add_Register'])) {
            $update = $this->addRegistration();
            if ($update) {
                echo "<script> window.location.href='registration.php';</script>";
            }
        }
    }

public function addUserAcc() {
        
        if ($_POST['userName']) {

            $userLast = $_POST['userLast'];
            $userFirst = $_POST['userFirst'];
            $userMid = $_POST['userMid'];
            $userContact = $_POST['userContact'];
            $userBirthDate = $_POST['userBirthDate'];
            $userAge = $_POST['userAge'];
            $userGender = $_POST['userGender'];
            $userTypeCode = $_POST['userTypeCode'];
            $staffPosition = $_POST['staffPosition'];
            $userName = $_POST['userName'];
            $userPass = $_POST['userPass'];

            $validateInput = True;
                
            }
            if ($userGender == "M") {
                $userImage = 'Male.svg';
            }

            if ($userGender == "F") {
                $userImage = 'Female.svg';
            }

            $validateNumber = $this->validateIfNumber($userContact, $userAge);
                if ($validateNumber) {
                    $validateInput = false;
                }

            $string = array($userFirst, $userMid, $userLast);
            foreach ($string as $value) {
                $validateString = $this->validateIfString($value);
                    if ($validateString) {
                        $validateInput = false;
                    }
                }

            if ($validateInput) {
            $addUser = $this->addUserProfile($userImage, $userLast, $userFirst, $userMid, $userContact, $userBirthDate, 
            $userAge, $userGender, $userTypeCode, $staffPosition, $userName, $userPass);

            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The '.$userLast .', '.$userFirst .' has been Successfully Registered!';
            $_SESSION['msg'] = 'success';
            } else {
                $_SESSION['title'] = 'Oops, There is something Wrong!!!';
                $_SESSION['message'] = 'Contact Number must consist of numbers!';
                $_SESSION['msg'] = 'error';
            }
        
    }

    public function addClient() {
        
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $suffix = $_POST['suffix'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $brgy = $_POST['brgy'];
        $street = $_POST['street'];
        $contactNum = $_POST['contactNum'];
        $birthDate = $_POST['birthDate'];
        $birthPlace = $_POST['birthPlace'];
        $civilStatus = $_POST['civilStatus'];
        $clientEducation = $_POST['clientEducation'];
        $clientOccupation = $_POST['clientOccupation'];
        $religion = $_POST['religion'];
        $monthlyIncome = $_POST['monthlyIncome'];
        $numofChildren = $_POST['numofChildren'];
        $soloParent = $_POST['soloParent'];
        $senior = $_POST['senior'];
        $pwd = $_POST['pwd'];
        $youth = $_POST['youth'];
        $fourpc = $_POST['4pc'];
        
        $barangayCode = array("001"=>"Binuangan", "002"=>"Catanghalan", "003"=>"Hulo", "004"=>"Lawa", "005"=>"Salambao", 
        "006"=>"Paco", "007"=>"Pag-Asa", "008"=>"Paliwas", "009"=>"Panghulo", "010"=>"San Pascual", "011"=>"Tawiran");

        // echo array_search($brgy ,$barangayCode);
        $clientCode = array_search($brgy ,$barangayCode);

        $default = "031414";    
        $validateInput = true;

        $validateNumber = $this->validateIfNumber($age);
            if ($validateNumber) {
                $validateInput = false;
            }

        $validateFloat = $this->validateIfFloat($monthlyIncome);
            if ($validateFloat) {
                $validateInput = false;
            }


        $string = array($lastName, $firstName, $middleName, $clientOccupation);
        foreach ($string as $value) {
            $validateString = $this->validateIfString($value);
            if ($validateString) {
                $validateInput = false;
            }
        }
        

        if ($validateInput) {
            $uniqueCode = $this->insertUniqueID($brgy);
            $clientID = $this->generateClientID($default, $clientCode, $brgy); 
            $loginAccount = $this->addClientProfile($clientID, $uniqueCode, $lastName, $firstName, $middleName, $age, $gender, $suffix, $province, $city, $brgy, $street, 
            $contactNum, $birthDate, $birthPlace, $civilStatus, $clientEducation, $clientOccupation, $religion, $monthlyIncome, $numofChildren, $soloParent, $senior, $pwd, $youth, $fourpc);
            
            if($loginAccount = true) {
                $_SESSION['title'] = 'Added Successfully!!!';
                $_SESSION['message'] = 'The Client '.$lastName.', '.$firstName.' has been Added to the Client Database!';
                $_SESSION['msg'] = 'success';
            } else {    
                $_SESSION['title'] = 'Oops, There is something Wrong!!!';
                $_SESSION['message'] = 'Error adding data to the Database!';
                $_SESSION['msg'] = 'error';
            }
        }
    }


    public function addRegistration() {
        
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $suffix = $_POST['suffix'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $brgy = $_POST['brgy'];
        $street = $_POST['street'];
        $contactNum = $_POST['contactNum'];
        $birthDate = $_POST['birthDate'];
        $birthPlace = $_POST['birthPlace'];
        $civilStatus = $_POST['civilStatus'];
        $clientEducation = $_POST['clientEducation'];
        $clientOccupation = $_POST['clientOccupation'];
        $religion = $_POST['religion'];
        $monthlyIncome = $_POST['monthlyIncome'];
        $numofChildren = $_POST['numofChildren'];
        $soloParent = $_POST['soloParent'];
        $senior = $_POST['senior'];
        $pwd = $_POST['pwd'];
        $youth = $_POST['youth'];
        $fourpc = $_POST['4pc'];
        $date = $_POST['date'];

        
        $barangayCode = array("001"=>"Binuangan", "002"=>"Catanghalan", "003"=>"Hulo", "004"=>"Lawa", "005"=>"Salambao", 
        "006"=>"Paco", "007"=>"Pag-Asa", "008"=>"Paliwas", "009"=>"Panghulo", "010"=>"San Pascual", "011"=>"Tawiran");

        // echo array_search($brgy ,$barangayCode);
        $clientCode = array_search($brgy ,$barangayCode);

        $default = "031414";    
        $validateInput = true;

        $validateNumber = $this->validateIfNumber($age);
            if ($validateNumber) {
                $validateInput = false;
            }

        $validateFloat = $this->validateIfFloat($monthlyIncome);
            if ($validateFloat) {
                $validateInput = false;
            }


        $string = array($lastName, $firstName, $middleName, $clientOccupation);
        foreach ($string as $value) {
            $validateString = $this->validateIfString($value);
            if ($validateString) {
                $validateInput = false;
            }
        }
        

        if ($validateInput) {
            $uniqueCode = $this->insertUniqueID($brgy);
            $clientID = $this->generateClientID($default, $clientCode, $brgy); 
            $loginAccount = $this->addRegistrationPast($clientID, $uniqueCode, $lastName, $firstName, $middleName, $age, $gender, $suffix, $province, $city, $brgy, $street, 
            $contactNum, $birthDate, $birthPlace, $civilStatus, $clientEducation, $clientOccupation, $religion, $monthlyIncome, $numofChildren, $soloParent, $senior, $pwd, $youth, $fourpc, $date);
            
            if($loginAccount = true) {
                $_SESSION['title'] = 'Added Successfully!!!';
                $_SESSION['message'] = 'The Client '.$lastName.', '.$firstName.' has been Added to the Client Database!';
                $_SESSION['msg'] = 'success';
            } else {    
                $_SESSION['title'] = 'Oops, There is something Wrong!!!';
                $_SESSION['message'] = 'Error adding data to the Database!';
                $_SESSION['msg'] = 'error';
            }
        }
    }

}

?>