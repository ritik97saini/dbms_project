<?php
include 'dbh.inc.php';

if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($conn,$_POST['grp_name']);
	$desc=mysqli_real_escape_string($conn,$_POST['desc']);
echo "1";
	$sql="insert into group_info(grp_name,description,org_id) values('$name','$desc',1);";
	echo "2";
	mysqli_query($conn,$sql);
	echo "3";
	header("Location: ../admin_tab/admin_tab.php?result=success");
	echo "4";
	exit();
}

?>

