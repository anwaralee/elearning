<div class="h_left"><h2>Add new Course</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>course/add" method="post">
<h3>Course Name:</h3>
<input type="text" name="course_name">
<h3>Course Description:</h3>
<textarea name="course_desc"></textarea>
<h3>Batch Name:</h3>
<select name="batch_id">
    <option value="0">Select a Batch</option>
       
        <?php foreach ($allBatches as $batch): ?>
            <option value="<?php echo $batch->batch_id; ?>"><?php echo $batch->batch_name; ?></option>
        <?php endforeach; ?>
</select>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
