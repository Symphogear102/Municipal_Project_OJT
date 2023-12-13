<?php

    class UsersView extends User {
        
        public function displayUser()
        {
            $sql = "SELECT * FROM usertb WHERE userCode = '".$_SESSION['user']."'";
            $row = $this->getDetails($sql);
            return $row;
        }

        public function getProfile($editId) {
            if(isset($_GET['editId']) && !empty($_GET['editId'])) {
                $editId = $_GET['editId'];
                $update = $this->displayRecordById($editId);
                if ($update) {
                    header('location: A_Profile.php');
                    exit(0);
                }
            }
        }

        public function displayRecordById($editId)
        {
            $query = "SELECT * FROM usertb WHERE userCode = '$editId'";
		    $result = $this->connect()->query($query);
            $row = $this->getDetails($query);
			return $row;
		}

        public function countRow() 
        {
            $sql = "SELECT * from usertb";
            $result = $this->connect()->query($sql);
            $rowcount = mysqli_num_rows( $result );
            return $rowcount;
        }        

        public function countClientRow() 
        {
            $sql = "SELECT * from clienttb";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }    
        
        
        public function countClientRowMale() 
        {
            $sql = "SELECT * from clienttb WHERE gender = 'M'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  
        
        
        public function countClientRowFemale() 
        {
            $sql = "SELECT * from clienttb WHERE gender = 'F'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  

        public function countFoodRow() 
        {
            $sql = "SELECT * from caseinfo_tb WHERE caseType = '4'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  

        public function countMedicalRow() 
        {
            $sql = "SELECT * from caseinfo_tb WHERE caseType = '3'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  

        public function countBurialRow() 
        {
            $sql = "SELECT * from caseinfo_tb WHERE caseType = '2'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  

        public function countFinancialRow() 
        {
            $sql = "SELECT * from caseinfo_tb WHERE caseType = '1'";
            $result = $this->connect()->query($sql);
            $clientCountRow = mysqli_num_rows( $result );
            return $clientCountRow;
        }  
        
}    