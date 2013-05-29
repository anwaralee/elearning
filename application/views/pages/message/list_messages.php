<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the message?");	
}

</script>
<div class="h_left"><h2>Messaging</h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>message/compose_message" method="post"><input type="submit" value="Compose" name="add" class="btn btn-inverse"></form></div>
<div>
   <table width="50%">
<tr>
<th>S/N</th>
<th>Subject</th>
<th>Message</th>
<th>Sender</th>
<th>Sent Date</th>
<th>Status</th>
</tr>



<?php
if($allMessages)
{
	$i = 0;
	foreach($allMessages as $message):
		$i++;
	?>
		<tr <?php if($message->status==0){?> style="color: #0055cc;font-size: medium" <?php } ?>>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $message->subject;?></td>
                        <td class='c_right'><?php echo $message->message;?></td>
                        <td class='c_right'>
                                  <?php if($message->sender_id==2){
                                      echo $this->message_model->getTrainerDetails($message->trainer_id)->username;
                                  }
                                  else if($message->sender_id==3){
                                       echo $this->message_model->getTraineeDetails($message->user_id)->username;
                                  };?>
                        </td>
                        <td class='c_right'><?php echo $message->sent_date;?></td>
                        <td class='c_right'><?php echo $message->status;?></td>
			
		</tr>
	<?php
		endforeach;
}
?>

</table> 
</div>
 
<div class="details floatRight" style="width: 400px">
   
    <table style="width:400px; margin-top:-145px">
        <tr colspan="2">
            <td style="font-size: medium">Message Details</td>
        </tr>
        <tr>
            <td>Subject:</td>
            <td>This is a test message</td>
        </tr>
        <tr>
            <td>Message:</td>
            <td>This is a test message This is a test message, This is a test message, This is a test message
            This is a test message, This is a test message</td>
        </tr>
         <tr>
            <td>Sender:</td>
            <td>Trainer</td>
        </tr>
        <tr>
            <td>Sent Date:</td>
            <td>2017-01-03</td>
        </tr>
    </table>
</div>
