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
		$('#youtube_view').show();
		$('#image').show();
		$('#down').hide();
		 $('#file').hide();
		 $('#fyl').hide();
		 $('#view').hide();
	}
    else
	{
        $('#youtube').hide();
		$('#youtube_view').hide();
		$('#image').hide();
		$('#down').show();
		$('#file').show();
		$('#fyl').show();
		$('#view').show();
	}
    });
});

</script>

<?php $this->load->model('admin/course_model');?>
<div class="h_left"><h2>Edit Lesson</h2></div>
<div class="seperator"></div>
<?php 
if($records)
{
$co = mysql_fetch_assoc($records);
/*if($co['course_type_title'] != 0)
		$type = $this->course_model->getTypeTitle();
		else
		$type = NULL;*/
		if($co['cat_id'] != 0)
		$cat = $this->course_model->getCategoryTitle();
		else
		$cat = NULL;
		?>
<form action="<?php echo base_url();?>course/edit/<?php echo $co['course_id']?>" method="post" enctype="multipart/form-data" id="lesson">

<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" value="<?php echo $co['course_name'];?>" class="required">
<h3>Course:</h3>
<select name="cat">
	<?php 
    if($cat != NULL)
    {
        while($c = mysql_fetch_assoc($cat))
        {
            echo "<option value = '".$c['cat_id']."'>".$c['cat_title']."</option>";
        }
    }
	else
	{
		$cat = $this->course_model->getCategoryTitle();
		echo "<option value = 'nocat'>--SELECT COURSE--</option>";
		while($c = mysql_fetch_assoc($cat))
        {
            echo "<option value = '".$c['cat_id']."'>".$c['cat_title']."</option>";
        }
	}
	?>
</select>
<h3>Resource&nbsp;<font color="red">*</font>:</h3>
<select name="type" class="required" id="type">
	<?php
	$type = $this->course_model->getTypeTitle();
    if($type != NULL)
    {
        while($t = mysql_fetch_assoc($type))
        {
			if($t['course_type_title']==$co['course_type_title'])
			{
            echo "<option value = '".$t['course_type_title']."' selected='selected'>".$t['course_type_title']."</option>";
			}
			else
			 echo "<option value = '".$t['course_type_title']."'>".$t['course_type_title']."</option>";
        }
    }
	else
	{
		$type = $this->course_model->getTypeTitle();
		echo "<option value = 'notype'>--SELECT RESOURCE--</option>";
		while($t = mysql_fetch_assoc($type))
        {
			
            echo "<option value = '".$t['course_type_title']."'>".$t['course_type_title']."</option>";
        }
	}
	$t = mysql_fetch_assoc($type);
	
    ?>
</select>
<p>
<textarea name="file" id="youtube" 
<?php if($co['course_type_title']!="Youtube Video")
{
	?> style="display:none" 
	<?php } 
	if($co['course_file']!=NULL)
	{ $file=$co['course_file'];
	?>
    value="<?php echo $file;?>" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'<?php echo $file;?>':this.value;"
    <?php } else { ?>
    value="Enter only the src of the Youtube embed code" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Enter only the src of the Youtube embed code':this.value;" <?php } ?>>
    <?php 
	if($co['course_file']!=NULL)
	{ 
	echo $co['course_file'];
	}
	else echo "Enter only the src of the Youtube embed code";
	?></textarea>
</p>
<h3 id="example" <?php if($co['course_type_title']!="Youtube Video")
{
	?>style="display:none;" align="<?php } ?>">Example</h3>
<p>
<img src="<?php echo base_url();?>images/example.jpg" id="image"<?php if($co['course_type_title']!="Youtube Video"){?> style="display:none" <?php }?>/>
</p>
<h3 id="fyl" <?php if($co['course_type_title']=="Youtube Video") {?> style="display:none" <?php } ?>>File:</h3>
<input type="file" name="file" id="file" <?php if($co['course_type_title']=="Youtube Video") {?> style="display:none" <?php } ?> value="<?php echo $co['course_file'];?>">

<?php 
	if(empty($co['course_file']))
	{
	echo "<br><h3><b><font color='red'>The lession does not have any files.</font></b></h3>";
	}
	else if($co['course_file']!= NULL)
	{
	?>
    <br />
            <?php
			/*$type = $this->course_model->getTypeTitle();
			if($type != NULL)
			$types = mysql_fetch_assoc($type);*/
			$t=$co['course_type_title'];
			if($t=='Video' || $t=='Audio')
			{
				$path= base_url().'course/view_video/'.$co['course_file'];?>
				<a href="<?php echo $path;?>" class="btn btn-info" id="view">View Now</a>
                <?php
			}
			else if($t=='PDF' || $t=='Slideshow' || $t=='Document')
			{
				$path=base_url().'course/view_course/'.$co['course_file'];?>
				<a href="<?php echo $path;?>" class="btn btn-info" id="view">View Now</a>
                <?php
			}
			else if($t=='Youtube Video' && $co['course_file']!="Enter only the src of the Youtube embed code")
			{
				$path=base_url().'course/view_course_content/'.$co['course_id'];
				?>
                <a href="<?php echo $path;?>" class="btn btn-info" id="youtube_view">View Now</a>
                <?php
				
			}
			?>
				<!--<a href="<?php //echo $path;?>" class="btn btn-info" id="view">View Now</a>-->
<?php	} ?>
<h3>Description:</h3>
<textarea name="desc"><?php echo $co['course_description'];?></textarea>
<h3>Length:</h3>
<input type="text" name="length" value="<?php echo $co['course_length'];?>"> (If Audio / Video)
<h3>Doc size:</h3>
<input type="text" name="size" value="<?php echo $co['doc_size'];?>"> (If doc / pdf / etc)
<h3>Source:</h3>
<input type="text" name="source" value="<?php echo $co['source'];?>">
<h3>Author:</h3>
<input type="text" name="author" value="<?php echo $co['author'];?>">
<h3>Credit Hour:</h3>
<input type="text" name="credit" value="<?php echo $co['credit_hour'];?>">
<div id="down" <?php if($co['course_type_title']=="Youtube Video") {?> style="display:none" <?php } ?>>Is Downloadable : <input type="checkbox" name="download" <?php if($co['download']==1) {?> checked="checked" <?php } ?>></div>
<div>Is Available : <input type="checkbox" name="available" <?php if($co['isAvailable']==1) {?> checked="checked" <?php } ?>></div>
<div>Is Active : <input type="checkbox" name="active" <?php if($co['status']==1) {?> checked="checked" <?php } ?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes " class="btn btn-primary">
</form>
<?php 
}
?>