<?php
include 'dbh.inc.php';
session_start();

if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($conn,$_POST['grp_name']);
	$desc=mysqli_real_escape_string($conn,$_POST['desc']);
echo "1";
    $orgid=$_SESSION['u_uid'];
	$sql="insert into group_info(grp_name,description,admin_id,created_on) values('$name','$desc','$orgid',CURDATE());";
	echo "2";
	mysqli_query($conn,$sql);
	echo "3";
	header("Location: ../admin_tab/admin_tab.php?result=success");
	echo "4";
	exit();
}

?>

