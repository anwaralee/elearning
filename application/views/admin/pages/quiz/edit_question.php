<h2>Edit Question</h2></a><h3><?php if($title != NULL){?> for Test - '<?php echo $title; }?>'</h3>
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
    <tr><td><?php echo $i;?></td><td><?php echo $qu['question'];?></td><td><a href="<?php echo base_url();?>quiz/edit_q/<?php echo $qu['question_id'];?>" class="btn btn-success">Edit</a></td><td><a href="<?php echo base_url();?>quiz/remove_q/<?php echo $qu['question_id'];?>" class="btn btn-danger">Remove</a></td></tr>
  <?php
  }
}
else
echo "<tr><td colspan='4'>No questions available</td></tr>";
?>
</table>