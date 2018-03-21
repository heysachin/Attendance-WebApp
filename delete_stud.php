<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";
$itemName=$_POST["select"];
$sqld = "delete from student where student.rollno = $itemName";
$sqld1 = "delete from sconsumption where sconsumption.rollno = $itemName";

if ($conn->query($sqld) === FALSE){
    echo "Error: " . $sqld . "<br>" . $conn->error;
}
else
{
	echo "Roll no ".$itemName." removed successfully";

}

if ($conn->query($sqld1) === FALSE){
    echo "Error: " . $sqld . "<br>" . $conn->error;
}
else
{
	echo "Roll no ".$itemName." removed successfully";

}

$conn->close();
header('Location:new_student1.php');
?>
