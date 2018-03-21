<?php
include('db_con.php');

$conn = new mysqli('localhost', 'root', '');
mysqli_select_db($conn, 'EmployeeDB');

$setSql = "SELECT `ur_Id`,`ur_username`,`ur_password` FROM `tbl_user`";
$setRec = mysqli_query($conn,$setSql);

$stmt=$db_con->prepare('select * from student');
$stmt->execute();


$columnHeader ='';
$columnHeader = "Sr NO"."\t"."Book Name"."\t"."Book Author"."\t"."Book ISBN"."\t";


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
