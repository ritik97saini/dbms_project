<?php
	
	if(isset($_POST['submit']))
	{
		include 'dbh.inc.php';

		$first=mysqli_real_escape_string($conn,$_POST['first']);
		$last=mysqli_real_escape_string($conn,$_POST['last']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
		$role=mysqli_real_escape_string($conn,$_POST['role']);
		$contact=mysqli_real_escape_string($conn,$_POST['contact']);


		//Error handlers
		if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)||empty($role) ||empty($contact) )
		{
			header("Location: ../signup.php?signup=empty");
			exit();
		}
		elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			header("Location: ../signup.php?signup=email");
			exit();
		}
		else
		{
			$sql="select * from users where user_uid='$uid';";
			$result=mysqli_query($conn,$sql);

			$resultCheck=mysqli_num_rows($result);

			if($resultCheck>0)
			{
				header("Location: ../signup.php?signup=usertaken");
				exit();
			}
			else
			{
				//hashing
				$hashPwd=password_hash($pwd,PASSWORD_DEFAULT);

				//inserting data
				$sql="insert into users(user_first,user_last,user_email, user_uid,user_pwd) values('$first','$last','$email','$uid','$hashPwd');";

				mysqli_query($conn,$sql);
				header("Location: ../signup.php?signup=success");
				exit();

			}
		}

	}
	else
	{
		header("Location: ../signup.php?signup=failure");
		exit();
	}

   ?>