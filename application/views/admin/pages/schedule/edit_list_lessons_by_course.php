<?php print_r($lessonId);?>
<?php if(!empty($lessonsByCourse)) { ?>
	<?php foreach($lessonsByCourse as $lesson):
         if($lesson->lesson_id == $lessonId){
                     		$selected = "selected";
                     	}
                     	else {
                     		$selected = "";
                     	} ?>
	<option value="<?php echo $lesson->lesson_id;?>" <?php echo $selected;?>><?php echo $lesson->lesson_name;?></option>
	<?php endforeach;?>
<?php } else { ?>
	<option value="0">No Lessons Found. Add Lessons</option>
<?php } ?>