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
    <li class=""><a href="<?php echo base_url();?>category/list_category" <?php if($this->uri->segment(2) == 'list_category'){echo 'class="active"';}?>><i class="icon-th-large"></i>Course Manager</a></li>
    
    <li class=""><a href="<?php echo base_url();?>type/list_type" <?php if($this->uri->segment(2) == 'list_type'){echo 'class="active"';}?>><i class="icon-list"></i>Resource Manager</a></li>
    <li class="">
    <a href="javascript:void(0)" id="less" <?php if($this->uri->segment(2) == 'list_course'){echo 'class="active"';}?>><i class="icon-file"></i>Lesson Manager</a>
    <!--<a href="<?php //echo base_url();?>course/list_course" <?php //if($this->uri->segment(2) == 'list_course'){echo 'class="active"';}?>><i class="icon-file"></i>Lesson Manager</a>--></li>
    <li class=""><a href="<?php echo base_url();?>quiz"><i class="icon-question-sign" <?php if($this->uri->segment(2) == 'logout'){echo 'class="active"';}?>></i>Test Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>user/list_user" <?php if($this->uri->segment(2) == 'list_user'){echo 'class="active"';}?>><i class="icon-user"></i>User Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>admin/view_logs" <?php if($this->uri->segment(2) == 'view_logs'){echo 'class="active"';}?>><i class="icon-list-alt"></i>View Logs</a></li>
    <li class=""><a href="<?php echo base_url();?>page_manager" <?php if($this->uri->segment(2) == 'page_manager'){echo 'class="active"';}?>><i class="icon-book"></i>Page Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>schedule" <?php if($this->uri->segment(1) == 'schedule'){echo 'class="active"';}?>><i class="icon-file"></i>Schedule Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>document_manager" <?php if($this->uri->segment(1) == 'document_manager'){echo 'class="active"';}?>><i class="icon-book"></i>Document Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>trainers/list_trainer" <?php if($this->uri->segment(2) == 'list_trainer'){echo 'class="active"';}?>><i class="icon-user"></i>Trainer Manager</a></li>
    <li class=""><a href="<?php echo base_url();?>site_configuration" <?php if($this->uri->segment(2) == 'site_configuration'){echo 'class="active"';}?>><i class="icon-cog"></i>Site Configuration</a></li>
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