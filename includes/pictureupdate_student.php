<?php

session_start();

if(isset($_POST['submit'])&&isset($_SESSION['u_uid']))
{
	include 'dbh.inc.php';
	
	$resumefile=$_FILES['picture'];
	$filename=$resumefile['name'];
	$filetype=$resumefile['type'];
	$filetmpname=$resumefile['tmp_name'];
	$fileerror=$resumefile['error'];
	$filesize=$resumefile['size'];


	if($fileerror === 0)
	{
		$temp=explode(".", $filename);
		$fileext=strtolower(end($temp));
		$allowed=array('jpg','jpeg','png');
		if(in_array($fileext, $allowed))
		{

			if($filesize< 2*1000*1000)
			{
				$filenewname=$_SESSION['u_uid']."#pic.".$fileext;
				$filedest="../stu_tab/uploads/profile_pic/".$filenewname;
				move_uploaded_file($filetmpname, $filedest);
				$uid=$_SESSION['u_uid'];
				$sql="update user_student
					  set profilepic_status=1
					  where student_id=	'$uid';";
				mysqli_query($conn,$sql);
				header("Location: ../stu_tab/user_profile.php?status=success");
				exit();

			}
			else
			{
				header("Location: ../stu_tab/user_profile.php?status=pic_size");
				exit();
			}
		}
		else
		{
			header("Location: ../stu_tab/user_profile.php?status=pic_type");
			exit();			
		}

	}
	else
	{
		header("Location: ../stu_tab/user_profile.php?status=pic_error");
		exit();
	}
}
	