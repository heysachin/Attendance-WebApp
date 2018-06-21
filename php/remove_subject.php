<?php
	require("connect.php");
	session_start();
	$Tid=$_SESSION['id'];
	$Sid = $_GET['sub_id'];
	$sql="DELETE from attendance where `SIndex`=$Sid";
	$conn->query($sql);
    echo mysqli_error($conn);
    $sql="DELETE from internals where `SIndex`=$Sid";
	$conn->query($sql);
    echo mysqli_error($conn);
	$sql="DELETE from subjects where `SIndex`=$Sid";
    $conn->query($sql);
    echo mysqli_error($conn);
	header("location:../edit_subjects.php");
?>