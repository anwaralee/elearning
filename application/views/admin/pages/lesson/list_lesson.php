<script type="text/javascript">
    function show_confirm()
    {
        return confirm("Are you sure you want to remove the lesson?");	
    }
    function selectCourse(){
    
 
        var selectedCourse = $("#selectCourse").find(':selected').attr('value');
    
        $.ajax({
            type: "GET",
            url: "getLessonByCourse/"+selectedCourse,
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
<div class="h_left"><h2>Lesson Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url(); ?>lesson/add_lesson" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<div class="add_new">
    <label>Select course:</label><select name="course_id" id="selectCourse" onchange="selectCourse()">
         <option value="-1">Select a Course to proceed</option>
        <option value="0">All</option>
        <?php foreach ($allCourses as $course): ?>
            <option value="<?php echo $course->course_id; ?>"><?php echo $course->course_name; ?></option>
        <?php endforeach; ?>
    </select></div>

<div id="tableList">
   
</div>