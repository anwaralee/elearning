<script type="text/javascript">
    function show_confirm()
    {
        return confirm("Are you sure you want to remove the course?");	
    }
    function selectBatch(){
    
 
        var selectedBatch = $("#selectBatch").find(':selected').attr('value');
    
        $.ajax({
            type: "GET",
            url: "getCourseByBatchTrainer/"+selectedBatch,
            data: "",
            success: function(msg){
                $("#tableList").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#tableList").html(xhr.responseText);
                alert(thrownError);
            }


        });
    
    }
</script>
<div class="h_left"><h2>Course - Trainer </h2></div>
<div class="seperator"></div>

<div id="tableList">
   <script type="text/javascript">
   
    function updateTrainer(courseId){
    
    
        $("#message_"+courseId).hide();
        var selectedTrainer = $("#selectTrainer_"+courseId).find(':selected').attr('value');
        
        $.ajax({
            type: "GET",
            url: "updateTrainer/"+courseId+"/"+selectedTrainer,
            data: "",
            success: function(msg){
                $("#message_"+courseId).show();
                $("#message_"+courseId).html("Updated Succesfully");
            }


        });
    
  
    }
    
</script>
<table width=75%">
    <tr>
        <th>S/N</th>
        <th>Course</th>
        <th>Trainer</th>
        <th>Status</th>

    </tr>



    <?php
    if ($allCourses) {
        $i = 0;
        foreach ($allCourses as $course):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class='c_right'><?php echo $course->course_name; ?></td>
               

                <td class='c_right'>

                     <select name="trainer_id" id="<?php echo 'selectTrainer_'.$course->course_id;?>">
                        <option value="0">Select a Trainer</option>

                        <?php foreach ($allTrainers as $trainer): ?>
                            <?php if($this->course_model->isNotEmptyCourse($course->course_id)){
                                $trainers = $this->course_model->getTrainerIdForCourse($course->course_id);
                                if($trainers->trainer_id == $trainer->trainer_id){
                                $selected = "selected";
                            }
                            else {
                                $selected = "";
                            }
                            }
                            else {
                                $selected = "";
                            }
                            ?>
                            <?php ?>
                            <option value="<?php echo $trainer->trainer_id; ?>" <?php echo $selected;?>><?php echo $trainer->firstname . " " . $trainer->lastname; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Update" class="btn btn-success" onclick="updateTrainer(<?php echo $course->course_id;?>)"/>
                    </form>
                </td>
                <td id="message_<?php echo $course->course_id;?>"></td>





            </tr>
            <?php
        endforeach;
    }
    ?>

</table>
<div class="seperator"></div>

<div class="add_new">

</div>
</div>