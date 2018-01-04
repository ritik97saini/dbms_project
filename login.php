<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Automated Loan System</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body background = "login_back.jpg">
        <div id="header1"><center><h1>WINTER TRAINING PROJECT</h1></center></div>
        
        <div id="login">
        <form action="includes/login.inc.php" method="POST">
            <br>
            <h2 style="color:white;">Login</h2>
            <div class="username">
                <input type="text" name="uid" id="email" tabindex="1" placeholder="User ID" aria-label="User ID">
            </div>
            <br>
            <div class="pwd">
                <input type="password"  name="pwd" id="pass" tabindex="1" placeholder="Password" autofocus="1" aria-label="Password">
            </div>
            <br>
            
            <div id="loginbtn">
                <br>
                <button value="1" id="loginbutton" name="submit" tabindex="1" type="submit">Log In</button>
            </div>
        </form>
            <br>
            <div id="signupopt">
                Don't have an account? <a id="sulink" href="signup.php" onclick="myFunc()">Sign Up</a>
            </div>
            <br>
            <br>
       
        </div>
        
        
<?php 

    if(isset($_GET['login']))
    {
        if($_GET['login']=="empty")
        {
            echo "<p style='color:red; text-align:center; font-size:140%;'>*enter all fields</p>";
        }
        elseif($_GET['login']=="wrong")
        {
            echo "<p style='color:red; text-align:center; font-size:140%'>*wrong username or password</p>";
        }
        
    }
?>
        <!--
        <div id="supage">
            <br><br>
            <div id="hsu">
                <div id="t1">Create a new account</div>
                <br>
                <input type="text" name="fname" id="fname" tabindex="1" placeholder="First Name" aria-label="First Name">
                &nbsp;&nbsp;
                <input type="text" name="lname" id="lname" tabindex="1" placeholder="Last Name" aria-label="Last Name">
                <br><br>
                <input type="text" name="mailid" id="mailid" tabindex="1" placeholder="Email address" aria-label="Email address">
                <br><br>
                <input type="password" name="passwd" id="passwd" tabindex="1" placeholder="Password" aria-label="Password">
                <br><br>
                <input type="text" name="role" id="role" tabindex="1" placeholder="Role" aria-label="Role">
                &nbsp;&nbsp;
                <input type="text" name="cont" id="cont" tabindex="1" placeholder="Contact No." aria-label="Contact No.">
            </div>
            <div id="subtn">
                <br>
                <button type="submit" class="submitsu">Create Account</button>
            </div>
        </div>
        -->
    </body>
</html>