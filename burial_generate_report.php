<?php 
include 'include/DbConnection.class.php';
include 'include/autoUser.inc.php';
include_once('fpdf/fpdf.php');

if (!isset($_POST['clientIDreport']) || (trim($_POST['clientIDreport']) == '')) {
    echo "<script> window.location.href='Index.php';</script>";
}
$getClient = new ClientView();

$result = $getClient->displayAllInfoPDF();
$case = $getClient->displayClientCaseStudy();
$caseinfo = $getClient->displayAllBURIALInfo();
$familyinfo = $getClient->displayBurialFamiliyBackground();
$recommendation = $getClient->displayBurialRecommendation();

// $pdf = new PDF();

$pdf = new PDF_Burial_Report();

$lastname = $result['lastName'];
$middlename = $result['middleName'];
$firstname = $result['firstName'];

$fullName = $lastname.", ".$middlename." ".$firstname;


//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(00, 00, 'I. Identifiying Information');
$pdf->SetFont('');
$pdf->Ln(10);

$pdf->SetFont('Arial','',11);

$pdf->Cell(50,00,'ClientCode:');
$pdf->Cell(00,00, $result['clientCode']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Name:');
$pdf->Cell(00,00, $result['firstName'] ." ". $result['middleName']." ".$result['lastName']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Age:');
$pdf->Cell(00,00, $result['age']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Birthday:');
$pdf->Cell(00,00, $result['birthDate']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Birthplace:');
$pdf->Cell(00,00,  $result['birthPlace']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Address:');
$pdf->Cell(00,00, $result['street']." ".$result['brgy']." ".$result['city']." ".$result['province']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Education Attainment:');
$pdf->Cell(00,00, $result['clientEducation']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Civil Status:');
$pdf->Cell(00,00, $result['civilStatus']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Occupation:');
$pdf->Cell(00,00, $result['clientOccupation']);

$pdf->Ln(5);

$pdf->Cell(50,00,'Contact No:');
$pdf->Cell(00,00, $result['contactNum']);

$pdf->Ln(5);

$pdf->SetFont(''); 

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50,00,'Family Composition(Mga Kasama sa bahay)');
$pdf->SetFont(''); 
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 10, 'Full Name', 1,0,'C');
$pdf->Cell(10, 10, 'Age', 1,0,'C');
$pdf->Cell(25, 10, 'Civil Status', 1,0,'C');
$pdf->Cell(35, 10, 'Relationship', 1,0,'C');
$pdf->Cell(35, 10, 'Educ. Attainment', 1,0,'C');
$pdf->Cell(34, 10, 'Occupation', 1,0,'C');
$pdf->Cell(28, 10, 'Income', 1,1,'C');
$pdf->SetFont('');  
    // $y = $pdf->GetY();
    // $pdf->Line(10,10,199,10);
    // $pdf->Line(10,10,10,200);//left
    // $pdf->Line(199,10,199,200);//right
    // $pdf->Line(10,200,199,200);
    // $pdf->Line(10,$y,199,$y);
    // $pdf->Line(50,10,50,200);//fullname
    // $pdf->Line(40,10,40,200);//age
    // $pdf->Line(77,10,77,200);//cv
    // $pdf->Line(105,10,105,200);//RS
    // $pdf->Line(141,10,141,200);//occup
    // $pdf->Line(175,10,175,200);//education

$h=8;

$z=4;
if($case->num_rows > 0) {
    while ($info = mysqli_fetch_array($case)) {
        $pdf->SetFont('Arial', '', 11);
        $y = $pdf->GetY();
        $y1 = $pdf->GetY();
        $pdf->Line(5,$y1+$h,5,$y1);//left
        $pdf->Line(40,$y1+$h,40,$y1);//between Full Name and Age
        $pdf->Line(50,$y1+$h,50,$y1);//between Age and Civil Status
        $pdf->Line(75,$y1+$h,75,$y1);//between Civil Status and Relationship
        $pdf->Line(110,$y1+$h,110,$y1);//between Relationship and Education
        $pdf->Line(145,$y1+$h,145,$y1);//between Education and Occupation
        $pdf->Line(179,$y1+$h,179,$y1);//between Occupation and Income
        $pdf->Line(207,$y1+$h,207,$y1);//right


        
        $pdf->Line(5, $y1+$h, 207, $y1+$h);
        $y = $pdf->GetY();
        $pdf->MultiCell(35,$z,$info['famName'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(35,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(10,$z,$info['famAge'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(45,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(25,$z,$info['famCivilStatus'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(70,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(35,$z,$info['famRelationship'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(105,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(35,$z,$info['famEducational'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(140,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(34,$z,$info['famOccupation'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(174,$h,'');

        $y = $pdf->GetY();
        $pdf->MultiCell(28,$z,$info['famIncome'],0,'C');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(105,$h,'');

        $pdf->Ln();
        $pdf->SetFont('');
    
    }
} else {
    $y = $pdf->GetY();
    $pdf->SetTextColor(255,0,0);
    $pdf->MultiCell(202,10,'No Record Found',1,'C');
    $pdf->SetTextColor(0);
    $y1 = $pdf->GetY();
    $pdf->SetY($y);
    $pdf->Cell(105,$h,'');
    $pdf->Ln();
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(00, 7,'II. Problem Presented');
$pdf->SetFont('');
$pdf->Ln();

if($caseinfo->num_rows > 0) {
    while ($datainfo = mysqli_fetch_array($caseinfo)) {
   
        $y = $pdf->GetY();
        $pdf->MultiCell(202,$z,$datainfo['problemPresented'],0,'L');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(00,$h,'');

        $pdf->Ln(15);
    }
} else {
    $y = $pdf->GetY();
    $pdf->SetTextColor(255,0,0);
    $pdf->MultiCell(202,10,'No Record Found',0,'C');
    $pdf->SetTextColor(0);
    $y1 = $pdf->GetY();
    $pdf->SetY($y);
    $pdf->Cell(105,$h,'');
    
}
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(00, 7,'III. Family Background');
$pdf->SetFont('');
$pdf->Ln();

if($familyinfo->num_rows > 0) {
    while ($family = mysqli_fetch_array($familyinfo)) {
   
        $y = $pdf->GetY();
        $pdf->MultiCell(202,$z,$family['familyBackground'],0,'L');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(00,$h,'');

        $pdf->Ln(15);
    }
} else {
    $y = $pdf->GetY();
    $pdf->SetTextColor(255,0,0);
    $pdf->MultiCell(202,10,'No Record Found',0,'C');
    $pdf->SetTextColor(0);
    $y1 = $pdf->GetY();
    $pdf->SetY($y);
    $pdf->Cell(105,$h,'');
    
}


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(00, 7,'IV. Recommendation');
$pdf->SetFont('');
$pdf->Ln();

if($recommendation->num_rows > 0) {
    while ($recomend = mysqli_fetch_array($recommendation)) {
   
        $y = $pdf->GetY();
        $pdf->MultiCell(202,$z,$recomend['recommendation'],0,'L');
        $y1 = $pdf->GetY();
        $pdf->SetY($y);
        $pdf->Cell(00,$h,'');

        $pdf->Ln(15);
    }
} else {
    $y = $pdf->GetY();
    $pdf->SetTextColor(255,0,0);
    $pdf->MultiCell(202,10,'No Record Found',0,'C');
    $pdf->SetTextColor(0);
    $y1 = $pdf->GetY();
    $pdf->SetY($y);
    $pdf->Cell(105,$h,'');
}

// $y = $pdf->GetY();
// $pdf->SetFont('Arial','B',10);
// $pdf->MultiCell(25,$z,'Prepared by:',1,'L');
// $pdf->Ln(7);
// $pdf->MultiCell(40,$z,'ZENAIDA S. RAMOS',1,'L');
// $pdf->SetFont('');
// $pdf->Ln(2);
// $pdf->SetFont('Arial','I',10);
// $pdf->MultiCell(30,$z,'MSWDO-CDW',1,'L');
// $pdf->SetFont('');  
// $y1 = $pdf->GetY();
// $pdf->SetY($y);
// $pdf->Cell(160,$h,'');



$date = date('Y-m-d');
$result = $result['clientCode'];
$extenstion = '.pdf';

$total = $date.", ".$result.", ".$fullName.$extenstion;

$pdf->Output('',$total);