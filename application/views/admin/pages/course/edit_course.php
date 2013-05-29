<?php 
if($courseById)
{

?>
<div class="h_left"><h2>Edit Course</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>course/edit/<?php echo $courseById->course_id;?>" method="post">

<h3>Course Name:</h3>
<input type="text" name="course_name" value = "<?php echo $courseById->course_name;?>">
<h3>Description:</h3>
<textarea name="course_desc"><?php echo $courseById->course_description;?></textarea>

<h3>Batch:</h3>
<select name='batch_id'>
                    
                    <?php

                     foreach ($allBatches as $batch): 
                     	if($batch->batch_id == $courseById->batch_id){
                     		$selected = "selected";
                     	}
                     	else {
                     		$selected = "";
                     	} 
                     ?>

                        <option value="<?php echo $batch->batch_id; ?>" <?php echo $selected;?>><?php echo $batch->batch_name; ?></option>
                    <?php endforeach; ?>


                </select>

<div>Is Active : <input type="checkbox" name="active" <?php if($courseById->status == 1){ echo "checked = 'checked'";}?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes" class="btn btn-primary">

</form>
<?php 
}
?>