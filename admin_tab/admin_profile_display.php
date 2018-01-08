<!DOCTYPE html>
<!-- Template by html.am -->
<?php 
include '../includes/dbh.inc.php';
session_start();
if(!isset($_SESSION['u_uid']))
{
    header("Location: ../login.php");
}
$id=$_SESSION['u_uid'];

$sql="select * from user_admin where admin_id='$id';";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
$img="uploads/default.jpg";
if($row['profilepic_status']!=0)
{
  $path="uploads/".$id."*";
  $imga=glob($path);
  $img=$imga[0];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
		<link rel="stylesheet" href="stu_tab.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body background="admin_tab.jpg">		
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="admin_tab.php">Home</a></li>
      
      <li class="active"><a href="#">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="../includes/logout.inc.php" ><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
    </ul>
  </div>
</nav>
    <div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" >
            <div class="panel-heading" back >
              <h3 class="panel-title"><?php echo $row['firstname']." ".$row['lastname'] ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <?php echo '<img alt="User Pic" src='.$img.'     class="img-circle img-responsive">' ;?>
                </div>
             
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>adminid:</td>
                        <td><?php echo $row['admin_id'] ?></td>
                      </tr>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $row['email'] ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $row['gender'] ?></td>
                      </tr>
                        <tr>
                        <td>Designation</td>
                        <td><?php echo $row['designation'] ?></td>
                      </tr>
                      <tr>
                        <td>Organisation</td>
                        <td><?php echo $row['organisation'] ?></td>
                      </tr>
                        <tr>
                        <td>Contact</td>
                        <td><?php echo $row['contact'] ?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                 <center> <a href="admin_det_form.php" class="btn btn-primary" >Update Profile</a> </center>
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>
    
    </body>
    </html>