<b><h2>Edit the Page Content</h2></b>
<div class="seperator"></div>
<?php if(isset($edit)) 
	{
		$pg=mysql_fetch_assoc($edit);?>
<form method="post" action="<?php echo base_url();?>page_manager/update_page/<?php echo $pg['staticpage_id'];?>">
<h3>Page Link</h3>
<input type="text" name="page_link" value="<?php echo $pg['staticpage_link'];?>"/>
<h3>Page Title</h3>
<input type="text" name="page_title" value="<?php echo $pg['staticpage_title'];?>" />
<h3>Page Content</h3>
<textarea name="page_content" id="pagecontent"><?php echo $pg['staticpage_content'];?></textarea><?php echo display_ckeditor($txtDes); ?>
<h3>Page Meta key</h3>
<input type="text" name="page_meta_key" value="<?php echo $pg['staticpage_metakey'];?>"/>
<h3>Page Meta Description</h3>
<textarea name="page_meta_desc"><?php echo $pg['staticpage_metadesc']?></textarea>
<div class="seperator"></div>
<input type="submit" value="Update" class="btn btn-primary"/>
<?php } ?>