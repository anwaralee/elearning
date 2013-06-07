<div class="options floatLeft">
<?php
$configuration=$this->dashboard_model->getConfiguration();
if($configuration)
{
		$conf=mysql_fetch_assoc($configuration);	
?>
<div class="logo"><a href="<?php echo base_url();?>dashboard/welcome"><img src="<?php echo base_url();?>images/admin/<?php echo $conf['site_logo'];?>" alt="" /></a></div>
<?php } 
else
{
?>
	<div class="logo"><a href="<?php echo base_url();?>dashboard/welcome"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a></div>
    <?php } ?>
  <ul>
            <li><a href="<?php echo base_url();?>dashboard/account_settings"><i class="icon-cog" ></i><span class="menutext">Update Profile</span></a></li>
            <li><a href="<?php echo base_url();?>login/logout" <?php if($this->uri->segment(2) == 'logout'){echo 'class="active"';}?>><i class="icon-off"></i><span class="menutext">Log Out</span></a></li>
  </ul>
</div>
<!--options-->
<script language="javascript">
$(function(){
		   
		   $("#sel_cours").click(function(){
										  $.ajax({
												 url: "<?php echo base_url();?>destroy/user",
												 success:function(){
													 window.location = "<?php echo base_url();?>dashboard/select_courses"; 
													 }
												 });
										  });
		   
		   });
</script>