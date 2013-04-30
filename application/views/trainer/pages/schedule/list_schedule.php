<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course?");	
}
</script>
<div class="h_left"><h2>Schedule(s)</h2></div>
<div class="seperator"></div>

<?php
if($schedule!=NULL)
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
		<a href = '".base_url()."schedules/view_schedule/".$c['training_id']."' class='btn btn-info'>View</a></td></tr>";
	}
	?>
    </table>
    <?php
}
else echo "<h2>No schedules.</h2>";
?>
