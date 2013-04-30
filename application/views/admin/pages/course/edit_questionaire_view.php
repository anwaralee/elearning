<script language="javascript">
$(function(){
		   $("#qtnr").validate();
		   var k =1;
		   $('.single').click(function(){
									   $('#des').hide();
									   $('#yn').hide();
									   $('#single').show();
									   });
		    $('.des').click(function(){
									   $('#des').show();
									   $('#yn').hide();
									   $('#single').hide();
									   });
			 $('.yn').click(function(){
									   $('#des').hide();
									   $('#yn').show();
									   $('#single').hide();
									   });
			 $('#am').click(function(){
			                         var i = $('#am').attr('class');
                                     var j = parseFloat(i, 10);
									 if((j+k)<=10)
                                     {
										  j=j+k;
									 $('.ans').append('<br><input type="radio" name="correct" value="'+ j +'">&nbsp;<input type="text" name="answer'+j+'" class="required">');
                                     k++;
                                     }
									 });
			 $('#am_ch').click(function(){
			                         var i = $("#am_ch").attr('class');
                                     var j = parseFloat(i, 10);
									 if((j+k)<=10)
                                     {
										  j=j+k;
									 $('.ans2').append('<br><input type="checkbox" name="correct'+ j +'" value="'+ j +'">&nbsp;<input type="text" name="answer'+j+'" class="required">');
                                     k++;
                                     }
									 });
		   });

</script>
<h2>Edit Question</h2>
<div class="seperator"></div>

<?php
if($q != NULL)
{
    $qu = mysql_fetch_assoc($q);
    ?>
<h3>Question:</h3>
<form action="<?php echo base_url();?>course/edit_submit/<?php echo $this->uri->segment(3);?>" method="post" id="qtnr">
<input type="hidden" name="type" value="<?php echo $qu['type'];//?>">
<textarea name="q" class="required"><?php echo $qu['question'];?></textarea>    
    <?php
    if($qu['type'] == 'single')
    {?>
       <span id="single">
        <p>Type answers and tick the correct</p>
        <div class="ans">
            <?php
            if($qu['answer1']){
                $i = 1;
            ?>
            <input type="radio" name="correct" value="1" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer1" class="required" value="<?php echo $qu['answer1']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer2']){
                $i = 2;
            ?>
            <input type="radio" name="correct" value="2" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer2" class="required" value="<?php echo $qu['answer2']; ?>"><br>
            <?php }?>
            <?php
            $i = 3;
            if($qu['answer3']){
            ?>
            <input type="radio" name="correct" value="3" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer3" class="required" value="<?php echo $qu['answer3']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer4']){
                $i = 4;
            ?>
            <input type="radio" name="correct" value="4" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer4" class="required"  value="<?php echo $qu['answer4']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer5']){
                $i = 5;
            ?>
            <input type="radio" name="correct" value="5" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer5" class="required"  value="<?php echo $qu['answer5']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer6']){
                $i = 6;
            ?>
            <input type="radio" name="correct" value="6" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer6" class="required"  value="<?php echo $qu['answer6']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer7']){
                $i = 7;
            ?>
            <input type="radio" name="correct" value="7" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer7" class="required"  value="<?php echo $qu['answer7']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer8']){
                $i = 8;
            ?>
            <input type="radio" name="correct" value="8" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer8" class="required"  value="<?php echo $qu['answer8']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer9']){
            $i = 9;
            ?>
            <input type="radio" name="correct" value="9" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer9" class="required"  value="<?php echo $qu['answer9']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer10']){
                $i = 10;
            ?>
            <input type="radio" name="correct" value="10" <?php if($qu['correct'] == $i){?> checked="checked"<?php }?>> <input type="text" name="answer10" class="required"  value="<?php echo $qu['answer10']; ?>"><br>
            <?php }?>
        </div>
        </span>
        	<input type="hidden" name="i" value="<?php echo $i;?>">
        <a href="javascript:void(0)" class="<?php echo $i;?> btn btn-inverse" id="am">Add More</a>
    <?php
    }
	
	
	if($qu['type'] == 'multiple')
    {?>
       <span id="multi">
        <p>Type answers and check the correct answers</p>
        <div class="ans2">
            <?php
            if($qu['answer1']){
                $i = 1;
            ?>
            <input type="checkbox" name="correct1" value="1" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer1" class="required" value="<?php echo $qu['answer1']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer2']){
                $i = 2;
            ?>
            <input type="checkbox" name="correct2" value="2" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer2" class="required" value="<?php echo $qu['answer2']; ?>"><br>
            <?php }?>
            <?php
            $i = 3;
            if($qu['answer3']){
            ?>
            <input type="checkbox" name="correct3" value="3" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer3" class="required" value="<?php echo $qu['answer3']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer4']){
                $i = 4;
            ?>
            <input type="checkbox" name="correct4" value="4" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer4" class="required"  value="<?php echo $qu['answer4']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer5']){
                $i = 5;
            ?>
            <input type="checkbox" name="correct5" value="5" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer5" class="required"  value="<?php echo $qu['answer5']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer6']){
                $i = 6;
            ?>
            <input type="checkbox" name="correct6" value="6" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer6" class="required"  value="<?php echo $qu['answer6']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer7']){
                $i = 7;
            ?>
            <input type="checkbox" name="correct7" value="7" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer7" class="required"  value="<?php echo $qu['answer7']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer8']){
                $i = 8;
            ?>
            <input type="checkbox" name="correct8" value="8" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer8" class="required"  value="<?php echo $qu['answer8']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer9']){
            $i = 9;
            ?>
            <input type="checkbox" name="correct9" value="9" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer9" class="required"  value="<?php echo $qu['answer9']; ?>"><br>
            <?php }?>
            <?php
            if($qu['answer10']){
                $i = 10;
            ?>
            <input type="checkbox" name="correct10" value="10" <?php if($qu['correct'.$i] == 'correct'){?> checked="checked"<?php }?>> <input type="text" name="answer10" class="required"  value="<?php echo $qu['answer10']; ?>"><br>
            <?php }?>
        </div>
        </span>
        	<input type="hidden" name="i" value="<?php echo $i;?>">
        <a href="javascript:void(0)" class="<?php echo $i;?> btn btn-inverse" id="am_ch">Add More</a>
    <?php
    }
	
	
    if($qu['type'] == 'des')
    {
       ?>
        <span>
        <p>Add description Optional)</p>
        <textarea name="desc"><?php echo $qu['description'];?></textarea>
        </p>
        </span>
       <?php 
    }
    if($qu['type'] == 'yn')
    {
        ?>
        <span id="yn">
        <p>Tick the correct Answer</p>
        Yes : <input type="radio" value="yes" name="yn" <?php if($qu['yes_no'] == 'yes'){?>checked="checked"<?php }?>>
        <br>No : <input type="radio" value="no" name="yn" <?php if($qu['yes_no'] == 'no'){?>checked="checked"<?php }?>>
        </span>
        <?php
    }
	
	?>
     <div class="seperator"></div>
    <input type="submit" value="Submit" class="btn btn-inverse">
    </form>
    <?php
} 
?>
