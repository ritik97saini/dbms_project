<?php

session_start();


if(isset($_POST['submit']))
{
	include 'dbh.inc.php';

	$first=mysqli_real_escape_string($conn,$_POST['first_name']);
	$last=mysqli_real_escape_string($conn,$_POST['last_name']);
	// $day=mysqli_real_escape_string($conn,$_POST['birth_day']);
	$month=mysqli_real_escape_string($conn,$_POST['birth_month']);
	$year=mysqli_real_escape_string($conn,$_POST['birth_year']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$contact=mysqli_real_escape_string($conn,$_POST['mob_no']);
	$gender=mysqli_real_escape_string($conn,$_POST['gender']);
	$branch=mysqli_real_escape_string($conn,$_POST['branch']);
	$x_percent=mysqli_real_escape_string($conn,$_POST['x_percent']);
	$xii_percent=mysqli_real_escape_string($conn,$_POST['xii_percent']);
	$be_percent=mysqli_real_escape_string($conn,$_POST['be_percent']);



	$resumefile=$_FILES['resume'];
	$filename=$resumefile['name'];
	$filetype=$resumefile['type'];
	$filetmpname=$resumefile['tmp_name'];
	$fileerror=$resumefile['error'];
	$filesize=$resumefile['size'];
	print_r($resumefile);

	if(empty($first)||empty($last)||empty($day)||empty($month)||empty($year)||empty($contact)||empty($gender)||empty($branch)||empty($x_percent)||empty($xii_percent)||empty($be_percent))
	{
		header("Location: ../stu_dent.php?error=empty");
		exit();
	}
	else
	{
		if($fileerror === 0)
		{
			$fileext=explode(".", $filename);
			$fileext=strtolower($fileext);
			echo $fileext;
			$allowed=['pdf'];
			if(in_array($fileext, $allowed))
			{

				if($filesize< 2*1000*1000)
				{
					$filenewname=$_SESSION['u_uid']."#resume.".$fileext;
					$filedest="uploads/resume/".$filenewname;
					move_uploaded_file($filetmpname, $filedest);
				}
			}
			else
			{
				header("Location: ../stu_dent.php?error=file_type");
				exit();
			}

		}
		else
		{
			header("Location: ../stu_dent.php?error=file_error");
			exit();
		}
	}

	

}

?>
