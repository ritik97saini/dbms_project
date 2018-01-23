<?php
session_start();
if(!isset($_SESSION['u_uid']))
{
	header("Location: ../login.php");
	exit();
}
include '../includes/dbh.inc.php';
?>


<!DOCTYPE html>
<!-- Template by html.am -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Student Tab &mdash; Left Menu with Header &amp; Footer</title>
		<link rel="stylesheet" href="stu_tab.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>


        <div style="position: fixed; width: 100%;">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Winter Training Project</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="stu_tab.php">Home</a></li>
                        <li><a href="user_profile.php">Profile</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../includes/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
                    </ul>

                </div>
            </nav>
        </div> 
        
<?php
        
        $student=$_SESSION['u_uid'];
        
        $sql4="SELECT group_id FROM group_student where student_id='$student';";
		$query4=mysqli_query($conn,$sql4);
		$row4=mysqli_fetch_assoc($query4);
        $id1=$row4['group_id'];
        
        if(!empty($_GET['grp']))
        $id1=$_GET['grp'];
		$sql2="SELECT grp_name FROM group_info where group_id='$id1';";
		$query2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_assoc($query2);
?>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
<?php
                        
                        if(isset($_GET['grp'])) 
                        {
                            $gid = $_GET['grp'];
                        }
                        else 
                            $gid=$id1;
                        $sql="select * from group_info where group_id='$gid';";
						$result=mysqli_query($conn,$sql);
						$resultlist=mysqli_num_rows($result);
                        $row = mysqli_fetch_assoc($result);
                            
?>
                        <br><br><br>
                        <div style = "color: white; background-color: #9f0099; position:fixed; text-align: center;  width:85%; font-size: 40px; font-weight: bold; padding: 10px; ">
                             <?php echo $row['grp_name'] ;?>
                        </div>';
                       
                       <br><br><br><br><br>

                        <div id="navi" style="position: fixed; width:85%;">
                            <center>    
                                <button type="button" class="btn" id="info">INFO</button>
                                <button type="button" class="btn" id="post">POSTS</button>
                            </center>
                        </div>

                        <style>
                            
                            .grp_table {
                                margin-left: 200px;
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 60%;
                            }
                            .grp_td {
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                            .grp_tr:nth-child(even) {
                                background-color: #dddddd;
                            }
                            
                        </style>


                        
                        <div id="disp_info" style="display:none;">
                                <br><br><br>
                            
                                <table class = "grp_table">
            
                                      <tr class = "grp_tr">
                                        <td class = "grp_td">Group Name</td>
                                        <td class = "grp_td"><?php echo $row['grp_name'];?></td>
                                      </tr>

                                      <tr class = "grp_tr">
                                        <td class = "grp_td">Group Code</td>
                                        <td class = "grp_td"><?php echo $row['group_id'];?></td>
                                      </tr>

                                      <tr class = "grp_tr">
                                        <td class = "grp_td">Description</td>
                                        <td class = "grp_td"><?php echo $row['description']; ?></td>
                                      </tr>

                                      <tr class = "grp_tr">
                                        <td class = "grp_td">Created On</td>
                                        <td class = "grp_td"><?php echo $row['created_on']; ?></td>
                                      </tr>
                                      
                                </table>

                                <?php 
                                    
                            
                                    if(isset($_GET['leave'])) { 
                                        $lgid=$_GET['leave'];
                                        $sql5="delete from group_student where group_id='$lgid' and student_id='$student' ;";
                                        mysqli_query($conn,$sql5);
                                        unset($_GET['leave']);
                                    }
                                ?>
                                <br><br>
                                <center>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                    <button class="btn"  name="leave" value="<?php echo $gid;?>" >Leave Group</button>    
                                </form>
                                </center>

                        </div>




                            
                        <div id="notice" style="margin-top:80px; ">
                            
                            <div id="disp_post"  >
<?php 

                                $sql="select * from group_student where group_id='$gid' and student_id='$student' ;";
                                $res=mysqli_query($conn,$sql);
                                $result=mysqli_fetch_assoc($res);
                                if($result['status']==1)
                                {
        							$sql1="SELECT notice_id,type FROM notice  where group_id='$id1' order by created_on desc;";
        							$query1=mysqli_query($conn,$sql1);
                                    
        							while ($row1=mysqli_fetch_assoc($query1)) 
                                    {
                                         $notice=$row1['notice_id'];
                                       if($row1['type']==1)
                                        {
                                            $sql2="select * from notice_1 where notice_id='$notice';";
                                            $query2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($query2);
?>
                                            <div style="background-color: #ff9975;
                                                border:10px;
                                                margin: 50px 10px 10px 10px;
                                                border-color:cyan ;
                                                padding-top: 10px;
                                                border-radius: 20px;
                                                align-content: center;
                                                padding-left:70px;
                                                padding-right:50px;
                                                padding-bottom:15px;
                                                 
                                                ">
                                                <pre class="heading"> <?php echo $row2['heading'];?></pre>
                                                <pre class="heading" >  <?php echo $row2['description']; ?></pre>
                                                                  
                                                                 
                                            </div> 
                                                                                     
<?php                                                     
                                        }
                                        else
                                        {
                                            $sql2="select * from notice_2 where notice_id='$notice';";
                                            $query2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($query2); 
?>
                                                                                     
                                            <div style="
                                                        background-color: #ff9966;
                                                        border:10px;
                                                        margin: 50px 10px 10px 10px;
                                                        border-color:cyan ;
                                                        padding-top: 10px;
                                                        border-radius: 20px;
                                                        align-content:center;
                                                        padding-left:70px;
                                                        padding-right:50px;
                                                        padding-bottom:15px;
                                                ">
                                                    
                                                <pre class="heading"> <?php echo $row2['heading'];?></pre>
                                                <pre class="heading">  <?php echo $row2['description']; ?></pre>
                                  
                                                <table class = "grp_table" style="margin-left:10px;">
                                
                                                        
                                                   <tr class = "grp_tr">
                                                            <td class = "grp_td"><pre > CTC</pre></td>
                                                            <td class = "grp_td"><pre > <?php echo $row2['ctc'];?></pre></td>
                                                          </tr>
                                                  
                                                   <tr class = "grp_tr">
                                                            <td class = "grp_td"><pre >JOB TYPE </pre></td>
                                                            <td class = "grp_td"><pre > <?php echo $row2['job_type'];?></pre></td>
                                                          </tr>
                                                  
                                                   <tr class = "grp_tr">
                                                            <td class = "grp_td"><pre > Aggregate </pre></td>
                                                            <td class = "grp_td"><pre > <?php echo $row2['aggregate'];?></pre></td>
                                                          </tr>
                                                  
                                                   <tr class = "grp_tr">
                                                            <td class = "grp_td"><pre >Deadline </pre></td>
                                                            <td class = "grp_td"><pre > <?php echo $row2['deadline'];?></pre></td>
                                                          </tr>
                                                  
                                                   <tr class = "grp_tr">
                                                            <td class = "grp_td"><pre >Branches Allowed </pre></td>
                                                            <td class = "grp_td" style="width:10px;"><pre style="height:300px;">  
<?php                         
                                                    
                                                        $dict=array('computer science' , 'information techonology','electronics and communication engineering',
                                                                    'mechanical engineering','civil engineering','biotech engineering','manufacturing and process engineering');
                                                         $branch= $row2['branches']; 
?>
                                                        <ul> 
<?php
                                                        for( $i=0;$i<7;$i++)
                                                        {
                                                            if($branch[$i]=='1') 
                                                            { 
?>
                                                                <li> 
<?php       
                                                                echo $dict[$i]."</li>";
                                                            }
?> 
<?php  
                                                        }  
?>
                                                        </ul>  </pre></td>
                                                        </tr>
                                          
                                                </table>
                                            </div>
        							
<?php                                   }
                                    }
                                }

                                elseif($result['status']==0)
                                {
?>
                                    <div > <center><h3>YOU ARE YET TO BE VERIFIED BY THE GROUP ADMIN !!</h3></center></div>
<?php
                                }

                                elseif($result['status']==2)
                                {
?>
                                    <div> <center> <h3>YOU HAVE BEEN BLOCKED BY THE GROUP ADMIN !!</h3></center></div>
<?php 
                                }
?>
                            </div>
                        </div>
                        
                         

                        <script>
                            var info = document.getElementById("info");
                            var post = document.getElementById("post");
                            
                            var disp_info = document.getElementById("disp_info");
                            var disp_post = document.getElementById("disp_post");
                            
                            info.onclick = function() {
                                disp_post.style.display = "none";
                                
                                disp_info.style.display = "block";
                            }
                            post.onclick = function() {
                                disp_info.style.display = "none";
                                
                                disp_post.style.display = "block";
                            }
                           
                        </script>


                    </div>
				</div>
			</main>
			


			<nav id="nav" style="margin-top:40px;">
				<div class="innertube" style="position: fixed;">
					<h3>GROUPS</h3>
					<ul>
						<!-- here goes php script for joined groups to be displayed -->
<?php
							$uid=$_SESSION['u_uid'];
							$sql="select group_id from group_student where student_id='$uid';";
							$result=mysqli_query($conn,$sql);
							$resultlist=mysqli_num_rows($result);
							if($resultlist>0)
							{
								while($group=mysqli_fetch_assoc($result))
								{
									$gid=$group['group_id'];
									$sql1="select * from group_info where group_id='$gid';";
									$result1=mysqli_query($conn,$sql1);
									$resultlist1=mysqli_num_rows($result1);
									if($resultlist1>0)
									{
										while($group_info=mysqli_fetch_assoc($result1))
										{
											echo '<li><a href="stu_tab.php?grp='.$gid.'">'.$group_info['grp_name'].'</a></li><br>';
										}	
									}
									
								}
							}
?>
					</ul>
					<input type="button" id ="add_grp" class="submit_btn" name ="submit" value="JOIN A GROUP" > 
					<div  id="popup" style="display: none;" class="popup" >
						<span id="close" class="close">&times;</span>
						<form action="../includes/join_grp.inc.php" method="POST">
						<input type="text" name="group_id" placeholder="Enter Group Code" id="grp_name" class="textfield" >
						<br><br>
						<input type="submit" name="submit" value="Join Group" class="submit_btn">
						</form>
						
					</div>

					<script type="text/javascript">

						var btn =document.getElementById('add_grp');
						var popup=document.getElementById('popup');
						var close=document.getElementById('close');
						btn.onclick = function() {
						popup.style.display = "block";
						}
						
						close.onclick = function() {
						popup.style.display = "none";
						}
						
<?php
						$msg="";
						if(isset($_GET['Status']))
						{
							if($_GET['status']=="sent")
							{
								$msg="request sent! ";
							}
							elseif($_GET['status']=="added")
							{
								$msg="you have already joined the group! ";
							}
							elseif($_GET['status']=="wrong")
							{
								$msg="enter correct group id! ";
							}
						}
						//   popup message 
?>
					</script>

				</div>
			</nav>
		
		</div>
		
		
	
	</body>
</html>