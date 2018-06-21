<?php
	require("connect.php");
	$StudId=$_GET['StudId'];
	$SIndex=$_GET['SIndex'];
	$First=$_POST['1'];
	$Second=$_POST['2'];
	$Third=$_POST['3'];
	$Retest=$_POST['4'];
	$sql="UPDATE internals
        SET First=$First,Second=$Second,Third=$Third,Retest=$Retest
        where SIndex = $SIndex and StudId = '$StudId'";
        $conn->query($sql);
        echo mysqli_error($conn);
	header("location:../report.php");
?>