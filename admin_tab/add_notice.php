<!DOCTYPE html>
<html>
<head>
	<title> ADD NOTICE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <style>
        
    </style>
    <br>
    &nbsp; <button type="button" class="btn btn-info" id="notice1">General Notice</button>
    &nbsp; <button type="button" class="btn btn-info" id="notice2">Job Notice</button>
    
    <div id="notice_1">
    <?php 
        
        $gid=$_GET['gid'];
        echo'<form method="post" action="../includes/notice_t1.inc.php?gid='. $gid.'" >
        <br>&nbsp; <input type="text" name="heading" placeholder="Enter notice heading"><br>
        <br>&nbsp; <textarea name="description" placeholder="Description (max upto 1024 characters)"></textarea>
        <br><br>
        &nbsp;
            <button type="submit" value="submit" name="submit" class="btn btn-info">ADD NOTICE</button>
        </form>' ; ?>
    
    </div>
    <div id="notice_2" style="display:none">
     <?php echo' 
        <form method="post" action="../includes/notice_t2.inc.php?gid='. $gid.'" >
        <br> &nbsp;&nbsp;<input type="text" name="heading" placeholder="Enter notice heading"><br>
        <br> &nbsp;&nbsp;<textarea name="description" placeholder="Description"></textarea><br>
            <br> &nbsp;&nbsp;<input type="text" name="job_type" placeholder="JOB TYPE"><br>
            <br> &nbsp;&nbsp;<input type="text" name="ctc" placeholder="ENTER CTC"><br><br>
            <br> &nbsp;&nbsp;<input type="date" name="deadline" placeholder="Deadline"><br>
            <br> &nbsp;&nbsp;<input type="text" name="aggregate" placeholder="Aggregate"><br>
            <br>
            <select name="branches[]" class="input" multiple="multiple" >
				<option value="0">computer science</option>
				<option value="1">information techonology</option>
				<option value="2">electronics and communication engineering </option>
				<option value="3">mechanical engineering </option>
				<option value="4">civil engineering</option>
				<option value="5">biotech engineering</option>
				<option value="6">manufacturing and process engineering </option>
				
			</select>
            
            <br><br> &nbsp;&nbsp;<button type="submit" value="submit" name="submit" class="btn btn-info">ADD NOTICE</button>
        </form>'; ?>
          
    
    </div>
    <script>
        
         var success ="<?php echo $_GET['status'] ;?>";
        if(success=="success"){
window.opener.location.reload();            
            self.close();
            
           
        }
    var notice1 =document.getElementById('notice1');
        var notice2 =document.getElementById('notice2');
        var notice_1 =document.getElementById('notice_1');
        var notice_2=document.getElementById('notice_2');
        notice1.onclick=function( ) {
            notice_1.style.display="block";
            notice_2.style.display="none";
        }
          notice2.onclick=function( ) {
            notice_2.style.display="block";
            notice_1.style.display="none";
        }
    
       
    
        
    </script>

</body>
</html>
