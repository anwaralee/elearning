<style type="text/css">
.calendar table
{
width: 600px;
height:300px;
}
.calendar .heading
{
	background-color:#666;
	color:#FFF;
}
.calendar .heading a
{
	color:#FFF;
}
.calendar .heading th
{
	text-align:center;
}
    .calendar{
        font-family: sans-serif;
        font-size: 14px;
    }
    table.calendar{
        margin: auto;
        border-collapse: collapse;
		width:720px;
        
        }
        .calendar .days td{
            width: 60px;
            height: 60px;
            padding:4px;
            border: 1px solid #999;
            vertical-align: top;
            background-color: #00000;
       }
       .calendar .days td:hover{
        background-color: #FFF;
       }

       .calendar .highlight {
         
          font-weight: bold;
          color:#00F;

        }
        
        .content {margin-left:18px; margin-top: 20px}
        
        .day_num{margin-left: 40px; margin-top:20px; font-size: large}
</style>
<style type="text/css">

		
		
</style>
<script type="text/javascript">
    $(document).ready(function() {
 $('#checkday').hide();
});
function show_confirm()
{
return confirm("Are you sure you want to remove the schedule?");	
}

function showErrorDiv(){
    $('#checkday').show();
    
}

</script>
<div class="h_left"><h2>Manage Schedules</h2></div>
<div class="seperator"></div>

<span id="checkday" class="errorMsg" onclick="$('#checkday').hide();">
    <center><font color='red'><?php echo $this->session->userdata('daycheck');?></font></center>
</span>

<h2 align="center">Click on dates to manage schedules</h2>
<div class="calendar">
<?php

echo $this->calendar->generate($this->uri->segment(3),$this->uri->segment(4),$links);
/*if($schedule!=NULL)
{
   ?>  
   <table width="50%">
<tr>
<th>S/N</th>
<th>Title</th>
<th>Action</th>
</tr>
   <?php 
	$i = 0;
	while($c = mysql_fetch_assoc($schedule))
	{
		$i++;
		echo "<tr><td>".$i."</td>
		<td class='c_right'>".$c['training_title']."</td>
		<td class='action'>
		<a href = '".base_url()."schedule/edit_schedule/".$c['training_id']."' class='btn btn-info'>Edit</a>
		<a href= '".base_url()."schedule/remove_schedule/".$c['training_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a>			        </td></tr>";
	}
	echo "</table>";
}
else echo "<h2>No schedules.</h2>";*/
?>
</div>
