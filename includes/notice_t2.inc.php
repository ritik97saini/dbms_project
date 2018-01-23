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
	$type=2;
	$heading=mysqli_real_escape_string($conn,$_POST['heading']);
	$des=mysqli_real_escape_string($conn,$_POST['description']);
	$job_type=mysqli_real_escape_string($conn,$_POST['job_type']);
	$ctc=mysqli_real_escape_string($conn,$_POST['ctc']);
	$deadline=mysqli_real_escape_string($conn,$_POST['deadline']);
	$aggregate=mysqli_real_escape_string($conn,$_POST['aggregate']);
	$branches=$_POST['branches'];
	if(empty($heading)||empty($des)||empty($job_type)||empty($deadline)||empty($branches)||empty($aggregate))
	{
		header("Location: ../admin_tab/add_notice.php?gid=$gid&status=error");
		exit();
	}
	elseif(strlen($heading)>256||strlen($des)>1024||strlen($job_type)>256)
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
		$b_list="0000000";
		foreach($branches as $t)
		{
			$b_list[$t]='1';
		}
		$sql="insert into notice(group_id,notice_id,created_on,type) values('$gid','$nid',CURDATE(),'$type');";
		mysqli_query($conn,$sql);
		$sql="insert into notice_2(notice_id,heading,description,job_type,ctc,deadline,branches,aggregate) values('$nid','$heading','$des','$job_type','$ctc','$deadline','$b_list','$aggregate');";
		mysqli_query($conn,$sql);
		header("Location: ../admin_tab/add_notice.php?gid=$gid&status=success");
		exit();
	}
}
?>
