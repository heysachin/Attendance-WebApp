<?php
	require("connect.php");
	$StudId=$_GET['StudId'];
	$SIndex=$_GET['SIndex'];
	$Missed=$_POST['Missed'];
	$Date=$_GET['Date'];
	$sql="UPDATE attendance
        SET Missed = $Missed
        where SIndex = '$SIndex' and StudId = '$StudId' and date = '$Date'";
        $conn->query($sql);
        echo mysqli_error($conn);
	header("location:../report.php");
?>