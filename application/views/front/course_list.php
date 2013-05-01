<?php foreach($coursesByBatch as $course):?>

   <option value="<?php echo $course->course_id; ?>"><?php echo $course->course_name;?></option>
<?php endforeach; ?>

  