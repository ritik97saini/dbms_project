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
			$sql="select * from user_admin where admin_id='$uid';";
			$result=mysqli_query($conn,$sql);

			$resultCheck1=mysqli_num_rows($result);

			$sql="select * from user_student where student_id='$uid';";
			$result=mysqli_query($conn,$sql);

			$resultCheck2=mysqli_num_rows($result);

			if($resultCheck1>0||$resultCheck2>0)
			{
				header("Location: ../signup.php?signup=usertaken");
				exit();
			}
			else
			{
				//hashing
				$hashPwd=password_hash($pwd,PASSWORD_DEFAULT);

				//inserting data
				if($role=="admin")
				{
					$sql="insert into user_admin(firstname,lastname,email,admin_id,pwd,contact) values('$first','$last','$email','$uid','$hashPwd','$contact');";
				}
				else
				{
					$sql="insert into user_student(firstname,lastname,email, student_id,pwd,contact) values('$first','$last','$email','$uid','$hashPwd','$contact');";

				}
				
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