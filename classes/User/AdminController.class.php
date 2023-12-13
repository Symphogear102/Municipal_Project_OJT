<?php

class AdminController extends Admin {

    public function __construct(){

        parent::__construct();
    }
    
    public function action()
    {
        if (isset($_POST['register'])) {
            $register = $this->addRegister();
            if ($register) {
                echo "<script> window.location.href='Index.php';</script>";
                exit(0);
            }
        }

        if (isset($_POST['update'])) {
            $update = $this->updateProfile();
            if ($update) {
                echo "<script> window.location.href='A_Profile.php';</script>";
                exit(0);
            }
        }

        if (isset($_POST['maintenance'])) {
            $update = $this->changeServer();
            if ($update) {
                echo "<script> window.location.href='A_Index.php';</script>";
                exit(0);
            }
        }
        
        if (isset($_POST['update_S'])) {
            $update = $this->update_S_Profile();
            if ($update) {
                echo "<script> window.location.href='S_Profile.php';</script>";
                exit(0);
            }
        }

        // if (isset($_POST['addUser'])) {
        //     $update = $this->addUserAcc();
        //     if ($update) {                
        //         $_SESSION['title'] = 'Data Entry Added!';
        //         $_SESSION['message'] = 'The Data has been Successfully Added!!';
        //         $_SESSION['msg'] = 'success';
        //         echo "<script> window.location.href='A_addUser.php';</script>";
        //     }
        // }

        // if (isset($_POST['A_addClient'])) {
        //     $update = $this->addClient();
        //     if ($update) {
        //         echo "<script> window.location.href='A_addClient.php';</script>";
        //     }
        // }

        if (isset($_POST['S_addClient'])) {
            $update = $this->addClient();
            if ($update) {
                echo "<script> window.location.href='S_addClient.php';</script>";
            }
        }

        if (isset($_POST['updateUserinfo'])) {
            $update = $this->updateUserinfo();
            if ($update) {
                echo "<script> window.location.href='A_userManage.php';</script>";
            }
        }

        if (isset($_POST['UploadImage'])) {
            $update = $this->uploadImage();
            if ($update) {
                echo "<script> window.location.href='A_Profile.php';</script>";
            }
        }

        if (isset($_POST['Delete'])) {
            $update = $this->deleteUser();
            if ($update) {
                echo "<script> window.location.href='A_Index.php';</script>";
            }
        }

        if (isset($_POST['deleteClient'])) {
            $update = $this->deleteClient();
            if ($update) {
                
                echo "<script> window.location.href='A_clientManage.php';</script>";
            }
        }
        
        if (isset($_POST['BurialCaseStudy'])) {
            $insertSocialCaseStudiesBurial = $this->insertBurialSocialCaseStudiessssss();
            if ($insertSocialCaseStudiesBurial) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addCaseBA.php';</script>";
            }
        }
    }


    public function addRegister() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['userFirst']) {

                $userLast = $_POST['userLast'];
                $userFirst = $_POST['userFirst'];
                $userMid = $_POST['userMid'];
                $userContact = $_POST['userContact'];
                $userBirthDate = $_POST['userBirthDate'];
                $userAge = $_POST['userAge'];
                $userName = $_POST['userName'];
                $userPass = $_POST['userPass'];

                $userCheckPass = $_POST['userCheckPass'];

                if ($userPass == $userCheckPass) {
                    $addRegister = $this->addUserRegister($userLast, $userFirst, $userMid, $userContact, $userBirthDate, $userAge, $userName, $userPass);
                } else {
                    echo $_SESSION['message'] = "Password are not the same";
                    header('location: register.php');
                }
            }
        }
    }

    public function updateProfile()
		{
		    $id = ($_POST['id']);
            $userFirst = ($_POST['userFirst']);
            $userMid = ($_POST['userMid']);
            $userLast = ($_POST['userLast']);
            $userName = ($_POST['userName']);
            $userBirthDate = ($_POST['userBirthDate']);
            $userContact = ($_POST['userContact']);

            $validateInput = True;

            $string = array($userFirst, $userMid, $userLast);
            foreach ($string as $value) {
                $validateString = $this->validateIfString($value);
                if ($validateString) {
                    $validateInput = false;
                }
            }

            $validateNumber = $this->validateIfNumber($userContact);
            if ($validateNumber) {
                $validateInput = false;
            }
            
            if($validateInput) {
                $updating = $this->updateUserProfile($id, $userFirst, $userMid, $userLast, $userName, $userBirthDate, $userContact);
                if ($updating) {
                    $_SESSION['title'] = 'Successfully Updated!!!';
                    $_SESSION['message'] = 'Your Data has been Succesfully Changes!';
                    $_SESSION['msg'] = 'success';
                    return $_SESSION['message'];
                    header("location: A_Profile.php");
                } else {
                    echo "Update failed try again!";
                }
            } 
        }

        public function changeServer()
		{         
		    $mode = ($_POST['mode']);
            
            $change = $this->changeServerStatus($mode);
            if ($change) {
                $_SESSION['title'] = 'Successfully Updated!!!';
                $_SESSION['message'] = 'Server Status Updated!';
                $_SESSION['msg'] = 'success';
                return $_SESSION['message'];
                echo "<script> window.location.href='A_Index.php';</script>";
            } else {
                echo "Update failed try again!";
            }
        }


        public function update_S_Profile()
		{
		    $id = ($_POST['id']);
            $userFirst = ($_POST['userFirst']);
            $userMid = ($_POST['userMid']);
            $userLast = ($_POST['userLast']);
            $userName = ($_POST['userName']);
            $userBirthDate = ($_POST['userBirthDate']);
            $userContact = ($_POST['userContact']);

            $validateInput = True;

            $string = array($userFirst, $userMid, $userLast);
            foreach ($string as $value) {
                $validateString = $this->validateIfString($value);
                if ($validateString) {
                    $validateInput = false;
                }
            }

            $validateNumber = $this->validateIfNumber($userContact);
            if ($validateNumber) {
                $validateInput = false;
            }
            
            if($validateInput) {
                $updating = $this->updateUser_S_Profile($id, $userFirst, $userMid, $userLast, $userName, $userBirthDate, $userContact);
                if ($updating) {
                    $_SESSION['title'] = 'Updated Successfully !!!';
                    $_SESSION['message'] = 'Your Data has been Succesfully Changes!';
                    $_SESSION['msg'] = 'success';
                    return $_SESSION['message'];
                    header("location: S_Profile.php");
                } else {
                    echo "Update failed try again!";
                }
            } 
        }


        // public function addUserAcc() {
        
        //         if ($_POST['userName']) {
    
        //             $userLast = $_POST['userLast'];
        //             $userFirst = $_POST['userFirst'];
        //             $userMid = $_POST['userMid'];
        //             $userContact = $_POST['userContact'];
        //             $userBirthDate = $_POST['userBirthDate'];
        //             $userAge = $_POST['userAge'];
        //             $userGender = $_POST['userGender'];
        //             $userTypeCode = $_POST['userTypeCode'];
        //             $userName = $_POST['userName'];
        //             $userPass = $_POST['userPass'];

        //             $validateInput = True;
                        
        //             }
        //             if ($userGender == "M") {
        //                 $userImage = 'Male.svg';
        //             }

        //             if ($userGender == "F") {
        //                 $userImage = 'Female.svg';
        //             }

        //             $validateNumber = $this->validateIfNumber($userContact, $userAge);
        //                 if ($validateNumber) {
        //                     $validateInput = false;
        //                 }

        //             $string = array($userFirst, $userMid, $userLast);
        //             foreach ($string as $value) {
        //                 $validateString = $this->validateIfString($value);
        //                     if ($validateString) {
        //                         $validateInput = false;
        //                     }
        //                 }

        //             if ($validateInput) {
        //             $addUser = $this->addUserProfile($userImage, $userLast, $userFirst, $userMid, $userContact, $userBirthDate, 
        //             $userAge, $userGender, $userTypeCode, $userName, $userPass);
        //             $_SESSION['title'] = 'Added Successfully!!!';
        //             $_SESSION['message'] = 'The Data has been Successfully Added into Database!';
        //             $_SESSION['msg'] = 'success';
        //             } else {
        //                 $_SESSION['title'] = 'Oops, There is something Wrong!!!';
        //                 $_SESSION['message'] = 'Contact Number must consist of numbers!';
        //                 $_SESSION['msg'] = 'error';
        //             }
                
        //     }
            
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
                        $_SESSION['message'] = 'The Data has been Succesfully added to the Client Database!';
                        $_SESSION['msg'] = 'success';
                    } else {
                        $_SESSION['title'] = 'Oops, There is something Wrong!!!';
                        $_SESSION['message'] = 'Error adding data to the Database!';
                        $_SESSION['msg'] = 'error';
                    }
                }
            }
        

            public function updateUserinfo()
		{
		    $id = ($_POST['id']);
            $userTypeCode = ($_POST['userTypeCode']);


            $updateUser = $this->updateStaffProfile($id, $userTypeCode);
            
            if ($updateUser) {
                //header("Location:edit.php");
            } else {
                echo "Update failed try again!";
            }
        }

        public function uploadImage() {

            $id = ($_POST['id']);
            $image_name = $_FILES['image']['name'];
            $image_size = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            $folder = "./img/" . $image_name;

	        if ($error === 0) {
                if ($image_size >= 999999999) {  
                    $_SESSION['message'] = "Sorry, your file is too large.";
                    $_SESSION['msg'] = 'danger';
                    return $_SESSION['message'];
                } else {
                    $path = pathinfo($image_name, PATHINFO_EXTENSION);
                    $path_location = strtolower($path);
    
                    $path_extension = array("jpg", "jpeg", "png");

                    if($path_extension) {
                        if (in_array($path_location, $path_extension)) {
                            $new_img_name = uniqid(true) . '.' . $path_location;
                            $img_upload_path = './img/' . $image_name;
                            move_uploaded_file($image_size, $img_upload_path);

                            $upload = $this->uploadUserImage($id, $image_name, $image_size, $error, $folder, $path, $path_location, $path_extension);
                        } else {
                            $_SESSION['message'] = "You can't upload files of this type";
                            $_SESSION['msg'] = 'danger';
                        }
                } else {
                    $_SESSION['message'] = "unknown error occurred!";
                    $_SESSION['msg'] = 'danger';
                }
            }
        } 
    }

    public function deleteUser()
		{
		    $id = ($_POST['id']);
            $userTypeCode = "4";

            $delete = $this->softDeleteUser($id, $userTypeCode);

            if($delete) {
                $_SESSION['title'] = 'Deleted Successfully !!!';
                $_SESSION['message'] = 'The Staff has been Succesfully Removed!';
                $_SESSION['msg'] = 'info';
                return $_SESSION['message'];
                header("location: A_userManage.php");
                
            } 
        }

        public function deleteClient()
		{
		    $clientid = ($_POST['clientid']);
            $clientDelete = "0";

            $delete = $this->softDeleteClient($clientid, $clientDelete);
            
        }

        public function insertBurialSocialCaseStudiessssss()
        {
            $client = $_POST['clientCode'];
    
            $problemPresented11 = $_POST['problem1'];
            $problemPresented22 = $_POST['problem2'];
            $problemPresented33 = $_POST['problem3'];
            $problemPresented44 = $_POST['problem4'];
            $problemPresented55 = $_POST['problem5'];
            $problemPresented66 = $_POST['problem6'];
    
            $family = $_POST['familybackground'];
    
            $recommend = $_POST['recommendation'];


            $clientCode = $_POST['clientCode'];
            $clientFullName = $_POST['clientFullName'];
            $userCode = $_POST['userCode'];
            $unsettledAmount = $_POST['unsettledAmount'];
    
            $nameofStaff = $_POST['nameofStaff'];
            $staffPosition = $_POST['staffPosition'];
            $typeOfAssistance = $_POST['typeOfAssistance'];
            $receiveAssistance = $_POST['clientFullName'];
            $AmountofAssistance = $_POST['AmountofAssistance'];
            $cCTR = $_POST['cCTR'];

            $caseBurialStudy =  strtoupper($clientFullName).' is requesting for a social case study report to avail '.strtoupper($problemPresented22).' assistance from your good office '.strtoupper($problemPresented33).' concerning his/her deceased '.($problemPresented44).', '.strtoupper($problemPresented11).' that was diagnosed with '.strtoupper($problemPresented55).'. Due to the indigent condition of the family, they cannot afford to support her '.strtoupper($problemPresented66). ' expenses.';
            $insertBurialCase = $this->insertBurialCaseeeeee($client, $caseBurialStudy, $family, $recommend);
            
            $insLog = $this->recordActLogBurialCase($clientCode, $typeOfAssistance, $receiveAssistance, 
            $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR);
            
            $insertBurial = $this->addClientCase($clientFullName, $unsettledAmount, $clientCode, $userCode);
        }
}