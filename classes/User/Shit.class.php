<?php

class Shit extends User {

    public function __construct(){

        parent::__construct();
    }

public function addUserProfile($userImage, $userLast, $userFirst, $userMid, $userContact, $userBirthDate, 
    $userAge, $userGender, $userTypeCode, $staffPosition, $userName, $userPass)
    {
       $sql = "INSERT INTO usertb (userImage, userLast, userFirst, userMid, userContact, userBirthDate, userAge, userGender, userTypeCode, staffPosition, userName, userPass) 
       VALUES ('$userImage','$userLast', '$userFirst', '$userMid', '$userContact', '$userBirthDate', '$userAge', '$userGender', '$userTypeCode', '$staffPosition', '$userName', '$userPass')";

        $query = $this->setInfo($sql);
        return $query;
    
    }

    public function addClientProfile($clientID, $uniqueCode, $lastName, $firstName, $middleName, $age, $gender, $suffix, $province, $city, $brgy, $street, 
    $contactNum, $birthDate, $birthPlace, $civilStatus, $clientEducation, $clientOccupation, $religion, $monthlyIncome, $numofChildren, $soloParent, $senior, $pwd, $youth, $fourpc)
	{
        $sql = "INSERT INTO clienttb (clientCode, codeClientUnique, lastName, firstName, middleName, age, gender, suffix, province, city, brgy, street, 
        contactNum, birthDate, birthPlace, civilStatus, clientEducation, clientOccupation, religion, monthlyIncome, numofChildren, soloParent, senior, pwd, youth, 4pc) 
        VALUES ('$clientID', '$uniqueCode', '$lastName', '$firstName', '$middleName', '$age', '$gender', '$suffix', '$province', '$city', '$brgy', '$street',
        '$contactNum', '$birthDate', '$birthPlace', '$civilStatus', '$clientEducation', '$clientOccupation', '$religion', '$monthlyIncome', '$numofChildren', '$soloParent', '$senior', '$pwd', '$youth', '$fourpc')";

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

    public function addRegistrationPast($clientID, $uniqueCode, $lastName, $firstName, $middleName, $age, $gender, $suffix, $province, $city, $brgy, $street, 
    $contactNum, $birthDate, $birthPlace, $civilStatus, $clientEducation, $clientOccupation, $religion, $monthlyIncome, $numofChildren, $soloParent, $senior, $pwd, $youth, $fourpc, $date)
	{
        $sql = "INSERT INTO clienttb (clientCode, codeClientUnique, lastName, firstName, middleName, age, gender, suffix, province, city, brgy, street, 
        contactNum, birthDate, birthPlace, civilStatus, clientEducation, clientOccupation, religion, monthlyIncome, numofChildren, soloParent, senior, pwd, youth, 4pc, genDate) 
        VALUES ('$clientID', '$uniqueCode', '$lastName', '$firstName', '$middleName', '$age', '$gender', '$suffix', '$province', '$city', '$brgy', '$street',
        '$contactNum', '$birthDate', '$birthPlace', '$civilStatus', '$clientEducation', '$clientOccupation', '$religion', '$monthlyIncome', '$numofChildren', '$soloParent', '$senior', '$pwd', '$youth', '$fourpc', '$date')";

        $query = $this->setInfo($sql);
        return $query;
		
	}
}

?>