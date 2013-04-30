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
</style>
<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the schedule?");	
}
</script>
<div class="h_left"><h2>Schedule Manager</h2></div>
<div class="seperator"></div>
<div class="add_new"><a href="<?php echo base_url()?>schedule/add" class="btn btn-inverse">Add new</a></div>
<div class="seperator"></div>
<div class="calendar">
<?php
$year = date('Y');
echo $this->calendar->generate($year,$this->uri->segment(4),$links);
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
