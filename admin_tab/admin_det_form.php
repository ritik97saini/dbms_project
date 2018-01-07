<? php session_start(); ?>
<html>
<head>
<title>Student Registration Form</title>
<link rel="stylesheet" href="../stu_det/stu_det.css">
</head>

 
<body background="../stu_det/stu_det_back.jpg">

<h3>ADMIN PROFILE FORM</h3>

 <form method="post" action="admin_data_update.php" enctype="multipart/form-data">
<table align="center" cellpadding = "10" >
 
<!----- First Name ---------------------------------------------------------->
<tr>
<td>FIRST NAME</td>
<td><input type="text" name="first_name" maxlength="30" class="input" />
(max 30 characters a-z and A-Z)
</td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
<td>LAST NAME</td>
<td><input type="text" name="last_name" maxlength="30" class="input" />
(max 30 characters a-z and A-Z)
</td>
</tr>
 

<!----- Email Id ---------------------------------------------------------->
<tr>
<td>EMAIL ID</td>
<td><input type="text" name="email" maxlength="100" class="input" /></td>
</tr>
 
<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>MOBILE NUMBER</td>
<td>
<input type="text" name="mob_no" maxlength="10" class="input" />
(10 digit number)
</td>
</tr>
 
<!----- Gender ---------------------------------------------------------->
<tr>
<td>GENDER</td>
<td>
Male <input type="radio" name="gender" value="Male" />
Female <input type="radio" name="gender" value="Female" />
</td>
</tr>
 

 
<!----- Designation ---------------------------------------------------------->
<tr>
<td>DESIGNATION</td>
<td><input type="text" name="desg" maxlength="30" class="input" />
</td>
</tr>

<!----- org ---------------------------------------------------------->
<tr>
<td>ORGANISATION</td>
<td><input type="text" name="org" maxlength="30" class="input" />
</td>
</tr>

<tr>
<td>PROFILE PICTURE</td>
<td><input type="file"  name="file"/>
</td>
</tr>


 

<!----- Submit and Reset ------------------------------------------------>
<tr>
<td colspan="2" align="center">
    <button class="submit_btn"  name="submit" value="submit">submit</button>
<input type="reset" value="Reset" class="submit_btn">
</td>
</tr>
</table>
 
</form>
 
</body>
</html>