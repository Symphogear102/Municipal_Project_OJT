<?php

class Client extends User {

    public function __construct(){

        parent::__construct();
    }
    
    //Checking login in user
    public function getClientInfo()
    {
        $sql = "SELECT * FROM clienttb";
        $query = $this->setInfo($sql);
        return $query;
    }

    public function displayAllUser()
    {
        $sql = "SELECT * FROM usertb";
        $row = $this->setInfo($sql);
        return $row;
    }

    public function displaySpecificUser()
    {
        $sql = "SELECT * FROM usertb WHERE userTypeCode < '2'";
        $row = $this->setInfo($sql);
        return $row;
    }
    //financial
    public function displayClientPDF() {

        $clientIDreport = $_POST['clientIDreport'];

        $query = "SELECT * FROM clienttb WHERE cCTR = '$clientIDreport'";
        $result = $this->connect()->query($query);
        $row = $result->fetch_assoc();
        
        return $row;

    }

    public function displayClientCaseStudy() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT * FROM case_tb WHERE clientCode = '$clientIDgeneratedReport'";
        $row = $this->setInfo($sql);
        return $row;

    }

    public function displayClientCaseInfo() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT problemPresented FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;

    }

    public function displayClientFamilyBackGround() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT familyBackground FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;

    }

    public function displayClientRecommendation() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT recommendation FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;
    }


//BURIAL!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    public function displayBurial() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT problemPresented FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '1' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;

    }

    public function displayBurialFamiliyBackground() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT familyBackground FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '1' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;

    }

    public function displayBurialRecommendation() {

        $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

        $sql = "SELECT recommendation FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '1' ORDER BY caseCode DESC LIMIT 1";
        $row = $this->setInfo($sql);
        return $row;
    }


///////FOOD

public function displayFood() {

    $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

    $sql = "SELECT problemPresented FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '4' ORDER BY caseCode DESC LIMIT 1";
    $row = $this->setInfo($sql);
    return $row;

}

public function displayFoodFamiliyBackground() {

    $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

    $sql = "SELECT familyBackground FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '4' ORDER BY caseCode DESC LIMIT 1";
    $row = $this->setInfo($sql);
    return $row;

}

public function displayFoodRecommendation() {

    $clientIDgeneratedReport = $_POST['clientIDgeneratedReport'];

    $sql = "SELECT recommendation FROM caseinfo_tb WHERE clientCode = '$clientIDgeneratedReport' AND caseType = '4' ORDER BY caseCode DESC LIMIT 1";
    $row = $this->setInfo($sql);
    return $row;
}
}   