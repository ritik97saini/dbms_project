<?php


session_start();


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
		$sql="select * from user_admin where admin_id='$userid'";
		$result1=mysqli_query($conn,$sql);
		$resultlist1=mysqli_num_rows($result1);
		

		$sql="select * from user_student where student_id='$userid'";
		$result2=mysqli_query($conn,$sql);
		$resultlist2=mysqli_num_rows($result2);


		if($resultlist1>0)
		{
		//  IF USER IS  AN ADMIN  


			$row=mysqli_fetch_assoc($result1);
			echo password_verify($pwd,$row['pwd']);
			if(password_verify($pwd,$row['pwd'])==1)
			{
				$_SESSION['u_first']=$row['firstname'];
				$_SESSION['u_last']=$row['lastname'];
				$_SESSION['u_uid']=$row['admin_id'];
				$_SESSION['u_email']=$row['email'];

				header("Location: ../admin_tab/admin_tab.php");
				exit();
			}
			else
			{
				header("Location: ../login.php?login=wrong");
				exit();	
			}
		}

		elseif($resultlist2>0)
		{
		//  IF USER IS A STUDNET


			$row=mysqli_fetch_assoc($result2);
			echo password_verify($pwd,$row['pwd']);
			if(password_verify($pwd,$row['pwd'])==1)
			{
				$_SESSION['u_first']=$row['firstname'];
				$_SESSION['u_last']=$row['lastname'];
				$_SESSION['u_uid']=$row['student_id'];
				$_SESSION['u_email']=$row['email'];

				header("Location: ../stu_tab/stu_tab.php");
				exit();
			}
			else
			{
				header("Location: ../login.php?login=wrong");
				exit();	
			}
		}
		else
			{
				header("Location: ../login.php?login=wrong");
				exit();	
			}
		
	}
}
