<?php

include 'dbh.inc.php';
$gid=$_GET['grpid'];

$grp_name=mysqli_real_escape_string($conn,$_POST['grp_name']);
$grp_desc=mysqli_real_escape_string($conn,$_POST['desc']);


if(strlen($grp_name)>0)
{
	$sql="update group_info
			set grp_name='$grp_name'
			where group_id='$gid';";
	mysqli_query($conn,$sql);
}

if(strlen($grp_desc)>0)
{
	$sql="update group_info
			set description='$grp_desc'
			where group_id='$gid';";
	mysqli_query($conn,$sql);
}

header("Location: ../admin_tab/admin_tab.php?grpid=$gid");
?>