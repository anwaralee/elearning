<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>
<script language="javascript">
$(document).ready(function () {
    $('#type').change(function (){
    if($('#type').val()=='Youtube Video')
	{
        $('#youtube').show();
		$('#image').show();
		$('#example').show();
		$('#down').hide();
		 $('#file').hide();
		 $('#fyl').hide();
		 $('#view').hide();
	}
	else
	if($('#type').val()=='Questionaire')
	{
		$('#youtube').hide();
		$('#image').hide();
		$('#example').hide();
		$('#down').hide();
		$('#file').hide();
		$('#fyl').hide();
		$('#view').hide();
		$('.hide').hide();
	}
    else
	{
        $('#youtube').hide();
		$('#image').hide();
		$('#example').hide();
		$('#down').show();
		$('#file').show();
		$('#fyl').show();
		$('#view').show();
	}
	
    });
});

</script>
<div class="h_left"><h2>Add new Lesson</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>course/add" method="post" enctype="multipart/form-data" id="lesson">
<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" class="required">
<h3>Course&nbsp;<font color="red">*</font>:</h3>
<select name="cat" class="required"><option selected="selected">SELECT COURSE</option><?php if($cat){while($c = mysql_fetch_assoc($cat)){echo "<option value = '".$c['cat_id']."'>".$c['cat_title']."</option>";}}else{?><option>No categories</option><?php }?></select>
<h3>Resource&nbsp;<font color="red">*</font>:</h3>
<select name="type" class="required" id="type">
    <option selected="selected">SELECT RESOURCE</option>
    <?php 
        if($type)
        {
            while($t = mysql_fetch_assoc($type))
            {
                echo "<option value = '".$t['course_type_title']."'>".$t['course_type_title']."</option>";
            }
        }
        else
        {
    ?>
    <option>No Resources</option>
	<?php 
	}
	?>
  </select>
 <p>
<textarea name="file" id="youtube" style="display:none;" value="Enter only the src of the Youtube embed code" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter only the src of the Youtube embed code':this.value;">Enter only the src of the Youtube embed code</textarea>
</p>
<h3 id="example" style="display:none;">Example</h3>
<img src="<?php echo base_url();?>/images/example.jpg" id="image" style="display:none;"/>
<h3>Description:</h3>
<textarea name="desc"></textarea>
<h3 id="fyl">File:</h3>
<input type="file" name="file" id="file">
<span class="hide">
<h3>Length:</h3>
<input type="text" name="length"> (If Audio / Video)
<h3>Doc size:</h3>
<input type="text" name="size"> (If doc / pdf / etc)
</span>
<h3>Source:</h3>
<input type="text" name="source">
<h3>Author:</h3>
<input type="text" name="author">
<h3>Credit Hour:</h3>
<input type="text" name="credit">
<div id="down">Is Downloadable : <input type="checkbox" name="download"></div>
<div>Is Available : <input type="checkbox" name="available"></div>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
