<?php

if(isset($_POST['submit']))
{
	include 'dbh.inc.php';

	$userid=mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

	if(empty($userid)||empty($pwd))
	{
		header("Location: ../login.php?login=empty");
		exit();
	}
	else
	{
		$sql="select * from users where user_uid='$userid'";
		$result=mysqli_query($conn,$sql);
		$resultlist=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		echo password_verify($pwd,$row['user_pwd']);
		if($resultlist>0 and password_verify($pwd,$row['user_pwd'])==1)
		{
			$_SESSION['u_first']=$row['user_first'];
			$_SESSION['u_last']=$row['user_last'];
			$_SESSION['u_uid']=$row['user_uid'];
			$_SESSION['u_email']=$row['user_email'];

			header("Location: ../new.php");
			exit();
		}
		else
		{
			header("Location: ../login.php?login=wrong");
			exit();	
		}
		
	}
}
