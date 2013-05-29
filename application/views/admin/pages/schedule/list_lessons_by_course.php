<?php if(!empty($lessonsByCourse)) { ?>
	<?php foreach($lessonsByCourse as $lesson):?>
	<option value="<?php echo $lesson->lesson_id;?>"><?php echo $lesson->lesson_name;?></option>
	<?php endforeach;?>
<?php } else { ?>
	<option value="0">No Lessons Found. Add Lessons</option>
<?php } ?>