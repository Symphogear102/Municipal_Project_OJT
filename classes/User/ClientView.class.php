<?php

class ClientView extends Client {

    public function __construct(){

        parent::__construct();
    }
    
    //Checking login in user
    public function displayClientInfo(){

        $data = $this->getClientInfo();
        return $data;
    }  

    public function displayAllUserInfo(){

        $data = $this->displayAllUser();
        return $data;
    }  

    public function displaySpecUserInfo(){

        $data = $this->displaySpecificUser();
        return $data;
    }  

    public function displayAllInfoPDF(){

        $data = $this->displayClientPDF();
        return $data;
    }

    public function displayAllCASEInfo(){

        $data = $this->displayClientCaseInfo();
        return $data;
    }

    public function displayAllBURIALInfo(){

        $data = $this->displayBurial();
        return $data;
    }
    //FOOD

    public function displayAllFOODInfo(){

        $data = $this->displayFood();
        return $data;
    }
}