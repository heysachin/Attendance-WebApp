<?php
require("connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
$itemName=$_POST["select"];
$sqld = "delete from item where item.item_name = '$itemName'";

if ($conn->query($sqld) === FALSE){
    echo "Error: " . $sqld . "<br>" . $conn->error;
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
