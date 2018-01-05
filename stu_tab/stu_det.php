<?php
session_start();
?>


<html>
<head>
<title>Student Registration Form</title>
<link rel="stylesheet" href="stu_det.css">
</head>

 
<body background="stu_det_back.jpg">

<h3>STUDENT PROFILE</h3>

<form action="../includes/profileupdate_student.php" method="POST" enctype="multipart/form-data">
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
	 
	<!----- Date Of Birth -------------------------------------------------------->
	<tr>
		<td>DATE OF BIRTH</td>
	 
	<td>
	<select name="birth_day" id="Birthday_Day">
		<option value="-1">Day:</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		 
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		 
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		 
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		 
		<option value="31">31</option>
	</select>
	 
	<select id="birth_month" name="birth_month">
		<option value="-1">Month:</option>
		<option value="01">Jan</option>
		<option value="02">Feb</option>
		<option value="03">Mar</option>
		<option value="04">Apr</option>
		<option value="05">May</option>
		<option value="06">Jun</option>
		<option value="07">Jul</option>
		<option value="08">Aug</option>
		<option value="09">Sep</option>
		<option value="10">Oct</option>
		<option value="11">Nov</option>
		<option value="12">Dec</option>
	</select>
	 
	<select name="birth_year" id="Birthday_Year">
	 
		<option value="-1">Year:</option>
		<option value="2012">2012</option>
		<option value="2011">2011</option>
		<option value="2010">2010</option>
		<option value="2009">2009</option>
		<option value="2008">2008</option>
		<option value="2007">2007</option>
		<option value="2006">2006</option>
		<option value="2005">2005</option>
		<option value="2004">2004</option>
		<option value="2003">2003</option>
		<option value="2002">2002</option>
		<option value="2001">2001</option>
		<option value="2000">2000</option>
		 
		<option value="1999">1999</option>
		<option value="1998">1998</option>
		<option value="1997">1997</option>
		<option value="1996">1996</option>
		<option value="1995">1995</option>
		<option value="1994">1994</option>
		<option value="1993">1993</option>
		<option value="1992">1992</option>
		<option value="1991">1991</option>
		<option value="1990">1990</option>
		 
		<option value="1989">1989</option>
		<option value="1988">1988</option>
		<option value="1987">1987</option>
		<option value="1986">1986</option>
		<option value="1985">1985</option>
		<option value="1984">1984</option>
		<option value="1983">1983</option>
		<option value="1982">1982</option>
		<option value="1981">1981</option>
		<option value="1980">1980</option>
	</select>
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
		Male <input type="radio" name="gender" value="Male" checked />
		Female <input type="radio" name="gender" value="Female" />
		</td>
	</tr>
	 
	<tr>
		<td>COLLEGE</td>
		<td>
		<input type="text" name="college" class="input" />
		</td>
	</tr>
	 
	<!----- Branch ---------------------------------------------------------->
	<tr>
		<td>BRANCH</td>
		<td>
			<select name="branch" class="input" >
				<option value="cs">computer science</option>
				<option value="it">information techonology</option>
				<option value="ece">electronics and communication engineering </option>
				<option value="me">mechanical engineering </option>
				<option value="civil">civil engineering</option>
				<option value="bt">biotech engineering</option>
				<option value="mpae">manufacturing and process engineering </option>
				
			</select>
		</td>
	</tr>
	<tr>
		<td>PASSING YEAR</td>
		<td>
			<select name="passing_year" id="Birthday_Year">
		 		<option value="-1">Year:</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
			</select>
		</td>
	</tr>
	<!----- Class X percentage ---------------------------------------------------------->
	<tr>
		<td>Class X Percentage</td>
		<td><input type="text" name="x_percent" maxlength="30" class="input" />
		(upto two decimal places)
		</td>
	</tr>


	<!----- Class XII percentage ---------------------------------------------------------->
	<tr>
		<td>Class XII Percentage</td>
		<td><input type="text" name="xii_percent" maxlength="30" class="input" />
		(upto two decimal places)
		</td>
	</tr>

	<!----- B.E. percentage ---------------------------------------------------------->
	<tr>
		<td>B.E. Percentage (Aggregate)</td>
		<td><input type="text" name="be_percent" maxlength="30" class="input"/>
		(without drop)
		</td>
	</tr>

	<tr>
		<td>Resume</td>
		<td><div>  
	  			<input type="file" name="resume" placeholder="resume"> 
	  		</div>
	  	</td>
	</tr>
	 

	<!----- Submit and Reset ------------------------------------------------>
	<tr>
		<td colspan="2" align="center">
		<button name="submit" class="submit_btn" >Submit</button>
		<input type="reset" value="Reset" class="submit_btn">
		</td>
	</tr>
</table>
 
</form>
 
</body>
</html>