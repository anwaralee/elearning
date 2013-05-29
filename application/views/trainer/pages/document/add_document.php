<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>

<div class="h_left"><h2>Add new Document</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>document_manager/add_document" method="post" enctype="multipart/form-data" id="lesson">
<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" class="required">
<h3>Description:</h3>
<textarea name="desc"></textarea>
<h3 id="fyl">File:</h3>
<input type="file" name="file" id="file"/>

<h3>For Schedule:</h3>
<select name="lesson_id">
    <?php foreach($allSchedules as $schedule) :?>
    <option value="<?php echo $schedule->lesson_id;?>"><?php echo $this->document_model->getLessonNameById($schedule->lesson_id)->lesson_name;?></option>
    <?php endforeach; ?>
</select>

<div id="down">Is Downloadable : <input type="checkbox" name="download"></div>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>