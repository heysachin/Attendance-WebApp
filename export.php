<?php
include('dbcon.php');

$conn = new mysqli('localhost', 'root', 'root');
mysqli_select_db($conn, 'EmployeeDB');

//$setSql = "SELECT ur_Id,ur_username,ur_password FROM tbl_user";
//$setRec = mysqli_query($conn,$setSql);

$month = $_GET['month_select'];
$year = $_GET['year_select'];
$hostel = $_GET['hostel_select'];

$stmt=$db_con->prepare('SELECT rollno,name,SUM(tprice) from sconsumption WHERE date like "__-'.$month.'-'.$year.'" AND rollno IN(SELECT rollno FROM student WHERE hostel="'.$hostel.'") GROUP BY rollno ORDER by rollno');
$stmt->execute();


$columnHeader ='';
$columnHeader = "Roll No"."\t"."Name"."\t"."Total Bill"."\t".""."\t";


$setData='';

while($rec =$stmt->FETCH(PDO::FETCH_ASSOC))
{
  $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
}


header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Book record sheet.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo ucwords($columnHeader)."\n".$setData."\n";

?>