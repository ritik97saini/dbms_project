<?php
session_start();

include 'dbh.inc.php';
if(!isset($_SESSION['u_uid']))
{
	header("Location: ../login.php");
	exit();
}

if(isset($_POST['group_id']))
{
	$gid=$_POST['group_id'];
	$uid=$_SESSION['u_uid'];
	$sql="select * from group_info where group_id='$gid';";
	$result=mysqli_query($conn, $sql);
	$resultlist=mysqli_num_rows($result);
	if($resultlist>0)
	{
		$sql="select * from group_student where group_id='$gid' and student_id='$uid';";
		$result=mysqli_query($conn,$sql);
		$resultlist=mysqli_num_rows($result);
		if($resultlist==0)
		{
			$sql="insert into group_student(group_id,student_id)
				  values('$gid','$uid');";
			mysqli_query($conn,$sql);
			header("Location: ../stu_tab/stu_tab.php?status=sent");
			exit();
		}
		else
		{
			header("Location: ../stu_tab/stu_tab.php?status=added");
			exit();
		}


	}
	else
	{
		header("Location: ../stu_tab/stu_tab.php?status=wrong");
		exit();
	}


}
?>