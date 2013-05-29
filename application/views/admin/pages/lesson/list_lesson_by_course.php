<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the lesson?");	
}

</script>

<table width="50%">
<tr>
<th>S/N</th>
<th>Lesson</th>
<th>Course</th>
<th>Action</th>
</tr>



<?php

if($lessonsByCourse)
{
	$i = 0;
	foreach($lessonsByCourse as $lesson):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $lesson->lesson_name;?></td>
			<td class='c_right'><?php echo $this->lesson_model->getCourseName($lesson->course_id)->course_name;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>lesson/remove/<?php echo $lesson->lesson_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>lesson/edit_lesson/<?php echo $lesson->lesson_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>