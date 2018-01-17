<!DOCTYPE html>
<html>
<head>
	<title> ADD NOTICE </title>
</head>
<body>
    
    <button type="button" class="btn" id="notice1">General Notice</button>
    <button type="button" class="btn" id="notice2">JOB Notice</button>
    
    <div id="notice_1">
    <?php 
        
        $gid=$_GET['gid'];
        echo'<form method="post" action="../includes/notice_t1.inc.php?gid='. $gid.'" >
        <input type="text" name="heading" placeholder="Enter notice heading"><br>
        <textarea name="description" placeholder="Description"></textarea>
            <button type="submit" value="submit" name="submit" id="btn1">ADD NOTICE</button>
        </form>' ; ?>
    
    </div>
    <div id="notice_2" style="display:none">
     <?php echo' 
        <form method="post" action="../includes/notice_t1.inc.php?gid='. $gid.'" >
        <input type="text" name="heading" placeholder="Enter notice heading"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
            <input type="text" name="job_type" placeholder="JOB TYPE"><br>
            <input type="text" name="ctc" placeholder="ENTER CTC"><br><br>
            <input type="date" name="deadline" placeholder="Deadline"><br>
            <input type="text" name="aggregate" placeholder="Aggregate"><br>
            
            <select name="branches[]" class="input" multiple="multiple" >
				<option value="0">computer science</option>
				<option value="1">information techonology</option>
				<option value="2">electronics and communication engineering </option>
				<option value="3">mechanical engineering </option>
				<option value="4">civil engineering</option>
				<option value="5">biotech engineering</option>
				<option value="6">manufacturing and process engineering </option>
				
			</select>
            
            <button type="submit" value="submit" name="submit" id="btn2">ADD NOTICE</button>
        </form>'; ?>
          
    
    </div>
    <script>
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
    
        var success ="<?php echo $_GET['status'] ;?>";
        if(success=="success"){
window.opener.location.reload();            
            self.close();
           
        }
    
        
    </script>

</body>
</html>