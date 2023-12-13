<?php 

class DbConnection
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "municipal";
    
  protected $connection;
    
  public function __construct(){

  }

  public function connect() {
    if (!isset($this->connection)) {
      $this->connection = new mysqli(
        $this->host,
        $this->username,
        $this->password,
        $this->database
      );

      if (!$this->connection) {
        echo 'Cannot connect to the database server';
        exit();
      }
    }

    return $this->connection;
  }
}

?>