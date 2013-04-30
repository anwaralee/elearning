<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>
<div class="h_left"><h2>Edit Document</h2></div>
<div class="seperator"></div>
<?php 
if($document)
{
$co = mysql_fetch_assoc($document);
?>
<form action="<?php echo base_url();?>document_manager/update_document/<?php echo $co['doc_id']?>" method="post" enctype="multipart/form-data" id="lesson">

<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" value="<?php echo $co['doc_title'];?>" class="required">
<h3>Description:</h3>
<textarea name="desc"><?php echo $co['doc_desc'];?></textarea>
<h3 id="fyl">File:</h3>
<input type="file" name="file" id="file"value="<?php echo $co['doc_file'];?>"><br>
<?php 
if($co['doc_file']!=NULL) 
{ 
	$path=base_url().'document_manager/view_document/'.$co['doc_id'];?>
	<a href="<?php echo $path;?>" class="btn btn-info" id="view">View Now</a> 
<?php
}
else echo "<br><h3><b><font color='red'>The document does not have any files.</font></b></h3>";
?>
<h3>Doc size:</h3>
<input type="text" name="size" value="<?php echo $co['file_size'];?>">
<div id="down">Is Downloadable : <input type="checkbox" name="download" <?php if($co['isDownloadable']==1) {?> checked="checked" <?php } ?>></div>
<div>Is Active : <input type="checkbox" name="active" <?php if($co['status']==1) {?> checked="checked" <?php } ?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes " class="btn btn-primary">
</form>
<?php 
}
?>