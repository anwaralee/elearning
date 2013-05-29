<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course?");	
}

</script>

<table width="50%">
<tr>
<th>S/N</th>
<th>Course</th>
<th>Batch</th>
<th>Action</th>
</tr>



<?php
if($coursesByBatch)
{
	$i = 0;
	foreach($coursesByBatch as $course):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $course->course_name;?></td>
			<td class='c_right'><?php echo $this->course_model->getBatchName($course->batch_id)->batch_name;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>course/remove/<?php echo $course->course_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>course/edit_course/<?php echo $course->course_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>