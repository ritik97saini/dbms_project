 <!DOCTYPE html>
<!-- Template by html.am -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
		<link rel="stylesheet" href="admin_tab.css">
	</head>
	
	<body>		
		

					

		<header id="header">
			<div class="innertube">
				<h1>Header...</h1>
			</div>
		</header>
		
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
							$sql="select group name "

						?>
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