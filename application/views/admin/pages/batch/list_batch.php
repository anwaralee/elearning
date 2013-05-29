<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the batch?");	
}
</script>
<div class="h_left"><h2>Batch Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>batch/add_batch" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Batch</th>
<th>Action</th>
</tr>



<?php
if($allBatches)
{
	$i = 0;
	foreach($allBatches as $batch):
		$i++;
		echo "<tr><td>".$i."</td><td class='c_right'>".$batch->batch_name."</td><td class='action'><a href= '".base_url()."batch/remove/".$batch->batch_id."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> <a href = '".base_url()."batch/edit_batch/".$batch->batch_id."' class='btn btn-info'>Edit</a></td></tr>";
	endforeach;
}
?>

</table>