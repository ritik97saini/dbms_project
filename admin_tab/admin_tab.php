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
        <title>admin_tab</title>
        <link rel="stylesheet" href="admin_tab.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>



    
    <body>
       


        <div id = "baap">
            <nav class="navbar navbar-inverse" style="width:100%;">
                <div class="container-fluid" style="width:100%;">
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
        </div>



<?php
        

        $admin=$_SESSION['u_uid'];
        $sql4="SELECT group_id FROM group_info where admin_id='$admin';";
        $query4=mysqli_query($conn,$sql4);
        $row4=mysqli_fetch_assoc($query4);
        $id1=$row4['group_id'];
                
        if(!empty($_GET['grpid']))
        $id1=$_GET['grpid'];
        $sql2="SELECT grp_name FROM group_info where group_id='$id1';";
        $query2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($query2);


?>

        
        
        <div id="wrapper">
        
            <main>


                <div id="content" style="margin-top: 60px;">
                    
                    <div class="innertube">


<?php
                        if(isset($_GET['grpid'])) 
                            $gid = $_GET['grpid'];

                        else 
                            $gid=$id1;
                            

                            $sql="select * from group_info where group_id='$gid';";
                            $result=mysqli_query($conn,$sql);
                            $resultlist=mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                            
?>
                           
                            <div style = "color: white; background-color: #000099; text-align: center; font-size: 40px; position:fixed; width:85%; font-weight: bold; padding: 10px;">
<?php                       
                                echo $row['grp_name'];

?>
                            </div>
                            
                            <br><br><br><br><br>



                            <div id="navi" style="position: fixed; width:85%;">
                                <center>
                                    <button type="button" class="btn" id="info">INFO</button>
                                    <button type="button" class="btn" id="post">POSTS</button>
                                    <button type="button" class="btn" id="member">MEMBERS<span class="countBubl " id="notif" style="float:right;
                                    margin-top:-26px;
                                    margin-left:2px;
                                    background:#ed1d24;
                                    color:#fff;
                                    padding:2px;
                                    display:none;"></span></button>
                                </center>
                            </div>      
                        
                        
                           
                            <div id="disp_info" style="display:none;">

                                <br><br><br>

                                <style>
                            
                                    .grp_table {
                                        margin-left: 200px;
                                        font-family: arial, sans-serif;
                                        border-collapse: collapse;
                                        width: 60%;
                                    }
                                    .grp_td {
                                        border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;
                                    }
                                    .grp_tr:nth-child(even) {
                                        background-color: #dddddd;
                                    }
                                    
                                </style>


                                <table class = "grp_table">
            
                                    <tr class = "grp_tr">
                                        <td class = "grp_td">Group Name</td>
                                        <td class = "grp_td"><?php echo $row['grp_name'];?></td>
                                    </tr>
                                    

                                    <tr class = "grp_tr">
                                        <td class = "grp_td">Group Code</td>
                                        <td class = "grp_td"><?php echo $row['group_id'];?></td>
                                    </tr>
                                    
                                    <tr class = "grp_tr">
                                        <td class = "grp_td">Description</td>
                                        <td class = "grp_td"><?php echo $row['description']; ?></td>
                                    </tr>
                                      
                                    <tr class = "grp_tr">
                                        <td class = "grp_td">Created On</td>
                                        <td class = "grp_td"><?php echo $row['created_on']; ?></td>
                                    </tr>
                                      
                                </table>
                                <br>
                                <center>
                                    <button class="btn" id="edit" name="edit" value="submit">EDIT</button>
                                </center>

                                <div  id="popup1" style="display: none;" class="popup" >

                                    <span id="close1" class="close">&times;</span>

                                    <form action="../includes/grp_data_edit.php?grpid=<?php echo $gid ; ?>" method="POST">

                                        <input type="text" name="grp_name" placeholder="Enter Group Name (optional)" id="grp_name" class="textfield" >
                                        <br><br>
                                        <textarea type="text" name="desc" placeholder="Description (optional)" id="desc" class="textfield" ></textarea>
                                        <br><br>
                                        <input type="submit" name="submit" value="Edit Group" class="submit_btn">
                                    </form>
                        
                                </div>  

                                <script type="text/javascript">

                                    var btn =document.getElementById('edit');
                                    var popup1=document.getElementById('popup1');
                                    var close1=document.getElementById('close1');
                                    btn.onclick = function() {
                                    popup1.style.display = "block";
                                    }
                                    
                                    close1.onclick = function() {
                                    popup1.style.display = "none";
                                    }
                                    
                                    
                                </script>

                            </div>
                            



                            <div id="notice" style="margin-top:80px; ">
                       
                                <div id="disp_post"  ">

                                    <a href="#"> <button type="button" class="btn" id="add_notice">ADD NOTICE</button></a>
<?php
                                    $sql1="SELECT notice_id,type FROM notice  where group_id='$id1' order by created_on desc;";
                                    $query1=mysqli_query($conn,$sql1);
                            
                                    while ($row1=mysqli_fetch_assoc($query1)) 
                                    {
                                        $notice=$row1['notice_id'];
                                        if($row1['type']==1)
                                        {
                                            $sql2="select * from notice_1 where notice_id='$notice';";
                                            $query2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($query2);
?>
                                            <div style="background-color: #ff9966;
                                                        border:10px;
                                                        margin: 50px 10px 10px 10px;
                                                        border-color:cyan ;
                                                        padding-top: 10px;
                                                        border-radius: 20px;
                                                        align-content:center;
                                                        padding-left:70px;
                                                        padding-right:50px;
                                                        padding-bottom:15px;
                             
                                                        ">


                                                <pre class="heading"> <?php echo $row2['heading'];?></pre>
                                                <pre class="heading" >  <?php echo $row2['description']; ?></pre>
                                                      
                                                     
                                            </div> 
                                                                                     
<?php                                                     
                                        }
                                        else
                                        {
                                            $sql2="select * from notice_2 where notice_id='$notice';";
                                            $query2=mysqli_query($conn,$sql2);
                                            $row2=mysqli_fetch_assoc($query2); 
?>
                                                                                         
                                            <div style="
                                                        background-color: #ff9966;
                                                        border:10px;
                                                        margin: 50px 10px 10px 10px;
                                                        border-color:cyan ;
                                                        padding-top: 10px;
                                                        border-radius: 20px;
                                                        padding-left:70px;
                                                        padding-right:50px;
                                                        padding-bottom:15px;
                                                    ">
                                
                                                    <pre class="heading"> <?php echo $row2['heading'];?></pre>
                                                    <pre class="heading">  <?php echo $row2['description']; ?></pre>
                                                     <style>
                            
                                                            .grp_table1 {
                                                                margin-left: 200px;
                                                                font-family: arial, sans-serif;
                                                                
                                                                width: 60%;
                                                            }
                                                            .grp_td1 {
                                                                
                                                                text-align: left;
                                                                padding: 8px;
                                                            }
                                                            
                                                            
                                                        </style>
                                  
                                                    <table class = "grp_table1" style="margin-left:-10px;" border="0">
                        
                                                        <tr >
                                                            <td class = "grp_td1"><pre > CTC</pre></td>
                                                            <td class = "grp_td1"><pre > <?php echo $row2['ctc'];?></pre></td>
                                                        </tr>

                                          
                                                        <tr >
                                                            <td class = "grp_td1"><pre >JOB TYPE </pre></td>
                                                            <td class = "grp_td1"><pre > <?php echo $row2['job_type'];?></pre></td>
                                                        </tr>
                              
                                                       <tr >
                                                                <td class = "grp_td1"><pre > Aggregate </pre></td>
                                                                <td class = "grp_td1"><pre > <?php echo $row2['aggregate'];?></pre></td>
                                                        </tr>
                                                      
                                                       <tr>
                                                                <td class = "grp_td1"><pre >Deadline </pre></td>
                                                                <td class = "grp_td1"><pre > <?php echo $row2['deadline'];?></pre></td>
                                                        </tr>
                                                      
                                                       <tr>
                                                                <td class = "grp_td1"><pre >Branches Allowed </pre></td>
                                                                <td class = "grp_td1" style="width:10px;">
                                                                <pre style="height:300px;">  
<?php                         
                                    
                                                                $dict=array('computer science' , 'information techonology','electronics and communication engineering',
                                                                        'mechanical engineering','civil engineering','biotech engineering','manufacturing and process engineering');
                                                                $branch= $row2['branches']; 
?>
                                                               <ul> 
<?php
                                                                for( $i=0;$i<7;$i++)
                                                                {
                                                                    if($branch[$i]=='1') 
                                                                    { 
?>
                                                                        <li> 
<?php                                                                   echo $dict[$i]."</li>";
                                                                    }
?> 
<?php  
                                                                }  
?>
                                                                </ul>  
                                                                </pre>
                                                                </td>
                                                        </tr>
                                      
                                                    </table>
                                            </div>
                                                                                                        
<?php     
                                        }
                                
                                    } 
?>
                        
                        
                                </div>
                            </div>




                            <div id="disp_member" style="display:none">
            
<?php
                                $dict=array('computer science' , 'information techonology','electronics and communication engineering',
                                            'mechanical engineering','civil engineering','biotech engineering','manufacturing and process engineering');

                                if(isset($_GET['grpid'])) 
                                    $gid = $_GET['grpid'];
                                else 
                                    $gid=$id1;

                                $sql="select * from group_student where group_id='$gid' order by status asc;";
                                $result=mysqli_query($conn,$sql);
                                $list=mysqli_num_rows($result);
                                if($list>0)
                                {
                                   
                                    while($row=mysqli_fetch_assoc($result))
                                    {   
                                        $sid=$row['student_id'];
                                        $sql="select * from user_student where student_id='$sid';";
                                        $data=mysqli_query($conn,$sql);                                 
                                        $sdata=mysqli_fetch_assoc($data);
                                        $img="";
                                        if($sdata['profilepic_status']==0)
                                        {
                                            $img="../stu_tab/uploads/profile_pic/default.jpg";
                                        }
                                        else
                                        {
                                            $img="../stu_tab/uploads/profile_pic/".$sid."*";
                                            $p=glob($img);
                                            $img=$p[0];
                                        }
?>
                                        <div style="
                                                    background-color: #ff8060;
                                                    border:10px;
                                                    margin: 50px 10px 10px 10px;
                                                    border-color:cyan ;
                                                    padding-top: 10px;
                                                    padding-left: 10px;
                                                    padding-bottom:0px;
                                                    width: 80%;
                                                    border-radius: 20px;
                                                    font-size: 140%;
                                                "> 
                                            <img src= "<?php echo $img ; ?>" height="100" width="100"><div style="position: relative;top: -105px;left: 150px; height: 15px;"  ><a href="#" > 
<?php 
                                            echo $sdata["firstname"]." ".$sdata["lastname"]." </a><br> ".$sdata['organisation']."<br>".$dict[$sdata['branch']]."<br> ".$sdata['email']." </div>   "; 


                                            if($row['status']==0)
                                            {
                                                echo ' <div style="position  : relative; float: right; top :-100px; left: -20px;"><form method="post" action="../includes/memberrequest.php?sid='.$sdata['student_id'].'&gid='.$gid.'"  > <button name="accept"> Accept</button>  <button name="reject">Reject</button></form>
                                                     </div>';
                                            }


                                            elseif($row['status']==1)
                                            {
                                                echo '<div style="position  : relative; float: right; top :-90px; left: -30px;"><form  method="post" action="../includes/memberrequest.php?sid='.$sdata['student_id'].'&gid='.$gid.'" > <button name="block"> Block</button></form></div>';
                                            }


                                            elseif($row['status']==2)
                                            {
                                                echo '<div style="position  : relative; float: right; top :-90px; left: -30px;"><form  method="post" action="../includes/memberrequest.php?sid='.$sdata['student_id'].'&gid='.$gid.'" > <button name="unblock"> Unblock</button></form></div>';
                                            }
?>
                               
                                        </div>
                                 
<?php   
                                    }
                                   
                                }
?>
            
                            </div>


                            <script>
                            
                            var add =document.getElementById('add_notice');
                               add.onclick=function()
                               {
                                   window.open('add_notice.php?status=&gid=<?php echo $gid; ?>', 'newwindow', 'width=600, height=550'); return false;
                                   
                               }
                                
                            </script>


                            <script>

                                var info = document.getElementById("info");
                                var post = document.getElementById("post");
                                var member = document.getElementById("member");
                                var disp_info = document.getElementById("disp_info");
                                var disp_post = document.getElementById("disp_post");
                                var disp_member = document.getElementById("disp_member");
                                var mem="";

                                mem="<?php if(isset($_GET['member'])) echo $_GET['member']; ?>";

                                if(mem=="true")
                                {
                                    disp_info.style.display = "none";
                                    disp_post.style.display = "none";
                                    disp_member.style.display = "block";  
                                }

                                info.onclick = function() 
                                {
                                    disp_post.style.display = "none";
                                    disp_member.style.display = "none";
                                    disp_info.style.display = "block";
                                }

                                post.onclick = function() 
                                {
                                    disp_info.style.display = "none";
                                    disp_member.style.display = "none";
                                    disp_post.style.display = "block";
                                }

                                member.onclick = function() 
                                {
                                    disp_info.style.display = "none";
                                    disp_post.style.display = "none";
                                    disp_member.style.display = "block";
                                }

                            </script>
                            
                    
                    
                    </div>
                </div>
            </main>
            


            <nav id="nav" style="margin-top:40px;">

                <div class="innertube" style="position:fixed; ">

                    <h3>GROUPS</h3>

                    <ul>
                        <!-- here goes php script for joined groups to be displayed -->
<?php
                            $sql="SELECT * FROM group_info where admin_id='$id';";
                            $query=mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_assoc($query)) 
                            { 
?>
                                <li>
                                <?php echo'  <a href="admin_tab.php?grpid='.$row['group_id'].'">'?>
                                <?php echo $row['grp_name']; ?> 
                                </a>
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



<?php 
            $sq="select count(*) as cou from group_student where status=0 and group_id='$gid';";
            $que=mysqli_query($conn,$sq);
            $count1=mysqli_fetch_assoc($que);
            $count=$count1['cou'];
?>
            <script>
            
                var count="<?php echo $count;?>";
                var notif=document.getElementById('notif');
                if(count>0)
                {
                    notif.style.display="block";
                    notif.textContent=count;
                }
            </script>
 
        
        
    
    </body>
</html>