<?php
session_start();
require("connect.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require('fpdf.php');

class PDF extends FPDF
{
	var $Sname;
	var $SID;
	function putValue($SName,$SID){
		$SName=$SName;
		$SID=$SID;
	}
	// function Head($SName,$SID,$Title)
	// {
		
	//     $this->SetDrawColor(0,0,0);
	//     // $this->Image('images/logoPDF.png',10,6,40);
	//     $this->SetFont('Arial','B',25);
	//     $this->Cell(70);
	//     $this->Cell(100,24,$Title,1,0,'C');
	//     $this->Cell(20);
	//     $this->SetFont('Arial','B',15);
	//     $this->Cell(0.01,15,$SName);
	//     $this->Cell(0.01);
	//     $this->Cell(0.01,28,$SID);
	//     // Line break
	//     $this->Ln(20);
	//     $this->Ln(20);
	// }
	function Header()
	{
		global $SName,$SID;
		$Name='Name : '.$SName;
		$ID='ID       : '.$SID;
	    $this->SetDrawColor(0,0,0);
	    $this->Image('images/logo1.png',10,6,35);
	    $this->SetFont('Arial','B',25);
	    $this->Cell(70);
	    $this->Cell(100,24,'Students Record',1,0,'C');
	    $this->Cell(30);
	    $this->SetFont('Arial','B',17);
	    $this->Cell(0.01,15,$Name);
	    $this->Cell(0.01);
	    $this->Cell(0.01,28,$ID);
	    // Line break
	    $this->Ln(20);
	    $this->Ln(20);
	}
	function FancyTable($heading, $data)
	{
	    $this->SetFont('Arial','B',25);
	    $this->Cell(0,15,"Attendance Record",0,0,'C');
	    $this->Ln();

	    // Colors, line width and bold font
	    $this->SetFillColor(255,0,0);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B',15);
	    // heading
	    $w = array(150, 40, 40, 40);


	    $this->Cell(3);
	    for($i=0;$i<count($heading);$i++)
	        $this->Cell($w[$i],10,$heading[$i],1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('','',18);
	    // Data
	    $fill = false;
	    foreach($data as $row)
	    {
	    	$this->Cell(3);
	        $this->Cell($w[0],14,$row[0],'LR',0,'L',$fill);
	        $this->Cell($w[1],14,number_format($row[1]),'LR',0,'C',$fill);
	        $this->Cell($w[2],14,number_format($row[2]),'LR',0,'C',$fill);
	        $this->Cell($w[3],14,$row[3],'LR',0,'C',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(3);
	    $this->Cell(array_sum($w),0,'','T');
	}

	function FancyTableMarks($heading, $data)
	{
		$this->SetFont('Arial','B',25);
	    $this->Cell(0,15,"Internals Record",0,0,'C');
	    $this->Ln();
	    // Colors, line width and bold font
	    $this->SetFillColor(255,0,0);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B',15);
	    // heading
	    $w = array(150, 40, 40);
	    $this->Cell(20);
	    for($i=0;$i<count($heading);$i++)
	        $this->Cell($w[$i],10,$heading[$i],1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('','',18);
	    // Data
	    $fill = false;
	    foreach($data as $row)
	    {	
	    	$this->Cell(20);
	        $this->Cell($w[0],14,$row[0],'LR',0,'L',$fill);
	        $this->Cell($w[1],14,number_format($row[1]),'LR',0,'C',$fill);
	        $this->Cell($w[2],14,number_format($row[2]),'LR',0,'C',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(20);
	    $this->Cell(array_sum($w),0,'','T');
	}
}
$SID = $_SESSION['id'];
$SName = $_SESSION['name'];

$sql = "select sb.Sid SubID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
    	
        $SubID = $row["SubID"];
        $SubName = $row["SubID"]." - ".$row["SubName"];
        $sql1 = "Select sum(Total) TC , sum(Missed) MC from attendance where SubId = '$SubID' and StudId = '$SID' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {

            	if ($row1["TC"]==0) {
            		$percent = 100;
            	}else
            	{
                $percent=($row1["TC"]-$row1["MC"])/$row1["TC"]*100;

            	}
            	$percent .= '%';

                $data[] = array($SubName,$row1["TC"],$row1["MC"],$percent);                
            }
        }
    }
  // echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
}





$pdf = new PDF('L','mm','A4');

$heading = array('Subject', 'Total', 'Missed', 'Percentage');
$pdf->putValue($SName,$SID);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
// $pdf->Head($Name,$ID,'Attendance Report');
$pdf->FancyTable($heading,$data);

$data=array();

$sql = "select sb.Sid SubID, sb.Sname SubName from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and st.StudId LIKE '$SID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $SubID = $row["SubID"];
        $SubName = $row["SubID"]." - ".$row["SubName"];
        $sql1 = "Select InternalNo,Marks from internals where SubId = '$SubID' and StudId = '$SID' ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {

            while($row1 = $result1->fetch_assoc()) {
            	//print_r($row1);
                $data[] = array($SubName,$row1["InternalNo"],$row1["Marks"]);                
            }
        }
    }
  // echo "<div class='alert alert-primary text-right' role='alert'>Total price is ". $row1["sum(tprice)"]."</div>";
}
$heading = array('Subject', 'Internal No.', 'Marks');

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
// $pdf->Head($Name,$ID,'Internals Report');
$pdf->FancyTableMarks($heading,$data);
$filename="pdf/".$SID.".pdf";
$pdf->Output();
// $pdf->Output($filename,'F');
?>