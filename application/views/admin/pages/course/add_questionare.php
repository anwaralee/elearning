<h2>Questionare</h2>
<h3>For lesson, '<?php echo $lesson;?>'</h3>
<b><?php if(isset($success))echo $success;?></b>
<div class="seperator"></div>
<script language="javascript">
var i=2;
$(function(){
            $("#qtn").validate();
		   $('.single').click(function(){
									   $('#des').hide();
									   $('#yn').hide();
									   $('#multi').hide();
									   $('#single').show();
									   });
		   $('.multiple').click(function(){
									   $('#des').hide();
									   $('#yn').hide();
									   $('#single').hide();
									   $('#multi').show();
									   });
		    $('.des').click(function(){
									   $('#multi').hide();
									   $('#des').show();
									   $('#yn').hide();
									   $('#single').hide();
									   });
			 $('.yn').click(function(){
									   $('#multi').hide();
									   $('#des').hide();
									   $('#yn').show();
									   $('#single').hide();
									   });
			 $('.am').click(function(){
									 if(i<=10)
									 $('.ans').append('<br><input type="radio" name="correct" value="'+ i +'">&nbsp;<input type="text" name="answer'+i+'" class="required">');
									 i = i+1;
									 });
			 $('.am_ch').click(function(){
									 if(i<=10)
									 $('.ans2').append('<br><input type="checkbox" name="correct'+ i +'" value="'+ i +'">&nbsp;<input type="text" name="answer'+i+'" class="required">');
									 i = i+1;
									 });
		   });

</script>
<form action="<?php echo base_url();?>course/add_questionare/<?php echo $this->uri->segment(3);?>" method="post" id="qtn">
<h3>Question:</h3>
<textarea name="q" class="required"></textarea>

<h3>Select question type:</h3>
<select name='type' class="required">
<option value="">Select type</option>
<option value="single" class="single">Single Choice</option>
<option value="multiple" class="multiple">Multiple Choice</option>
<option value="des" class="des">Description</option>
<option value="yn" class="yn">Yes / No</option>
</select>

<span id="single" style="display:none;">
<p>Type answers and tick the correct</p>
<div class="ans"><input type="radio" name="correct" value="1"> <input type="text" name="answer" class="required"></div>
<a href="javascript:void(0)" class="am btn btn-inverse">Add More</a>
</span>

<span id="multi" style="display:none;">
<p>Type answers and check the correct answers</p>
<div class="ans2"><input type="checkbox" name="correct1" value="1"> <input type="text" name="answers" class="required"></div>
<a href="javascript:void(0)" class="am_ch btn btn-inverse">Add More</a>
</span>

<span id="des" style="display:none;">
<p>Add description Optional)</p>
<textarea name="desc"></textarea>
</p>
</span>
<span id="yn" style="display:none">
<p>Tick the correct Answer</p>
Yes : <input type="radio" value="yes" name="yn" class="required" id="yes" onclick="$('#no').removeClass('required');">
<br>No : <input type="radio" value="no" name="yn" class="required" id="no" onclick="$('#yes').removeClass('required');">
</span>
<div class="seperator"></div>
<input type="submit" value="Done" class="btn btn-primary"> <a href="<?php echo base_url();?>course/list_course" class="btn btn-success">Go to Lesson Manager</a>
</form>