<h2>Edit Your Site's Details</h2>
<div class="seperator"></div>
<form action="<?php echo base_url();?>site_configuration/edit_site_setting" method="post" enctype="multipart/form-data">
<?php if(isset($site))
{
	$s=mysql_fetch_assoc($site);
	?>
<h3>Site Name :</h3>  
<input type="text" name="name" value="<?php echo $s['site_name'];?>"/>
<h3>Email :</h3>  
<input type="text" name="email" value="<?php echo $s['site_email'];?>"/>
<h3>Logo :</h3>
<img src="<?php echo base_url().'images/admin/'.$s['site_logo']?>" height="150px" width="100px"/>  <br />
<input type="file" name="logo"/>
<h3>Contact Details :</h3>
<textarea name="contact"><?php echo $s['site_contact'];?></textarea>
<div class="seperator"></div>
<input type="submit" name="submit" value="Update" class="btn btn-primary"/>
<?php }?>

</form>