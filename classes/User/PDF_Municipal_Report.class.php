<?php
class PDF_Municipal_Report extends FPDF
{
   private $host = "localhost";
   private $username = "root";
   private $password = "";
   private $database = "municipal";

   protected $connection;
    
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
  
  function __construct() {
    parent::__construct();
    // $this->SetTopMargin(37);
    $this->SetAutoPageBreak(true, 45);
    $this->Ln();
    $this->SetMargins(5, 55, 35, 5);
 }
    
// Page header
public function Header()
{
    // Logo.
    $this->Image('img/template.png',00,00,210, 297);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(160);
    $this->SetFont('Arial','',11);
    $this->Cell(00,00,date('F jS, Y'));
    $this->SetFont('');
    $this->Cell(0);
    // Title
    //$this->Cell(80,10,'Students List',1,0,'C');
    // Line break 
    $this->SetFont('Arial','B',13);
    $this->Ln();
	  $this->Cell(120,00,'Social Case Study',0,0,0);
    $this->SetFont('');
	  $this->Ln(7);

    // $this->SetFont('Arial', 'B', 10);
    // $this->Cell(25, 150, 'Full Name', 0,0,'C');
    // $this->Cell(21, 150, 'Age', 0,0,'C');
    // $this->Cell(16, 150, 'Civil Status', 0,0,'C');
    // $this->Cell(35, 150, 'Relationship', 0,0,'C');
    // $this->Cell(35, 150, 'Educ. Attainment', 0,0,'C');
    // $this->Cell(34, 150, 'Occupation', 0,0,'C');
    // $this->Cell(25, 150, 'Income', 0,1,'C');
    // $y = $this->GetY();
    // $this->Line(10,10,199,10);
    // $this->Line(10,10,10,200);//left
    // $this->Line(199,10,199,200);//right
    // $this->Line(10,200,199,200);
    // $this->Line(10,$y,199,$y);
    // $this->Line(50,10,50,200);//fullname
    // $this->Line(40,10,40,200);//age
    // $this->Line(77,10,77,200);//cv
    // $this->Line(105,10,105,200);//RS
    // $this->Line(141,10,141,200);//occup
    // $this->Line(175,10,175,200);//education
}

// Page footer
public function Footer()
{
    $sql = "SELECT * FROM activitylog ORDER BY assistanceCount DESC LIMIT 1 ";
      $result = $this->connect()->query($sql);
      $row = $result->fetch_assoc();

      $staffname = $row['nameofStaff'];
      $staffPosition = $row['staffPosition'];
    // Position at 1.5 cm from bottom


    $this->SetY(260);
    $this->SetFont('Arial','B',10);
    $this->Cell(34, 12, 'Prepared by:', 0,0,'L');
    $this->Cell(247, 12, 'Assessed by:', 0,1,'C');
    $this->SetFont('');
    
    $this->Ln(1);
    
    $this->SetFont('Arial','B',10);
    $this->Cell(45, 5, strtoupper($staffname), 0,0,'L');
    $this->Cell(250, 5, 'REYGIE A. CABUCOS - RSW', 0,1,'C');
    $this->SetFont('');
    
    $this->SetFont('Arial','I',10);
    $this->Cell(34, 5, strtoupper($staffPosition), 0,0,'L');
    $this->Cell(257, 5, 'License no. 0026327', 0,1,'C');
    $this->Cell(313, 3, 'MSWDO-OIC', 0,1,'C');
    $this->SetFont('');
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
	// Position at 2.0 cm from bottom
    $this->SetY(-20);
    // Arial italic 8
    $this->SetFont('Arial','B','I',8);
    // Page number
    // $this->Cell(0,10,'https://technopoints.co.in',0,0,'C');
}
}
?>