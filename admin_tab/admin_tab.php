 
<?php include '../includes/dbh.inc.php';
session_start();
if(!isset($_SESSION['u_uid']))
{
    header("Location: ../login.php");
}

$id=$_SESSION['u_uid'];
?>
 <!DOCTYPE html>
<!-- Template by html.am -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
		<link rel="stylesheet" href="admin_tab.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
       
        <div id = "baap">
		<nav class="navbar navbar-inverse" style="width=100%;">
  <div class="container-fluid" style="widht=100%;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      
      <li><a href="admin_profile_display.php">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="../includes/logout.inc.php" ><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
    </ul>
  </div>
</nav>
        </div>
 
					<?php
        $admin=$_SESSION['u_uid'];
        
        $sql4="SELECT group_id FROM group_info where admin_id='$admin';";
							$query4=mysqli_query($conn,$sql4);

							$row4=mysqli_fetch_assoc($query4);
        $id1=$row4['group_id'];
        
        
        if(!empty($_GET['grpid']))
        $id1=$_GET['grpid'];
							$sql2="SELECT grp_name FROM group_info where group_id='$id1';";
							$query2=mysqli_query($conn,$sql2);

							$row2=mysqli_fetch_assoc($query2);
							?>

		
		<div id="wrapper">
		
			<main>
				<div id="content" style="margin-top: 60px;">
					<div class="innertube">


                <?php
                        
                        if(isset($_GET['grpid'])) 
                            $gid = $_GET['grpid'];
                        else $gid=$id1;
                            $sql="select * from group_info where group_id='$gid';";
							$result=mysqli_query($conn,$sql);
							$resultlist=mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                            
                            echo '
                            <div style = "color: white; background-color: #000099; text-align: center; font-size: 40px; position:fixed; width:85%; font-weight: bold; padding: 10px;">'.$row['grp_name'].'</div>
                            
                            <br><br><br><br><br>
                            <div id="navi" style="position: fixed; width:85%;">
<center>
                            <button type="button" class="btn" id="info">INFO</button>
                            <button type="button" class="btn" id="post">POSTS</button>
                            <button type="button" class="btn" id="member">MEMBERS</button>
</center>
                      </div>      
                        
                        <div id="disp_info" style="display:none">'.$row['grp_name'].'<br>'.$row['group_id'].'<br>'.$row['description'] ; ?>
                            
                        </div>
                    <div id="notice" style="margin-top:80px; ">
                       
                        <div id="disp_post"  ">
                            
                            <a href="#"> <button type="button" class="btn" id="add_notice">ADD NOTICE</button></a>
                        <?php
							$sql1="SELECT notice_id,type FROM notice  where group_id='$id1' order by created_on desc;";
							$query1=mysqli_query($conn,$sql1);
                            

							while ($row1=mysqli_fetch_assoc($query1)) {
                                $notice=$row1['notice_id'];
                                if($row1['type']==1)
                                {
                                    $sql2="select * from notice_1 where notice_id='$notice';";
                                }
                                else
                                {
                                    $sql2="select * from notice_2 where notice_id='$notice';";
                                }
                                $query2=mysqli_query($conn,$sql2);
                                $row2=mysqli_fetch_assoc($query2);
                                
                            ?>
                            <div style="
                                background-color: crimson;
                                border:10px;
                                margin: 50px 10px 10px 10px;
                                border-color:cyan ;
                                padding-top: 10px;
                                border-radius: 20px;
                                ">
							<center><p style="font-size: 40px; align-content: center">                              
                                <?php echo $row2['heading']; ?>
							</p></center>
                            <center><p style="font-size: 15px; align-content: center">
                                
                              <?php echo $row2['description']; ?>
							</p><center>
                                <br>
                            </div>
							<?php } ?>
                        
                        
                        
                        </div>
                            </div>
                        <div id="disp_member" style="display:none">yay you are in MEMBER!</div>
                            <script>
                            
                            var add =document.getElementById('add_notice');
                               add.onclick=function()
                               {
                                   window.open('add_notice.php?status=&gid=<?php echo $gid; ?>', 'newwindow', 'width=300, height=250'); return false;
                                   
                               }
                                
                            </script>
                        <script>
                            var info = document.getElementById("info");
                            var post = document.getElementById("post");
                            var member = document.getElementById("member");
                            var disp_info = document.getElementById("disp_info");
                            var disp_post = document.getElementById("disp_post");
                            var disp_member = document.getElementById("disp_member");
                            info.onclick = function() {
                                disp_post.style.display = "none";
                                disp_member.style.display = "none";
                                disp_info.style.display = "block";
                            }
                            post.onclick = function() {
                                disp_info.style.display = "none";
                                disp_member.style.display = "none";
                                disp_post.style.display = "block";
                            }
                            member.onclick = function() {
                                disp_info.style.display = "none";
                                disp_post.style.display = "none";
                                disp_member.style.display = "block";
                            }
                        </script>
                            
                    
                        
						
                        
                
						
						
					</div>
				</div>
			</main>
			
			<nav id="nav" style="margin-top:40px;">
				<div class="innertube" style="position:fixed; ">
					<h3>Left heading</h3>
					<ul>
						<!-- here goes php script for joined groups to be displayed -->
						<?php
							$sql="SELECT * FROM group_info where admin_id='$id';";
							$query=mysqli_query($conn,$sql);

							while ($row=mysqli_fetch_assoc($query)) { ?>
							<li>
                              <?php echo'  <a href="admin_tab.php?grpid='.$row['group_id'].'">'?><?php echo $row['grp_name']; ?> </a>
							</li>
							<?php } ?>

				
					</ul>
					<input type="button" id ="add_grp" class="submit_btn" name ="submit" value="ADD A GROUP" > 
					<div  id="popup" style="display: none;" class="popup" >
						<span id="close" class="close">&times;</span>
						<form action="../includes/grp_data_save.php" method="POST">
						<input type="text" name="grp_name" placeholder="Enter Group Name" id="grp_name" class="textfield" >
						<br><br>
						<textarea type="text" name="desc" placeholder="Description" id="desc" class="textfield" ></textarea>
						<br><br>
						<input type="submit" name="submit" value="Generate Group" class="submit_btn">
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

						
						

					</script>
				</div>
			</nav>
		
		</div>
		
		
	
	</body>
</html>