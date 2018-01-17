<?php
session_start();
if(!isset($_SESSION['u_uid']))
{
	session_unset();
	session_destroy();
	header("Location: ../login.php");
	exit();
}
function random_str($length)
{
	$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/><(*&^%$@!+-|";
	return substr(str_shuffle(str_repeat($str, ceil($length/strlen($str)) )),0,$length);
}
if(isset($_POST['submit']))
{
	include 'dbh.inc.php';
	$gid=$_GET['gid'];
	$type=1;
	$heading=mysqli_real_escape_string($conn,$_POST['heading']);
	$des=mysqli_real_escape_string($conn,$_POST['description']);
	if(empty($heading)||empty($des))
	{
		header("Location: ../admin_tab/add_notice.php?gid=$gid&status=error");
		exit();
	}
	elseif(strlen($heading)>256||strlen($des)>1024)
	{
		header("Location: ../admin_tab/add_notice.php?gid=$gid&status=length");
		exit();
	}
	else
	{
		$nid="";
		while(True)
		{
			$str=random_str(7);
			$sql="select * from notice where notice_id=$nid";
			$res=mysqli_query($conn,$sql);
			$len=mysqli_num_rows($res);
			if($len==0)
			{
				$nid=$str;
				break;
			}	
		}
		$sql="insert into notice(group_id,notice_id,created_on,type) values('$gid','$nid',CURDATE(),'$type');";
		mysqli_query($conn,$sql);
		$sql="insert into notice_1(notice_id,heading,description) values('$nid','$heading','$des');";
		mysqli_query($conn,$sql);
		header("Location: ../admin_tab/add_notice.php?gid='$gid'&status=success");
		exit();
	}
}
?>