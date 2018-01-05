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
	
    <body background = "profile_back.jpg">
    
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Winter Training Project</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="stu_tab/stu_tab.php">Home</a></li>
            
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
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
                <center><h3 class="panel-title">Rohit Kumar</h3></center>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src= "IMG_3446.PNG" class="img-circle img-responsive"> </div>
                
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
                        <td>RK</td>
                      </tr>
                      <tr>
                        <td>Date of Birth:</td>
                        <td>08/08/1996</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                          <td><a href="mailto:info@support.com">rohitkr.rht78@gmail.com</a></td>
                      </tr>
                   
                      <tr>
                        <td>Phone Number:</td>
                        <td>9971056713</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>Male</td>
                      </tr>
                        <tr>
                        <td>Organisation</td>
                        <td>NSIT</td>
                      </tr>
                      <tr>
                        <td>Branch</td>
                        <td>IT</td>
                      </tr>
                      <tr>
                        <td>X CGPA</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>XII Percentage</td>
                        <td>96</td>
                      </tr>
                      <tr>
                        <td>B.E. Aggregate Percentage</td>
                        <td>73.7</td>
                      </tr>
                     
                    </tbody>
                  </table>
                  
                    <center><a href="stu_det/stu_det.php" class="btn btn-primary">Update Profile</a></center>
                  
                </div>
              </div>
            </div>
                 
            
          </div>
        </div>
      </div>
    </div>
    
    </body>
    </html>
