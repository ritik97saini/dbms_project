<?php

session_start();
include 'dbh.inc.php';



if(isset($_POST['accept']))
{
	$sid=$_GET['sid'];
	$gid=$_GET['gid'];
	echo $sid." ".$gid;
	$sql="update group_student
		  set status=1
		  where group_id='$gid' and student_id='$sid'";
	mysqli_query($conn,$sql);
	header("Location: ../admin_tab/admin_tab.php?grpid=$gid&member=true");
}

elseif(isset($_POST['reject']))
{
	$sid=$_GET['sid'];
	$gid=$_GET['gid'];
	echo $sid." ".$gid;
	$sql="delete from group_student
		  where group_id='$gid' and student_id='$sid'";
	mysqli_query($conn,$sql);
	header("Location: ../admin_tab/admin_tab.php?grpid=$gid&member=true");
}

elseif(isset($_POST['block']))
{
	$sid=$_GET['sid'];
	$gid=$_GET['gid'];
	echo $sid." ".$gid;
	$sql="update group_student
		  set status=2
		  where group_id='$gid' and student_id='$sid'";
	mysqli_query($conn,$sql);
	header("Location: ../admin_tab/admin_tab.php?grpid=$gid&member=true");
}

elseif(isset($_POST['unblock']))
{
	$sid=$_GET['sid'];
	$gid=$_GET['gid'];
	echo $sid." ".$gid;
	$sql="update group_student
		  set status=1
		  where group_id='$gid' and student_id='$sid'";
	mysqli_query($conn,$sql);
	header("Location: ../admin_tab/admin_tab.php?grpid=$gid&member=true");
}


?>