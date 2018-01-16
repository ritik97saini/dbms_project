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
		<title>2 Column Layout &mdash; Left Menu with Header &amp; Footer</title>
		<link rel="stylesheet" href="stu_tab.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
    <body background = "admin_tab.jpg">
    
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Winter Training Project</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="stu_tab.php">Home</a></li>
            
      <li class="active"><a href="#">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
        <li><a href="../includes/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
    </div>
</nav>
        
    <div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
          <?php
                  $dict=array('computer science' , 'information techonology','electronics and communication engineering',
        'mechanical engineering','civil engineering','biotech engineering','manufacturing and process engineering');
                  $uid=$_SESSION["u_uid"];
                  $sql="select * from user_student where student_id='$uid';";
                  $result=mysqli_query($conn,$sql);
                  $row=mysqli_fetch_assoc($result);
                  $name=$row['firstname']." ".$row['lastname'];
                  $dob=$row['dob'];
                  $Username=$row['student_id'];
                  $email=$row['email'];
                  $contact=$row['contact'];
                  $gender=$row['gender'];
                  $branch=$row['branch'];
                  $x_percent=$row['x_percentage'];
                  $xii_percent=$row['xii_percentage'];
                  $be_percent=$row['be_percentage'];
                  $passing_year=$row['passing_year'];
                  $college=$row['organisation'];
                  $profilepic=$row['profilepic_status'];
                  $imgfile="";
                  if($profilepic==0)
                  {
                    $imgfile="uploads/profile_pic/default.jpg";
                  }
                  else
                  {
                    $imgfile="uploads/profile_pic/".$uid."#profilepic"."jpg";
                  }
          echo '
          <div class="panel panel-info">
            <div class="panel-heading">
                <center><h3 class="panel-title">'.$name.'</h3></center>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src= '.$imgfile.' class="img-circle img-responsive">
                <br><br>
                <form method="POST" action="../includes/pictureupdate_student.php" enctype="multipart/form-data">
                <input type = "file" style="color:transparent;"  title="add photo" />
                </form>
                 </div>
                
                
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                 <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Username:</td>
                          <td>'.$Username.'</td>
                        </tr>
                        <tr>
                          <td>Date of Birth:</td>
                          <td>'.$dob.'</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                            <td><a href="mailto:info@support.com">'.$email.'</a></td>
                        </tr>
                     
                        <tr>
                          <td>Phone Number:</td>
                          <td>'.$contact.'</td>
                        </tr>
                        <tr>
                          <td>Gender</td>
                          <td>'.$gender.'</td>
                        </tr>
                          <tr>
                          <td>Organisation</td>
                          <td>'.$college.'</td>
                        </tr>
                        <tr>
                          <td>Branch</td>
                          <td>'.$dict[$branch].'</td>
                        </tr>
                         <tr>
                          <td>Passing Year</td>
                          <td>'.$passing_year.'</td>
                        </tr>
                        <tr>
                          <td>X Percentage</td>
                          <td>'.$x_percent.'</td>
                        </tr>
                        <tr>
                          <td>XII Percentage</td>
                          <td>'.$xii_percent.'</td>
                        </tr>
                        <tr>
                          <td>B.E. Aggregate Percentage</td>
                          <td>'.$be_percent.'</td>
                        </tr>
                       
                      </tbody>
                    </table>
                    
                      <center><a href="stu_det.php" class="btn btn-primary">Update Profile</a></center>
                    </div>
                  </div>
                
              </div>
                   
              
          </div>';
          ?>
        </div>
      </div>
    </div>
    
    </body>
    </html>