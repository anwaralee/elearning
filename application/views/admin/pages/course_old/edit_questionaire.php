<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the question?");	
}
</script>
<h2>Edit Questionnaire</h2>
<div class="seperator"></div>
<a href="<?php echo base_url();?>course/add_questionare/<?php echo $this->uri->segment(3);?>" class="btn btn-success">Add questions</a>
<!--<button onclick="javascript:history.go(-2);" class="btn">Go back</button>-->
<div class="seperator"></div>
<table>
<tr><td>S/N</td><td>Question</td><td colspan="2">Action</td></tr>
<?php if($q != NULL)
{
    $i = 0;
    while($qu = mysql_fetch_assoc($q))
    {
        $i++;
    ?>
    <tr><td><?php echo $i;?></td><td><?php echo $qu['question'];?></td><td><a href="<?php echo base_url();?>course/edit_q/<?php echo $qu['question_id'];?>" class="btn btn-success">Edit</a></td><td><a href="<?php echo base_url();?>course/remove_q/<?php echo $qu['question_id'];?>" class="btn btn-danger" onclick='return show_confirm()' >Remove</a></td></tr>
  <?php
  }
}
else
echo "<tr><td colspan='4'>No questions available</td></tr>";//
?>
</table>