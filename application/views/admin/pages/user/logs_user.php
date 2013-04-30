<?php $this->session->set_userdata('uri3',$this->uri->segment(3));?>
<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the log?");	
}
</script>
<?php
$this->load->model('user_model');
if($user)
	$u=mysql_fetch_assoc($user);
	echo "<div class='h_left'><h1>eLearning Logs of ".strtoupper($u['username'])."</h1></div>";
	echo '<div class="seperator"></div>';
	?>
	<button onclick="javascript:history.go(-1);" class="btn">Go back</button>
    <div class="seperator"></div>
    <?php
if($logs && $logs!=NULL)
{
	$i=1;
?>
	<table>
    	<tr><td>S.N</td><td><strong>Course Learnt</strong></td><td><strong>Course File Learnt</strong></td><td><strong>Learnt Date</strong></td><td><strong>Course view mode</strong></td><td><strong>Action</strong></td></tr>
        <?php
        while($log=mysql_fetch_assoc($logs))
		{
			$c_id=$log['course_id'];
			$c_name=$this->user_model->getCourse($c_id);
			$c_file=$this->user_model->getCourseFile($c_id);	
			echo "<tr><td>".$i."</td><td>".$c_name."</td><td>".$c_file."</td><td>".$log['course_view_date']."</td><td>";
			if($log['course_view_type']==1) echo "Viewed";
			else if($log['course_view_type']==2) echo "Downloaded";	
			else echo "Undistinguished";
			echo "</td><td><a href= '".base_url()."user/remove_logs/".$log['course_log_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a></td></tr>";	
			$i++;
		}
		?>
    </table>
    <div class="seperator"></div>
<?php	
}
else if($logs==NULL) echo "<br><br>".strtoupper($u['username'])." has not learnt any courses yet.";
?>