<?php 
if($lessonById)
{

?>
<div class="h_left"><h2>Edit lesson</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>lesson/edit/<?php echo $lessonById->lesson_id;?>" method="post">

<h3>Lesson Name:</h3>
<input type="text" name="lesson_name" value = "<?php echo $lessonById->lesson_name;?>">
<h3>Description:</h3>
<textarea name="lesson_desc"><?php echo $lessonById->lesson_description;?></textarea>

<h3>Course Name:</h3>
<select name='course_id'>
                    
                    <?php

                     foreach ($allCourses as $course): 
                     	if($course->course_id == $lessonById->course_id){
                     		$selected = "selected";
                     	}
                     	else {
                     		$selected = "";
                     	} 
                     ?>

                        <option value="<?php echo $course->course_id; ?>" <?php echo $selected;?>><?php echo $course->course_name; ?></option>
                    <?php endforeach; ?>


                </select>

<div>Is Active : <input type="checkbox" name="active" <?php if($lessonById->status == 1){ echo "checked = 'checked'";}?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes" class="btn btn-primary">

</form>
<?php 
}
?>