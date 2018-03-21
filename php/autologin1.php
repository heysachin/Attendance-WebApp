<?php
	session_start();

	if($_SESSION["role"]=="student")
	{
		header("location:../billing.php");
	}

		else
		{
		header("location:../SessionAdmin.php");
		}
 ?>