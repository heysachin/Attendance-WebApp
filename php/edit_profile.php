<?php
	
	require("connect.php");
	session_start();
	$Tid=$_SESSION['id'];
	$username=$_POST['username'];
	$Fname=$_POST['Fname'];
	$Lname=$_POST['Lname'];
	$Email=$_POST['Email'];
	$Position=$_POST['Position'];
	$dept=$_POST['dept'];
	$old_pass=$_POST['old_pass'];
	$new_pass=$_POST['new_pass'];
	if ($new_pass == ''){
		$sql=mysqli_query($conn, "SELECT * from teacher where `Tid` = '$Tid'");
        $row = mysqli_fetch_array($sql);
        if ($old_pass == $row['Password']){
			$sql1="UPDATE teacher set `Tid` = '$username', `Fname`='$Fname', `Lname` = '$Lname', `Email`='$Email', `Dept` = $dept, `Position`='$Position' where `Tid` = '$Tid'";
			$conn->query($sql1);
        	echo mysqli_error($conn);
        }else{
        	echo "Current Password Wrong";
        }
	}else{
		$sql=mysqli_query($conn, "SELECT * from teacher where `Tid` = '$Tid'");
        $row = mysqli_fetch_array($sql);
        if ($old_pass == $row['Password']){
			$sql1="UPDATE teacher set `Tid` = '$username', `Fname`='$Fname', `Lname` = '$Lname', `Email`='$Email', `Dept` = $dept, `Position`='$Position' ,`Password` = '$new_pass' where `Tid` = '$Tid'";
			$conn->query($sql1);
        	echo mysqli_error($conn);
        }else{
        	echo "Current Password Wrong";
        }
	}
header("location:logout1.php");
?>