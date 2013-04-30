<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the test?");	
}
</script>
<?php 
$this->load->model('admin/quiz_model');
?>
<h2>Test Manager</h2>
<div class="seperator"></div>
<a href="<?php echo base_url();?>quiz/student_report" class="btn btn-inverse floatLeft ">User Report</a>
<form action="<?php echo base_url();?>quiz/add_quiz" method="post"><input type="submit" value="Add" class="btn btn-primary floatRight"></form>
<div class="clear"></div>
<div class="seperator"></div>

<table  width="100%"class="tbl">

    <tr><th>S/N</th><th>Title</th><th colspan="4">Action</th>
<?php 
if($quiz != NULL)
{
	 
	$i=1;
	while($q = mysql_fetch_assoc($quiz))
	{
	   $tot = $this->quiz_model->tot_q($q['quiz_id']);
		?>
        <tr><td><?php echo $i;?></td><td><?php echo $q['quiz_title'];?></td><td><a href="<?php echo base_url();?>quiz/edit_quiz/<?php echo $q['quiz_id']?>" class="btn btn-info">Edit</a></td><td><a href="<?php echo base_url();?>quiz/add_question/<?php echo $q['quiz_id'];?>" class="btn btn-success">Add questions</a> | Tot: <?php echo $tot;?> </td><td><a href="<?php echo base_url();?>quiz/edit_question/<?php echo $q['quiz_id']?>" class="btn btn-success">Edit Question</a></td><td><a href="<?php echo base_url();?>quiz/remove/<?php echo $q['quiz_id'];?>" class="btn btn-danger" onclick='return show_confirm()' >Remove</a></td></tr>
        <?php
        $i++;
	}
}
else
echo "<tr><td colspan='6'><b>No tests Available</b></td></tr>";
?>
</table>