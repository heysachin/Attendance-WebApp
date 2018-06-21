<?php
session_start();
require("connect.php");
$Tid=$_SESSION['id'];
$sub = $_POST['subject'];
$exam = $_POST['internal_select'];
$sql = "select st.Fname FN,st.Lname LN, sb.Sid ,st.StudId from student st,subjects sb where st.Sem=sb.Sem and st.Dept=sb.Dept and sb.SIndex LIKE '$sub'";
$result = $conn->query($sql);
$i=0;
$m=$_POST['marks'];

foreach ($_POST['marks'] as $mark){

$row=$result->fetch_assoc();

$sqlTest="SELECT * FROM internals where SIndex='$sub'";
$resultTest=mysqli_query($conn,$sqlTest);
$rows_Test = mysqli_num_rows($resultTest);
if ($rows_Test == 0){
	$sql1="INSERT INTO `internals` (`SIndex`, `StudID`, `$exam`) VALUES('$sub','$row[StudId]',$mark)";
}
else{

	$sql1="UPDATE internals set `SIndex` = '$sub', `StudID`='$row[StudId]', `$exam` = $mark where `SIndex` = '$sub' and `StudID`='$row[StudId]'";


}
$i++;
mysqli_query($conn,$sql1);
echo mysqli_error($conn);
}
header('Location: ../internals.php');


?>


