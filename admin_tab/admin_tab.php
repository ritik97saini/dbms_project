 
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
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
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

					

		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
						<h1>Heading</h1>
						
						
					</div>
				</div>
			</main>
			
			<nav id="nav">
				<div class="innertube">
					<h3>Left heading</h3>
					<ul>
						<!-- here goes php script for joined groups to be displayed -->
						<?php
							$sql="SELECT grp_name FROM group_info where org_id='$id';";
							$query=mysqli_query($conn,$sql);

							while ($row=mysqli_fetch_assoc($query)) { ?>
							<li>
								<?php echo $row['grp_name']; ?>
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