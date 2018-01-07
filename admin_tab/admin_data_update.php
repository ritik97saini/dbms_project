<?php
include '../includes/dbh.inc.php';
session_start();
echo 1;
    if(isset($_POST['submit']))
    {
     echo 2;   $firstname=mysqli_real_escape_string($conn,$_POST['first_name']);
         $lastname=mysqli_real_escape_string($conn,$_POST['last_name']);
         $emailid=mysqli_real_escape_string($conn,$_POST['email']);
         $mobileno=mysqli_real_escape_string($conn,$_POST['mob_no']);
         $gender=mysqli_real_escape_string($conn,$_POST['gender']);
         $designation=mysqli_real_escape_string($conn,$_POST['desg']);
         $organisation=mysqli_real_escape_string($conn,$_POST['org']);
        
        $file=$_FILES['file'];
        $filename=$_FILES['file']['name'];
        $ferror=$_FILES['file']['error'];
        $fsize=$_FILES['file']['size'];
        $ftmp=$_FILES['file']['tmp_name'];
        
        
        $ext=explode(".",$filename);
        $newext=strtolower(end($ext));
        $allowed=['jpg','jpeg','png'];
       $id= $_SESSION['u_uid'];
        
        if(fsize<100000)
        {
            if(ferror==0)
            {
                if(in_array($newext,$allowed))
                {
                    $sql="update user_admin set firstname='$firstname',lastname='$lastname',email='$email',contact='$mobileno',gender='$gender',organisation='$organisation',designation='$designation',profilepic_status='1' where admin_id='$id' ;";
                    
                    mysqli_query($conn,$sql);
                    $dest="uploads/".$filename;
                    move_uploaded_file($ftmp,$dest);
                    
                    header("Location: admin_profile_display.php");
                    exit();
                }
                else
                {
                    header("Location: admin_det_form.php?update=type");
                    exit();
                }
            }
            else{
                
                    header("Location: admin_det_form.php?update=errorinfile");
                    exit();
            }
        }
        else
        {
            
                    header("Location: admin_det_form.php?update=size");
                    exit();
            
        }
        
    }
?>









