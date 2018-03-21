<?php
ob_start();
	session_start();

	if($_SESSION["role"]=="student")
	{
		header("location:../billing.php");
		ob_end_flush();
	}

		else
		{
		header("location:../SessionStud.php");
		ob_end_flush();
		}
 ?>
