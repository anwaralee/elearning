<script type="text/javascript">
    function show_confirm()
    {
        return confirm("Are you sure you want to remove the course?");	
    }
    
    function selectBatch(){
    
 
        var selectedBatch = $("#selectBatch").find(':selected').attr('value');
    
        $.ajax({
            type: "GET",
            url: "getCourseByBatch/"+selectedBatch,
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
<div class="h_left"><h2>Course Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url(); ?>course/add_course" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>
<div class="add_new"><form action="<?php echo base_url(); ?>course/assign_trainer" method="post"><input type="submit" value="Assign Trainers" name="add" class="btn btn-info"></form></div>


<div id="tableList">
   
<table width="80%">
<tr>
<th>S/N</th>
<th>Course</th>
<th>Description</th>
<th>Action</th>
</tr>



<?php
if($allCourses)
{
	$i = 0;
	foreach($allCourses as $course):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $course->course_name;?></td>
			<td class='c_right'><?php echo $course->course_description;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>course/remove/<?php echo $course->course_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>course/edit_course/<?php echo $course->course_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>
</div>