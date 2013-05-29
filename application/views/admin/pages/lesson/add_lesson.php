<div class="h_left"><h2>Add new Lesson</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>lesson/add" method="post">
<h3>Lesson Name:</h3>
<input type="text" name="lesson_name">
<h3>Lesson Description:</h3>
<textarea name="lesson_desc"></textarea>
<h3>Course Name:</h3>
<select name="course_id">
    <option value="0">Select a Course</option>
       
        <?php foreach ($allCourses as $course): ?>
            <option value="<?php echo $course->course_id; ?>"><?php echo $course->course_name; ?></option>
        <?php endforeach; ?>
</select>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
