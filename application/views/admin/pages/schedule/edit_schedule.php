<script language="javascript">
    
   	
    function getTrainer(){

        var selectedCourse = $("#selectCourse").find(':selected').attr('value');
	 
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>schedule/getTrainerByCourse/"+selectedCourse,
            data: "",
            success: function(msg){
                $("#trainerList").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#trainerList").html(xhr.responseText);
                alert(thrownError);
            }


        });
    }

    
    function getLessonsEdit(){
        var selectedCourse = $("#selectCourse").find(':selected').attr('value');
        var lessonId=$('#IdLesson').attr('value');
      
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>schedule/getEditLessonsByCourse/"+selectedCourse+"/"+lessonId,
            data: "",
            success: function(msg){
                $("#lessonsList").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#lessonsList").html(xhr.responseText);
                alert(thrownError);
            }


        });
    }
    
    function getLessons(){

        var selectedCourse = $("#selectCourse").find(':selected').attr('value');
	 
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>schedule/getLessonsByCourse/"+selectedCourse,
            data: "",
            success: function(msg){
                $("#lessonsList").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#lessonsList").html(xhr.responseText);
                alert(thrownError);
            }


        });
    }
</script>

<!--script language="javascript">
$(document).ready(function () {
    $('#other').click(function (){
                $('#in').show();
                $('#in').attr('name','time');
    });
    
    $('.tym').click(function (){
                $('#in').hide();
                $('#in').removeAttr('name','time');
    });
        
        $('#otloc').click(function (){
                $('#txtloc').show();
                $('#txtloc').attr('name','location');
    });
        $('.loc').click(function (){
                $('#txtloc').hide();
                $('#txtloc').removeAttr('name','location');
    });
});

</script-->
<body onload="getTrainer();getLessonsEdit();">

    <div class="h_left"><h2>Edit Schedule</h2></div>
    <div class="seperator"></div>
    <form action="<?php echo base_url(); ?>schedule/update_schedule/<?php echo $this->uri->segment('3')?>/<?php echo $allTrainings->training_id;?>" method="post" id="lesson">
       
        <h3>Course:</h3>
        <select id="selectCourse" name="course_id" onchange="getTrainer();getLessons();">
            <option value="0">Select a course</option>
            <?php
            foreach ($allCourses as $course) :
                if ($course->course_id == $allTrainings->course_id) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                ?>

                <option value="<?php echo $course->course_id; ?>" <?php echo $selected; ?>><?php echo $course->course_name; ?></option>
            <?php endforeach; ?>
        </select>

        <h3>Lessons</h3>
        <input type="hidden" id="IdLesson" value="<?php echo $allTrainings->lesson_id; ?>"/>
        <select name="lesson_id" id="lessonsList">
            <option value="0"><font color="red">Please select any course first</font></option>
        </select>
        <h3>Trainer:</h3>
        <select name="trainer_id" id="trainerList">

        </select>



        <h3>Training Date:</h3>
        <input type="text" size="12" id="inputField" disabled value="<?php echo $this->uri->segment('3'); ?>"/>
        <input type="hidden" size="12" id="inputField" name="date" value="<?php echo $this->uri->segment('3'); ?>"/>
        <!--<input type="text" name="date" id="date">--> 

        <h3>Training Time Slot:</h3>
         <?php if (!empty($timeSlots)) { 
            ?>
            

                <select name="timeslot_id">
                    <option value="<?php echo $allTrainings->timeslot_id;?>"><?php echo $this->schedule_model->getTrainingTimeById($allTrainings->timeslot_id)->time;?></option>
                    <?php foreach ($timeSlots as $timeslot): 
                     ?>
                    <option value="<?php echo $timeslot->timeslot_id ?>"><?php echo $timeslot->time; ?></option>
                    <?php endforeach; ?>

                </select>    
            <?php } else { ?>

                <h4>No Time Slots Avaliable. Manage Time Slots</h4>
                <div class="add_new"><a href="<?php echo base_url() ?>schedule/list_timeslots" class="btn btn-info">Manage TimeSlots</a></div>
            <?php } ?>
        
        <div>Is Active : <input type="checkbox" name="active" <?php if($allTrainings->status == 1){ echo "checked = 'checked'";}?>></div>
    <!--<input type="text" name="time">-->
        <div class="seperator"></div>
        <input type="submit" value=" Update " class="btn btn-primary">
    </form>
</body>