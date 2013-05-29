<div class="options floatLeft">
<?php
//$this->load->model('admin/site_conf_model');
$configuration=$this->site_conf_model->getConfiguration();
if($configuration)
{
		$conf=mysql_fetch_assoc($configuration);	
?>
<div class="logo"><a href="<?php echo base_url();?>admin_dashboard"><img src="<?php echo base_url();?>images/admin/<?php echo $conf['site_logo'];?>" alt="" /></a></div>
<?php } 
else
{
?>
	<div class="logo"><a href="<?php echo base_url();?>admin_dashboard"><img src="<?php echo base_url();?>images/logo.png" alt="" /></a></div>
    <?php } ?>
  <ul>
    <li class=""><a href="<?php echo base_url();?>branch/list_branches" <?php if($this->uri->segment(2) == 'list_branches'){echo 'class="active"';}?>><i class="icon-th-large"></i>Branch Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>admin/list_admins" <?php if($this->uri->segment(2) == 'list_type'){echo 'class="active"';}?>><i class="icon-user"></i>Admin Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>branch/list_trainer_details" <?php if($this->uri->segment(2) == 'list_trainer'){echo 'class="active"';}?>><i class="icon-list-alt"></i>Trainer Details</a></li>
    <li class=""><a href="<?php echo base_url();?>superadmin/login_setting" <?php if($this->uri->segment(2) == 'site_configuration'){echo 'class="active"';}?>><i class="icon-cog"></i>Super Admin Configuration</a></li>
    <li class=""><a href="<?php echo base_url();?>superadmin/logout"><i class="icon-off"></i>Logout</a></li>
  </ul>
</div>
<script language="javascript">
$(function(){
		   
		   $("#less").click(function(){
										  $.ajax({
												 url: "<?php echo base_url();?>destroy/admin",
												 success:function(){
													 window.location = "<?php echo base_url();?>course/list_course"; 
													 }
												 });
										  });
		   
		   });
</script>
<!--options-->