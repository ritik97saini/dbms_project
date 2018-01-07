<?php

session_start();

// $_SESSION['u_uid']="v.agarwal";
if(isset($_POST['submit'])&&isset($_SESSION['u_uid']))
{
	include 'dbh.inc.php';

	$first=mysqli_real_escape_string($conn,$_POST['first_name']);
	$last=mysqli_real_escape_string($conn,$_POST['last_name']);
	$day=mysqli_real_escape_string($conn,$_POST['birth_day']);
	$month=mysqli_real_escape_string($conn,$_POST['birth_month']);
	$year=mysqli_real_escape_string($conn,$_POST['birth_year']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$contact=mysqli_real_escape_string($conn,$_POST['mob_no']);
	$gender=mysqli_real_escape_string($conn,$_POST['gender']);
	$branch=mysqli_real_escape_string($conn,$_POST['branch']);
	$x_percent=mysqli_real_escape_string($conn,$_POST['x_percent']);
	$xii_percent=mysqli_real_escape_string($conn,$_POST['xii_percent']);
	$be_percent=mysqli_real_escape_string($conn,$_POST['be_percent']);
	$passing_year=mysqli_real_escape_string($conn,$_POST['passing_year']);
	$college=mysqli_real_escape_string($conn,$_POST['college']);



	$resumefile=$_FILES['resume'];
	$filename=$resumefile['name'];
	$filetype=$resumefile['type'];
	$filetmpname=$resumefile['tmp_name'];
	$fileerror=$resumefile['error'];
	$filesize=$resumefile['size'];
	if(empty($first)||empty($last)||empty($day)||empty($month)||empty($year)||empty($contact)||empty($gender)||empty($branch)||empty($x_percent)||
	   empty($xii_percent)||empty($be_percent))
	{
		header("Location: ../stu_tab/stu_det.php?error=empty");
		exit();
	}


	/*	| 
		|
		|
		ADD ERROR HANDLERS	
		|
		| 
		|
	*/
	else
	{
		if($fileerror === 0)
		{
			$temp=explode(".", $filename);
			$fileext=strtolower(end($temp));
			$allowed=array('pdf');
			if(in_array($fileext, $allowed))
			{

				if($filesize< 2*1000*1000)
				{
					$filenewname=$_SESSION['u_uid']."#resume.".$fileext;
					$filedest="../uploads/resume/".$filenewname;
					move_uploaded_file($filetmpname, $filedest);
				

					$dob=$year."-".$month."-".$day;
				
					$uid=$_SESSION['u_uid'];
					$sql="update user_student
					set firstname='$first',lastname='$last',email='$email',dob='$dob',gender='$gender',organisation='$college',branch='$branch',passing_year='$passing_year',x_percentage='$x_percent',xii_percentage='$xii_percent',be_percentage='$be_percent',resume_status=1
					where student_id='$uid';
					";
					mysqli_query($conn,$sql);
					header("Location: ../stu_tab/user_profile.php?error=file_size");
					exit();

				}
				else
				{
					header("Location: ../stu_tab/stu_det.php?error=file_size");
					exit();
				}
			}
			else
			{
				header("Location: ../stu_tab/stu_det.php?error=file_type");
				exit();
			}

		}
		else
		{
			header("Location: ../stu_tab/stu_det.php?error=file_error");
			exit();
		}
	}

	

}

?>
