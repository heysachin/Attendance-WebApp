<?php
require("connect.php");
print_r($_POST["roll_no"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
echo "connected";

}
foreach ($_POST['roll_no'] as $rollno)
{
//$rollno=$_POST["roll_no"];
$sql2="select name from student where rollno='$rollno'";
$result1 = $conn->query($sql2);
$row2 = $result1->fetch_assoc();
$name=$row2["name"];
$itemname=$_POST["item"];
$quantity=$_POST["quantity"];
if ($quantity == '')
{
	
	$quantity=1;
}
$sql1="select price from item where item_name='$itemname'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$price=$row["price"];
$date=$_POST["date"];
//$hostel=$_POST["hostel"];
$sql="insert into sconsumption values('$rollno','$date','$quantity'*'$price','$name','$itemname')";
$conn->query($sql);
}
$conn->close();
header('Location: consumption.php');
?>
