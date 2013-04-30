<?php $this->load->model('admin/quiz_model');?>
<h2>User Report</h2>
<div class="seperator"></div>
<form action="<?php echo base_url();?>quiz/get_report" method="post">
Select user : <select name="user" onchange="this.form.submit();">
<?php if($student == NULL){?>
<option>No users</option>
<?php 
}
else
{
    echo "<option value=''>Choose User</option>";
    while($s = mysql_fetch_assoc($student)){
?>
<option value="<?php echo $s['user_id'];?>"><?php echo $s['username'];?></option>
<?php }}
?>
</select>
<div class="seperator"></div>
</form>

<?php
if(isset($report))
{
    $uname = $this->quiz_model->getUname($_POST['user']);
    
    ?>
    <table width="80%">
    <tr><td colspan="3"><b>Report of <?php echo $uname;?></b></td></tr>
    <tr><td> <b>S/N</b> </td><td> <b>Course Name</b> </td><td> <b>Test</b> </td></tr>
    <?php
    echo '<p>';
    $i=0;
    while($r = mysql_fetch_assoc($report))
    {
        $check = $this->quiz_model->check_c_quiz($r['course_id']);
        $i++;
        ?>
        <tr><td><?php echo $i;?></td><td><?php echo $r['course_name'];?></td><td><?php if($check)echo "<a href='".base_url()."quiz/view_result/".$r['course_id']."/".$_POST['user']."' class='btn btn-info'>View Result</a>"; else echo "No test for this course";?></td></tr>
        <?php
    }
    echo '</table></p>';
}
?>