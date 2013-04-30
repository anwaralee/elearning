<?php
if($sch == NULL)
{
	redirect('schedule/add/'.$date);
}
else{?>
<h2>Schedule For <?php echo $date;?></h2>
<div class="seperator"></div>
<div class="add_new"><a href="<?php echo base_url()?>schedule/add/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);?>" class="btn btn-inverse">Add new</a></div>
<div class="seperator"></div>
<table>
<?php
$i = 0;
	while($c = mysql_fetch_assoc($sch))
	{
		$i++;
		echo "<tr><td>".$i."</td>
		<td class='c_right'>".$c['training_title']."</td>
		<td class='action'>
		<a href = '".base_url()."schedule/edit_schedule/".$c['training_id']."' class='btn btn-info'>Edit</a>
		<a href= '".base_url()."schedule/remove_schedule/".$c['training_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a>			        </td></tr>";
	}
	echo "</table>";
}?>