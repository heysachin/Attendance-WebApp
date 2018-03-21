<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
$itemName=$_POST["iname"];
$iprice=$_POST["price"];
//$query_insert="insert into item values('$itemName','$iprice')";
//$query_select="select * from item;";
//mysqli_query($db,$query_insert) or die('Error querying database');
//mysqli_query($conn,$query_select);
$sql = "insert into item values('$itemName','$iprice')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1 = "SELECT * FROM item";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "item name " . $row["item_name"]. " -price: " . $row["price"].  "<br>";
    }
} else {
    echo "0 results";
}
header('Location:xyz.php');
$conn->close();
?>
