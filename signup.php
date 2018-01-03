<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Automated Loan System</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body background = "login_back.jpg">
        <div id="header1"><center><h1>WINTER TRAINING PROJECT</h1></center></div>
       
        <div id="supage">
            <form action="includes/signup.inc.php" method="POST">
            <br><br>
            <div id="hsu">
                <div id="t1">Create a new account</div>
                <br>
                <input type="text" name="first" id="fname" tabindex="1" placeholder="First Name" aria-label="First Name">
                <input type="text" name="last" id="lname" tabindex="1" placeholder="Last Name" aria-label="Last Name">
                <br><br>
                <input type="text" name="email" id="mailid" tabindex="1" placeholder="Email address" aria-label="Email address">
                <br><br>
                <input type="text" name="uid" id="mailid" tabindex="1" placeholder="user id" aria-label="user id">
                <br><br>
                <input type="password" name="pwd" id="passwd" tabindex="1" placeholder="Password" aria-label="Password">
                <br><br>
                <select name="role" id="mailid">
                    <option value="admin">ADMIN</option>
                    <option value="student">STUDENT</option>
                </select>
                <br><br>
                <input type="text" name="contact" id="cont" tabindex="1" placeholder="Contact No." aria-label="Contact No.">
            </div>
            <div id="subtn">
                <br>
                <button type="submit" name="submit" class="submitsu">Create Account</button>
            </div>
            </form>
            <br>
            <br>
        </div>


        <?php 

        if(isset($_GET['signup']))
        {
            if($_GET['signup']=="empty")
            {
                echo "<p>enter all fields</p>";
            }
            elseif($_GET['signup']=="email")
            {
                echo "<p>enter valid email id</p>";
            }
            elseif($_GET['signup']=="usertaken")
            {
                echo "<p>user name already taken</p>";
            }
            elseif($_GET['signup']=="failure")
            {
                echo "<p>enter all fields</p>";
            }
            else
            {
                echo "<p>Successful</p>";
            }
    }
?>

    </body>
</html>