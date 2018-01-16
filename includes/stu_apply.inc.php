<?php
if(!isset($_SESSION['u_uid']))
{
	session_unset();
	session_destroy();
	header("Location: ../login.php");
	exit();
}

include 'dbh.inc.php';
if(isset($_POST['submit'])
{
	$gid=$_POST['gid'];
	$nid=$_POST['nid'];
	$sid=$_SESSION['u_uid'];
	
	$sql="select * user_student where student_id=$sid;";
	$res=mysqli_query($conn,$sql);
	$stu_data=mysqli_fetch_assoc($res);
	$sql="select * notice_t2 where notice_id=$nid;";
	$res=mysqli_query($conn,$sql);
	$n_data=mysqli_fetch_assoc($res);
	if($n_data['branches'][$stu_data['branch']]=='1' && $stu_data['be_percentage']>=$n_data['aggregate'] )
	{
		$sql="select DATEDIFF(CURDATE(),".$n_data['deadline'].");";
		$res=mysqli_query($conn,$sql);
		$diff=mysqli_fetch_assoc($res);
		if(diff>0)
		{
			$sql="select * from applied where notice_id=$nid and student_id=$sid";
			$res=mysqli_query($conn,$sql);
			$rlist=mysqli_num_rows($res);
			if($rlist==0)
			{
				$sql="insert into applied(notice_id,student_id) values('$nid','$sid');
				mysqli_query($conn,$sql)";

			}
			else
			{
				header("Location: ../stu_tab/stu_tab.php?grp=$gid&status=alreadyapplied");
				exit();
			}
		}
		else
		{
			header("Location: ../stu_tab/stu_tab.php?grp=$gid&status=deadline");
			exit();
		}
		
	}
	else
	{
		header("Location: ../stu_tab/stu_tab.php?grp=$gid&status=notelligible");
		exit();
	}
		

}

?>