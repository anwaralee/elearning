<div class="h_left"><h2>Schedule: <?php echo $scheduleById->training_title;?></h2></div>
<div class="seperator"></div>

<table width="70%">
<tr class='c_right'>
    <td>Training Session:</td>
    <td><?php echo $this->schedule_model->getSessionNameById($scheduleById->session_id)->session_name;?></td>
</tr>

<tr>
    <td>Assigned Date:</td>
    <td><?php echo $scheduleById->training_date;?></td>
</tr>
<tr>
    <td>Time:</td>
    <td><?php echo $this->schedule_model->getTrainingTimeById($scheduleById->timeslot_id)->time;?></td>
</tr>
<tr>
    <td>Course:</td>
    <td><?php echo $this->schedule_model->getCourseNameById($scheduleById->course_id)->course_name;?></td>
</tr>
<tr>
    <td>Lesson:</td>
    <td><?php echo $this->schedule_model->getLessonNameById($scheduleById->lesson_id)->lesson_name;?></td>
</tr>


</table>
