<?php
require("connect.php");
// print_r($_POST["StudId"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
echo "connected";

}
print_r($_POST);

foreach ($_POST['StudId'] as $StudId)
{

$sub=$_POST["subject"];


$date=$_POST["date"];
$Tid="CSE003";
$sql="insert into attendance values('$Tid','$sub','$StudId',1,1,'$date')";
echo $sql;
$conn->query($sql);
echo mysqli_error($conn);
}
$conn->close();
header('Location: attendance.php');
?>
