<?php

class Staff extends User {

    public function __construct(){

        parent::__construct();
    }

    // public function getDetails($sql){

    //     $query = $this->connect()->query($sql);
        
    //     $row = $query->fetch_array();
            
    //     return $row;       
    // }

    // protected function setInfo($sql) {
    //     $query = $this->connect()->query($sql);
    //     return $query;
    // }
    

    public function insertClientFinancialAssistance($clientFullName, $unsettledAmount, $clientCode, $userCode)
    {
       $sql = "INSERT INTO fa_tb (claimant, unsettledAmount, clientCode, userCode) 
       VALUES 
       ('$clientFullName', '$unsettledAmount', '$clientCode', '$userCode')";

        $query = $this->setInfo($sql);
        if($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            echo "<script> window.location.href='S_addCaseFA.php';</script>";
            exit(0);
            return $query;
        }
    }

    public function insertClientMedicalAssistance($med_name, $claimants, $f_clientCode, $med_qty)
    {
        $sql = "INSERT INTO med_tb (medName, claimant, medQty, clientCode)
        VALUES ('$med_name', '$claimants', '$med_qty', '$f_clientCode')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        echo "<script> window.location.href='S_addCaseMA.php';</script>";
        return $query;
    }

    public function insertClientBurialAssistance($clientName, $nameofDeceased, $causeofDeath,
    $dateofDeath, $amounttoSettle, $issuedAmount, $clientCode)
    {
       $sql = "INSERT INTO burial_tb (clientName, nameofDeceased, causeofDeath, dateofDeath, amounttoSettle, 
       issuedAmount, clientCode) 
       VALUES 
       ('$clientName', '$nameofDeceased', '$causeofDeath', '$dateofDeath', '$amounttoSettle', 
       '$issuedAmount', '$clientCode')";

        $query = $this->setInfo($sql);
        if($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            echo "<script> window.location.href='S_landPage.php';</script>";
            exit(0);
            return $query;
        }

        else if (!$query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'error';
            echo "<script> window.location.href='S_addBA.php';</script>";
        }
    }

    public function insertClientCaseInfo($clientCode2, $problemPresented, $familyBackground, $recommendation)
    {
        $sql = "INSERT INTO caseinfo_tb (clientCode, problemPresented, familyBackground, recommendation)
        VALUES ('$clientCode2', '$problemPresented', '$familyBackground', '$recommendation')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        return $query;
    }

    public function insertClientCaseStudy($f_name, $f_clientCode, $f_amAge, $f_amCivilStatus, $f_amRelationship, $f_amEducational, $f_amOccupation, $f_amIncome)
    {
        $sql = "INSERT INTO case_tb (clientCode, famName, famAge, famCivilStatus, famRelationship, famEducational, famOccupation, famIncome)
        VALUES ('$f_clientCode', '$f_name','$f_amAge', '$f_amCivilStatus', '$f_amRelationship', '$f_amEducational', '$f_amOccupation', '$f_amIncome')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        return $query;
    }

    
    public function softDeleteClient($clientid, $clientDelete) {
        $sql = "UPDATE clienttb SET clientDelete = '$clientDelete' WHERE cCTR = '$clientid'";
        $query = $this->setInfo($sql);
        
        if($query) {
            echo "<script> window.location.href='S_clientManage.php';</script>";
        }
    }

    public function getClientInfo()
    {
        $sql = "SELECT * FROM case_tb";
        $query = $this->setInfo($sql);
        return $query;
    }
 

    //-------------------------------LOCAL INSERTING STARTS HERE------------------------

    public function addClientFA($clientFullName, $AmountofAssistance, $clientCode, $userCode)
    {
       $sql = "INSERT INTO local_fa (claimant, amountofAssist, clientCode, userCode) 
       VALUES 
       ('$clientFullName', '$AmountofAssistance', '$clientCode', '$userCode')";

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

    public function addClientFD($clientFullName, $AmountofAssistance, $clientCode, $userCode)
    {
       $sql = "INSERT INTO local_fd (claimant, amountofAssist, clientCode, userCode) 
       VALUES 
       ('$clientFullName', '$AmountofAssistance', '$clientCode', '$userCode')";

        $query = $this->setInfo($sql);
        if($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            echo "<script> window.location.href='S_addFood.php';</script>";
            exit(0);
            return $query;
        }
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

    public function addClientBA($clientName, $nameofDeceased, $causeofDeath,
    $dateofDeath, $amounttoSettle, $issuedAmount, $clientCode, $userCode)
    {
       $sql = "INSERT INTO local_ba (clientName, nameofDeceased, causeofDeath, dateofDeath, amounttoSettle, 
       issuedAmount, clientCode, userCode)
       VALUES 
       ('$clientName', '$nameofDeceased', '$causeofDeath', '$dateofDeath', '$amounttoSettle', 
       '$issuedAmount', '$clientCode', '$userCode')";

        $query = $this->setInfo($sql);
        if($query) {
            $_SESSION['title'] = 'Added Successfully!!!';
            $_SESSION['message'] = 'The Data has been Successfully Added!!';
            $_SESSION['msg'] = 'success';
            echo "<script> window.location.href='S_addBurial.php';</script>";
            exit(0);
            return $query;
        }
    }

    public function addClientMA($med_name, $claimants, $f_clientCode, $med_qty, $us_code)
    {
        $sql = "INSERT INTO local_ma (medName, claimant, medQty, clientCode, userCode)
        VALUES ('$med_name', '$claimants', '$med_qty', '$f_clientCode', '$us_code')";
        $query = $this->setInfo($sql);
        //if($query) {
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        echo "<script> window.location.href='S_addMedical.php';</script>";
        //exit(0);
        return $query;
        //}
    }

    public function recordActLog($clientCode, $typeOfAssistance, $receiveAssistance, $AmountofAssistance, $nameofStaff, $staffPosition, $userCode, $cCTR)
    {
        $sql = "INSERT INTO activitylog (clientCode, typeOfAssistance, receiveAssistance, Amount, nameofStaff, staffPosition, userCode, cCTR)
        VALUES ('$clientCode', '$typeOfAssistance', '$receiveAssistance', '$AmountofAssistance', '$nameofStaff', '$staffPosition', '$userCode', '$cCTR')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        return $query;
    }

    public function recordActLog2($cCode, $type_assist, $receiver, $amt_assist, $staff_name, $staffPos, $u_code, $c_code)
    {
        $sql = "INSERT INTO activitylog (clientCode, typeOfAssistance, receiveAssistance, Amount, nameofStaff, staffPosition, userCode, cCTR)
        VALUES ('$cCode', '$type_assist', '$receiver', '$amt_assist', '$staff_name', '$staffPos', '$u_code', '$c_code')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        return $query;
    }
    //LOCAL INSERT END!!!!
    public function insertSocialCASE($clientCode, $caseStudy, $familybackground, $recommendation, $getAssitantType)
    {
        $sql = "INSERT INTO caseinfo_tb (clientCode, problemPresented, familyBackground, recommendation, caseType)
        VALUES ('$clientCode', '$caseStudy', '$familybackground', '$recommendation', '$getAssitantType')";
        $query = $this->setInfo($sql);
        
        $_SESSION['title'] = 'Added Successfully!!!';
        $_SESSION['message'] = 'The Data has been Successfully Added!!';
        $_SESSION['msg'] = 'success';
        echo "<script> window.location.href='S_landPage.php';</script>";
        return $query;
    }


    public function updateClientInfoData($id, $firstName, $middleName, $lastName, $suffix, $birthDate, $age, $gender, $birthPlace, $contactNum, $civilStatus, $street, $brgy, $city, $province, $monthlyIncome, $clientOccupation, $religion, $soloParent, $numofChildren, $senior, $pwd, $youth, $fourPeace) {
        $sql = "UPDATE clienttb SET firstName = '$firstName', middleName = '$middleName', lastName = '$lastName', suffix = '$suffix', birthDate = '$birthDate', age = '$age', gender = '$gender', birthPlace = '$birthPlace', contactNum = '$contactNum', civilStatus = '$civilStatus', street = '$street', brgy = '$brgy', city = '$city', province = '$province', monthlyIncome = '$monthlyIncome', clientOccupation = '$clientOccupation', religion = '$religion', soloParent = '$soloParent', numofChildren = '$numofChildren', senior = '$senior', pwd = '$pwd', youth = '$youth', 4pc = '$fourPeace' WHERE clientCode = '$id'";
        $query = $this->setInfo($sql);
        
        if($query == true) {
            echo "<script> window.location.href='S_clientInfo.php?editId=$id';</script>";
            return $query;
        }
    }

    public function updateFamilityDataStatus($id, $famCode, $famName, $famAge, $famCivilStatus, $famRelationship, $famEducational, $famOccupation, $famIncome) {
        $sql = "UPDATE case_tb SET famName = '$famName', famAge = '$famAge', famCivilStatus = '$famCivilStatus', famRelationship = '$famRelationship', famEducational = '$famEducational', famOccupation = '$famOccupation', famIncome = '$famIncome' WHERE famCode = '$famCode'";
        $query = $this->setInfo($sql);

        if($query == true) {
        echo "<script> window.location.href='S_clientInfo.php?editId=$id';</script>";
        return $query;
        }
    }
}

?>