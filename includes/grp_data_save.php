<?php
include 'dbh.inc.php';
session_start();

function random_str($length)
{
	$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	return substr(str_shuffle(str_repeat($str, ceil($length/strlen($str)) )),0,$length);
}
if(isset($_POST['submit']))
{
	$name=mysqli_real_escape_string($conn,$_POST['grp_name']);
	$desc=mysqli_real_escape_string($conn,$_POST['desc']);
	$orgid=$_SESSION['u_uid'];
	$same=True;
	$gid="";
	while($same)
	{
		$gid=random_str(5);
		$sql="select * from group_info where group_id='$gid'; ";
		$result=mysqli_num_rows(mysqli_query($conn,$sql));
		if($result==0)
		{
			$same=False;
		}
	}
	$sql="insert into group_info(group_id,grp_name,description,admin_id,created_on) values('$gid','$name','$desc','$orgid',CURDATE());";
	echo "2";
	mysqli_query($conn,$sql);
	echo "3";
	header("Location: ../admin_tab/admin_tab.php?result=success");
	echo "4";
	exit();
}

?>

