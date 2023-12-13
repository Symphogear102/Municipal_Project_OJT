<?php

    class StaffView extends Staff {
        
        
        public function displayClientID($editId)
		{
		    $query = "SELECT * FROM clienttb WHERE cCTR = '$editId'";
		    $result = $this->connect()->query($query);
			$row = $result->fetch_assoc();
			$clientCode = $row['clientCode'];
			
			return $row;
		    
		}
		
		public function getStaffInfo()
		{
			$sql = "SELECT * FROM usertb";
			$query = $this->setInfo($sql);
			return $query;
		}


		public function displayStaffID()
		{

            $query = "SELECT * FROM usertb";
            $result = $this->connect()->query($query);
            $row = $result->fetch_assoc();
			return $row;                                     

		}

		public function displayServerStatus()
		{

            $query = "SELECT mode FROM usertb WHERE userTypeCode = '1' OR userTypeCode = '2'";
            $result = $this->connect()->query($query);
            $row = $result->fetch_assoc();
            $current = $row['mode'];
			return $row;                                     

		}

		public function displayFamilyInfo(){

			$data = $this->getClientInfo();
			return $data;
		}  

		public function showHistory()
		{			
			$query = "SELECT usertb.userCode, usertb.userTypeCode, activitylog.*
			FROM usertb INNER JOIN activitylog WHERE usertb.userCode = activitylog.userCode";
			$row = $this->setInfo($query);
			return $row;                                     
		}

		public function showClientInfo($id)
		{
			$query = "SELECT * FROM clienttb WHERE clientCode = '$id'";
		    $result = $this->connect()->query($query);
			$row = $result->fetch_assoc();
			$cCTR = $row['cCTR'];
			return $row;
		}

		public function getClientFamilityData($id)
		{
			$sql = "SELECT * FROM case_tb WHERE clientCode = '$id'";
			$query = $this->setInfo($sql);
			return $query;
		}

		public function displayButton($id)
		{
			$sql = "SELECT * FROM caseinfo_tb WHERE caseType = '$id' ORDER BY caseCode DESC LIMIT 1 ";
			$result = $this->connect()->query($sql);
			$row = $result->fetch_assoc();
			return $row;
		}


		public function displayStaffInfoPosition()
		{
			$sql = "SELECT * FROM activitylog ORDER BY assistanceCount DESC LIMIT 1 ";
			$result = $this->connect()->query($sql);
			$row = $result->fetch_assoc();
			return $row;
		}
	}
    
?>