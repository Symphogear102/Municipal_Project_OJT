<?php

class StaffController extends StaffView
{

    public function __construct()
    {

        parent::__construct();
    }

    public function staffAction()
    {
        if (isset($_POST['faSubmit'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addCaseFA.php';</script>";
            }
        }

        if (isset($_POST['maSubmit'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addCaseMA.php';</script>";
            }
        }

        if (isset($_POST['baSubmit'])) {
            $insertClient = $this->displayClientID();
            if ($insertClient) {
                echo "<script> window.location.href='S_addCaseBA.php';</script>";
            }
        }


        if (isset($_POST['caseSubmit'])) {
            $insertClient = $this->displayFamilyID();
            if ($insertClient) {
                echo "<script> window.location.href='S_addCase.php';</script>";
            }
        }


        if (isset($_POST['insertCaseFA'])) {
            $insertSocialCaseStudiesAndFA = $this->insertSocialCaseStudies();
            if ($insertSocialCaseStudiesAndFA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addCaseFA.php';</script>";
            }
        }

        if (isset($_POST['insertCaseMA'])) {
            $insertSocialCaseStudiesAndMA = $this->insertSocialCaseStudies2();
            if ($insertSocialCaseStudiesAndMA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addCaseMA.php';</script>";
            }
        }

        if (isset($_POST['insertCaseFO'])) {
            $insertSocialCaseStudiesAndFO = $this->insertSocialCaseStudies3();
            if ($insertSocialCaseStudiesAndFO) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addCaseFO.php';</script>";
            }
        }

        if (isset($_POST['insertCaseBA'])) {
            $insertClientBA = $this->insertCaseBurial();
            if ($insertClientBA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addCaseBA.php';</script>";
            }
        }

        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------
        //-------------------CASE STUDY BUTTONS END HERE!!!!!!!!!!!-------------------

        if (isset($_POST['addFA'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addFinancial.php';</script>";
            }
        }

        if (isset($_POST['addFO'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addFood.php';</script>";
            }
        }

        if (isset($_POST['addMA'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addMedical.php';</script>";
            }
        }

        if (isset($_POST['addBA'])) {
            $update = $this->displayClientID();
            if ($update) {
                echo "<script> window.location.href='S_addBurial.php';</script>";
            }
        }

        if (isset($_POST['addFinancial'])) {
            $insertClientFA = $this->addClientFinancial();
            if ($insertClientFA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addFinancial.php';</script>";
            }
        }

        if (isset($_POST['addFood'])) {
            $insertClientFA = $this->addClientFood();
            if ($insertClientFA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addFood.php';</script>";
            }
        }

        if (isset($_POST['addBurial'])) {
            $insertClientBA = $this->addClientBurial();
            if ($insertClientBA) {
                $_SESSION['title'] = 'Data Entry Added!';
                $_SESSION['message'] = 'The Data has been Successfully Added!!';
                $_SESSION['msg'] = 'success';
                echo "<script> window.location.href='S_addBurial.php';</script>";
            }
        }


        if (isset($_POST['famSubmit'])) {
            $insertClient = $this->displayClientID();
            if ($insertClient) {
                echo "<script> window.location.href='S_addFamily.php';</script>";
            }
        }

        if (isset($_POST['deleteClient'])) {
            $update = $this->deleteClient();
            if ($update) {
                echo "<script> window.location.href='S_clientManage.php';</script>";
            }
        }

        if (isset($_POST['staffHistory'])) {
            $history = $this->getStaffInfo();
            if ($history) {
                echo "<script> window.location.href='A_viewHistory.php';</script>";
            }
        }

        if (isset($_POST['updateClientInfoDatas'])) {
            $update = $this->updateClientInfos();
            if ($update) {
                echo "<script> window.location.href='S_clientInfo.php';</script>";
            }
        }

        if (isset($_POST['updateFamilityStatus'])) {
            $update = $this->updateFamiliyStatus();
            if ($update) {
                echo "<script> window.location.href='S_clientInfo.php';</script>";
            }
        }

    }

    
    //===========STAFF ACTION FUNCTION ENDS HERE----------------

    // public function userCarry()
    // {
    //     $userCode = $_POST['userCode'];
    //     $display = $this->showHistory($userCode);

    // }

    public function insertCaseStudy()
    {

        $clientCode = $_POST['clientCode'];
        $famName = $_POST['famName'];
        $famAge = $_POST['famAge'];
        $famCivilStatus = $_POST['famCivilStatus'];
        $famRelationship = $_POST['famRelationship'];
        $famEducational = $_POST['famEducational'];
        $famOccupation = $_POST['famOccupation'];
        $famIncome = $_POST['famIncome'];

        foreach ($famName as $index => $names) {
            $f_name = $names;
            $f_clientCode = $clientCode[$index];
            $f_amAge = $famAge[$index];
            $f_amCivilStatus = $famCivilStatus[$index];
            $f_amRelationship = $famRelationship[$index];
            $f_amEducational = $famEducational[$index];
            $f_amOccupation = $famOccupation[$index];
            $f_amIncome = $famIncome[$index];

            $insertCase = $this->insertClientCaseStudy($f_name, $f_clientCode, $f_amAge, $f_amCivilStatus, $f_amRelationship, $f_amEducational, $f_amOccupation, $f_amIncome);

        }

    }

    public function deleteClient()
    {
        $clientid = ($_POST['clientid']);
        $clientDelete = "0";

        $delete = $this->softDeleteClient($clientid, $clientDelete);

    }


    public function insertCaseFinancial()
    {
        $clientCode2 = $_POST['clientCode2'];
        $problemPresented = $_POST['problemPresented'];
        $familyBackground = $_POST['familyBackground'];
        $recommendation = $_POST['recommendation'];

        //FINANCIAL POST 
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $AmountofAssistant = $_POST['AmountofAssistant'];

        $insertCaseInfoFA = $this->insertClientCaseInfo(
            $clientCode2, $problemPresented, $familyBackground, $recommendation
        );

        $insertFinancial = $this->insertClientFinancialAssistance(
            $clientFullName, $AmountofAssistant, $clientCode
        );
    }


    
    public function insertCaseBurial()
    {
        $clientCode2 = $_POST['clientCode2'];
        $problemPresented = $_POST['problemPresented'];
        $familyBackground = $_POST['familyBackground'];
        $recommendation = $_POST['recommendation'];

        //BURIAL POST 
        $clientCode = $_POST['clientCode'];
        $clientName = $_POST['clientName'];
        $nameofDeceased = $_POST['nameofDeceased'];
        $causeofDeath = $_POST['causeofDeath'];
        $dateofDeath = $_POST['dateofDeath'];
        $amounttoSettle = $_POST['amounttoSettle'];
        $issuedAmount = $_POST['issuedAmount'];


        $insertCaseInfoBA = $this->insertClientCaseInfo(
            $clientCode2, $problemPresented, $familyBackground, $recommendation
        );

        $insertBurial = $this->insertClientBurialAssistance(
            $clientName,
            $nameofDeceased,
            $causeofDeath,
            $dateofDeath,
            $amounttoSettle,
            $issuedAmount,
            $clientCode
        );
        
    }


    public function insertCaseMedical()
    {
        // MEDICAL POST 

        $clientCode = $_POST['clientCode'];
        $claimant = $_POST['claimant'];
        $medName = $_POST['medName'];
        $medQty = $_POST['medQty'];

        foreach ($medName as $index => $m_names) {
            $med_name = $m_names;
            $claimants = $claimant[$index];
            $f_clientCode = $clientCode[$index];
            $med_qty = $medQty[$index];
            
            $insertMedical = $this->insertClientMedicalAssistance(
                $med_name, $claimants, $f_clientCode, $med_qty
            );
        }

            $clientCode2 = $_POST['clientCode2'];
            $problemPresented = $_POST['problemPresented'];
            $familyBackground = $_POST['familyBackground'];
            $recommendation = $_POST['recommendation'];

            $insertCaseInfoMA = $this->insertClientCaseInfo(
                $clientCode2, $problemPresented, $familyBackground, $recommendation
            );
    }

//-------------------LOCAL INSERTING CONTROLLER-----------------

        public function addClientFinancial()
    {
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $userCode = $_POST['userCode'];
        

        //ACTIVITY LOG!!!!!!!!!! DON'T REMOVE
        $nameofStaff = $_POST['nameofStaff'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['receiveAssistance']; 
        $staffPosition = $_POST['staffPosition'];
        $cCTR = $_POST['cCTR'];

        $activityLog = $this->recordActLog(
            $clientCode, $typeOfAssistance, $receiveAssistance, $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR
        );

        $addClientFA = $this->addClientFA(
            $clientFullName, $AmountofAssistance, $clientCode, $userCode
        );

    }

    public function addClientFood()
    {
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $userCode = $_POST['userCode'];
        

        //ACTIVITY LOG!!!!!!!!!! DON'T REMOVE
        $nameofStaff = $_POST['nameofStaff'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['receiveAssistance']; 
        $staffPosition = $_POST['staffPosition'];
        $cCTR = $_POST['cCTR'];

        $activityLog = $this->recordActLog(
            $clientCode, $typeOfAssistance, $receiveAssistance, $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR
        );

        $addClientFA = $this->addClientFD(
            $clientFullName, $AmountofAssistance, $clientCode, $userCode
        );

    }

    public function addClientBurial()
    {
        $clientCode = $_POST['clientCode'];
        $clientName = $_POST['clientName'];
        $nameofDeceased = $_POST['nameofDeceased'];
        $causeofDeath = $_POST['causeofDeath'];
        $dateofDeath = $_POST['dateofDeath'];
        $amounttoSettle = $_POST['amounttoSettle'];
        $issuedAmount = $_POST['issuedAmount'];
        $userCode = $_POST['userCode'];

        //ACTIVITY LOG!!!!!!! DON'T REMOVE
        $nameofStaff = $_POST['nameofStaff'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['receiveAssistance']; 
        $AmountofAssistance = $_POST['issuedAmount'];
        $staffPosition = $_POST['staffPosition'];
        $cCTR = $_POST['cCTR'];

        $activityLog = $this->recordActLog(
            $clientCode, $typeOfAssistance, $receiveAssistance, $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR
        ); 

        $addClientBA = $this->addClientBA(
            $clientName,
            $nameofDeceased,
            $causeofDeath,
            $dateofDeath,
            $amounttoSettle,
            $issuedAmount,
            $clientCode,
            $userCode
            
        );
               
    }

    public function addClientMedical()
    {

        $clientCode = $_POST['clientCode'];
        $claimant = $_POST['claimant'];
        $medName = $_POST['medName'];
        $medQty = $_POST['medQty'];
        $userCode = $_POST['userCode'];
        
        
        foreach ($medName as $index => $m_names) {
            $med_name = $m_names;
            $claimants = $claimant[$index];
            $f_clientCode = $clientCode[$index];
            $med_qty = $medQty[$index];
            $us_code = $userCode[$index];
            
        $addClientMA = $this->addClientMA(
            $med_name, $claimants, $f_clientCode, $med_qty, $us_code
            );
        }

                //ACTIVITY LOG!!!!!!! DON'T REMOVE
                
        $clientCode2 = $_POST['clientCode2'];
        $nameofStaff = $_POST['nameofStaff'];
        $staffPosition = $_POST['staffPosition'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['receiveAssistance']; 
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $userCode2 = $_POST['userCode'];
        $cCTR = $_POST['cCTR'];

        foreach($nameofStaff as $index => $fs_name){
            $staff_name = $fs_name;
            $type_assist = $typeOfAssistance[$index];
            $staffPos = $staffPosition[$index];
            $cCode = $clientCode2[$index];
            $receiver = $receiveAssistance[$index];
            $amt_assist = $AmountofAssistance[$index];
            $u_code = $userCode2[$index];
            $c_code = $cCTR[$index];
            
        $activityLog = $this->recordActLog2(
            $cCode, $type_assist, $receiver, $amt_assist, $staff_name, $staffPos, $u_code, $c_code
        );
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
    }
    }
    
    public function insertSocialCaseStudies()
    {
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $unsettledAmount = $_POST['unsettledAmount'];
        $userCode = $_POST['userCode'];
        $getAssitantType = $_POST['getAssitantType'];

        $problemPresented1 = $_POST['problemPresented1'];
        $problemPresented2 = $_POST['problemPresented2'];
        $problemPresented3 = $_POST['problemPresented3'];
        $problemPresented4 = $_POST['problemPresented4'];
        $problemPresented5 = $_POST['problemPresented5'];
        $problemPresented6 = $_POST['problemPresented6'];

        $familybackground = $_POST['familybackground'];

        $recommendation = $_POST['recommendation'];

        $nameofStaff = $_POST['nameofStaff'];
        $staffPosition = $_POST['staffPosition'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['clientFullName'];
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $cCTR = $_POST['cCTR'];

        $caseStudy = strtoupper($clientFullName).' is requesting for a social case study report to avail '.strtoupper($problemPresented2).' from your good office '.strtoupper($problemPresented3).'. The client '.strtoupper($problemPresented1).' was diagnosed with a health condition: '.strtoupper($problemPresented5).'. The client has an unsettled hospital bill amounting to Php '.strtoupper($unsettledAmount).' and also needs to undergo '.strtoupper($problemPresented6).'. Due to the indigent condition of the family, they cannot afford to support his/her '.strtoupper($problemPresented4).' financial needs.';

        // $familyBackground = strtoupper($familybackground).' is a native resident of Obando, Bulacan. (He/She) is living with (His/Her) family for almost '.strtoupper($familyBackground2).' years. They live in their own house made of '.strtoupper($familyBackground10).'. The Family fully depends on the income of his '.strtoupper($familyBackground8).'. However, the income of his family was too minimal to support their basic needs. Thus they sought the MSwDo for proper intervention.';

        $insLog = $this->recordActLog($clientCode, $typeOfAssistance, $receiveAssistance, 
        $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR);

        $insertCase = $this->insertSocialCASE($clientCode, $caseStudy, $familybackground, $recommendation, $getAssitantType);

        $insertFinancial = $this->addClientCase($clientFullName, $unsettledAmount, $clientCode, $userCode);

        


        if ($insertCase || $insertFinancial) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
        }
    }
    
    
    public function insertSocialCaseStudies2()
    {
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $unsettledAmount = $_POST['unsettledAmount'];
        $userCode = $_POST['userCode'];
        $getAssitantType = $_POST['getAssitantType'];

        $problemPresented1 = $_POST['problemPresented1'];
        $problemPresented2 = $_POST['problemPresented2'];
        $problemPresented3 = $_POST['problemPresented3'];
        $problemPresented4 = $_POST['problemPresented4'];
        $problemPresented5 = $_POST['problemPresented5'];
        $problemPresented6 = $_POST['problemPresented6'];

        $familybackground = $_POST['familybackground'];

        $recommendation = $_POST['recommendation'];

        $nameofStaff = $_POST['nameofStaff'];
        $staffPosition = $_POST['staffPosition'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['clientFullName'];
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $cCTR = $_POST['cCTR'];

        $caseStudy = strtoupper($clientFullName).' is requesting for a social case study report to avail '.strtoupper($problemPresented2).' assistance from your good office '.strtoupper($problemPresented3).'. The client '.strtoupper($problemPresented1).' was diagnosed with a health condition: '.strtoupper($problemPresented5).'. The client is advised to buy medications amounting to Php '.strtoupper($unsettledAmount).' and needs to undergo '.strtoupper($problemPresented6).'. Due to the indigent condition of the family, they cannot afford to support his/her '.strtoupper($problemPresented4).' financial needs.';

        // $familyBackground = strtoupper($familybackground).' is a native resident of Obando, Bulacan. (He/She) is living with (His/Her) family for almost '.strtoupper($familyBackground2).' years. They live in their own house made of '.strtoupper($familyBackground10).'. The Family fully depends on the income of his '.strtoupper($familyBackground8).'. However, the income of his family was too minimal to support their basic needs. Thus they sought the MSwDo for proper intervention.';
        $insLog = $this->recordActLog($clientCode, $typeOfAssistance, $receiveAssistance, 
        $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR);

        $insertCase = $this->insertSocialCASE($clientCode, $caseStudy, $familybackground, $recommendation, $getAssitantType);
        
        $insertMedical = $this->addClientCase($clientFullName, $unsettledAmount, $clientCode, $userCode);

        if ($insertCase || $insertMedical) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
        }
    }

    public function insertSocialCaseStudies3()
    {
        $clientCode = $_POST['clientCode'];
        $clientFullName = $_POST['clientFullName'];
        $unsettledAmount = $_POST['unsettledAmount'];
        $userCode = $_POST['userCode'];
        $getAssitantType = $_POST['getAssitantType'];


        $problemPresented2 = $_POST['problemPresented2'];
        $problemPresented3 = $_POST['problemPresented3'];
        $problemPresented4 = $_POST['problemPresented4'];
        $problemPresented5 = $_POST['problemPresented5'];
        $problemPresented6 = $_POST['problemPresented6'];

        $familybackground = $_POST['familybackground'];

        $recommendation = $_POST['recommendation'];

        $nameofStaff = $_POST['nameofStaff'];
        $staffPosition = $_POST['staffPosition'];
        $typeOfAssistance = $_POST['typeOfAssistance'];
        $receiveAssistance = $_POST['clientFullName'];
        $AmountofAssistance = $_POST['AmountofAssistance'];
        $cCTR = $_POST['cCTR'];

        $caseStudy = strtoupper($clientFullName).' is requesting for a social case study report to avail '.strtoupper($problemPresented2).' from your good office '.strtoupper($problemPresented3).'. Due to the indigent condition of the family, they cannot afford to support their basic needs';

        
        // $familyBackground = strtoupper($familybackground).' is a native resident of Obando, Bulacan. (He/She) is living with (His/Her) family for almost '.strtoupper($familyBackground2).' years. They live in their own house made of '.strtoupper($familyBackground10).'. The Family fully depends on the income of his '.strtoupper($familyBackground8).'. However, the income of his family was too minimal to support their basic needs. Thus they sought the MSwDo for proper intervention.';
        $insLog = $this->recordActLog($clientCode, $typeOfAssistance, $receiveAssistance, 
        $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR);

        $insertCase = $this->insertSocialCASE($clientCode, $caseStudy, $familybackground, $recommendation, $getAssitantType,
        $problemPresented4, $problemPresented5, $problemPresented6);
        
        $insertMedical = $this->addClientCase($clientFullName, $unsettledAmount, $clientCode, $userCode);

        if ($insertCase || $insertMedical) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
        }
    }

    public function updateClientInfos() {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $suffix = $_POST['suffix'];
        $birthDate = $_POST['birthDate'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $birthPlace = $_POST['birthPlace'];
        $contactNum = $_POST['contactNum'];
        $civilStatus = $_POST['civilStatus'];
        $street = $_POST['street'];
        $brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $monthlyIncome = $_POST['monthlyIncome'];
        $clientOccupation = $_POST['clientOccupation'];
        $religion = $_POST['religion'];
        $soloParent = $_POST['soloParent'];
        $numofChildren = $_POST['numofChildren'];
        $senior = $_POST['senior'];
        $pwd = $_POST['pwd'];
        $youth = $_POST['youth'];
        $fourPeace = $_POST['4pc'];

        $validateInput = True;

        $string = array($firstName, $middleName, $lastName);
        foreach ($string as $value) {
            $validateString = $this->validateIfString($value);
            if ($validateString) {
                $validateInput = false;
            }
        }

        $validateNumber = $this->validateIfNumber($age, $contactNum);
        if ($validateNumber) {
            $validateInput = false;
        }

        if($validateInput == true) {
            $update = $this->updateClientInfoData($id, $firstName, $middleName, $lastName, $suffix, $birthDate, $age, $gender, $birthPlace, $contactNum, $civilStatus, $street, $brgy, $city, $province, $monthlyIncome, $clientOccupation, $religion, $soloParent, $numofChildren, $senior, $pwd, $youth, $fourPeace);
            $_SESSION['title'] = 'Update Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
        }
    }

    public function updateFamiliyStatus() {
        $id = $_POST['id'];
        $famCode = $_POST['famCode'];
        $famName = $_POST['famName'];
        $famAge = $_POST['famAge'];
        $famCivilStatus = $_POST['famCivilStatus'];
        $famRelationship = $_POST['famRelationship'];
        $famEducational = $_POST['famEducational'];
        $famOccupation = $_POST['famOccupation'];
        $famIncome = $_POST['famIncome'];

        $validateInput = True;

        $string = array($famName);
        foreach ($string as $value) {
            $validateString = $this->validateIfString($value);
            if ($validateString) {
                $validateInput = false;
            }
        }

        $validateNumber = $this->validateIfNumber($famAge);
        if ($validateNumber) {
            $validateInput = false;
        }

        if($validateInput == True) {
        $updateFamiliy = $this->updateFamilityDataStatus($id, $famCode, $famName, $famAge, $famCivilStatus, $famRelationship, $famEducational, $famOccupation, $famIncome);
        }
    }
}