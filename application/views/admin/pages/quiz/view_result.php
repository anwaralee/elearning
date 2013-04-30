<?php $this->load->model('admin/quiz_model');?>
<h2>Result of <?php echo $user_name;?> on course '<?php echo $course_name;?>'</h2>
<div class="seperator"></div>
<form method="post" action="<?php echo base_url();?>quiz/publish_marks">
<table width="90%">
<tr><th>Question</th><th>Answers</th><th>Staus</th><th>Full Marks</th><th>Marks Gained</th></tr>
<?php
$i = 0;
$m = 0;
while($r = mysql_fetch_assoc($result))
{
    $i++;
    $mark = $this->quiz_model->get_mark($r['answer_id']);
	$quest = $this->quiz_model->get_quest($r['answer_id']);
    $m = $m + $mark;
    
?>
<tr><td><?php echo $quest;?></td><td>Answer <?php echo $i;?></td><td><?php if($r['answer'] == 'correct' || $r['answer'] == 'incorrect')echo $r['answer']; else echo 'Not Available<br><br><textarea>'.$r['answer'].'</textarea>';?></td><td><?php echo $mark;?></td><td><input type="text" name="m<?php echo $i;?>" value="<?php if($r['answer']=='correct')echo $mark; else if($r['answer']=='incorrect')echo 0; else echo 'Provide Marks';?>" <?php if($r['answer'] == 'correct' || $r['answer'] == 'incorrect'){?>disabled="disabled"<?php }?>/></td></tr>
<?php }?>
</table>
<input type="hidden" name="i" value="<?php echo $i;?>" />
<input type="hidden" name="cid" value="<?php echo $this->uri->segment(3);?>" />
<input type="hidden" name="uid" value="<?php echo $this->uri->segment(4);?>" />
<input type="hidden" name="m" value="<?php echo $m;?>" />
<div class="seperator"></div>
<?php
$check = $this->quiz_model->check_published($this->uri->segment(4),$this->uri->segment(3));?>
<input type="submit" value="Publish Score"  class="btn btn-success"<?php if($check){?>disabled="disabled"<?php }?>/>
<?php
if($check)
echo "<br><br>Score already Published | <b>Total : ".$check."</b>"; 
?>
</form>