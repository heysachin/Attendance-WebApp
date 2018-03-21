<?php
		
	if(!isset($_POST["password"] ) && !isset($_POST["email"]))
	{
		header("location:../index.php");
	}


	require("connect.php");
	

	$user=$_POST["email"];
	$pass=$_POST["password"];
	$sql="SELECT name,rollno,password FROM student WHERE rollno='$user' AND Password='$pass'";
	$res=mysqli_query($db,$sql);
	
	if(mysqli_num_rows($res) == 1)
	{
		$row = mysqli_fetch_assoc( $res );
		session_start();
		$_SESSION['user']=$user;
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['rollno'];
		$_SESSION['role']="student";

		header('Location:../billing.php');
		

		
	}
	else
	{
		header('Location:../PasswordIncorrect.php');
	}



	?>