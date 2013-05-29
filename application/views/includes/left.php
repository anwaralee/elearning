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
   <!-- <li>
   <a href="javascript:void(0)" id="sel_cours" <?php if($this->uri->segment(2) == 'select_courses'){echo 'class="active"';}?>><i class="icon-leaf" ></i><span class="menutext">Select Your Courses</span></a>
   <a href="<?php //echo base_url();?>dashboard/select_courses" <?php //if($this->uri->segment(2) == 'select_courses'){echo 'class="active"';}?>><i class="icon-leaf" ></i><span class="menutext">Select Your Courses</span></a></li>
    <li><a href="<?php// echo base_url();?>quiz" <?php// if($this->uri->segment(2) == 'select_quizes'){echo 'class="active"';}?>><i class="icon-question-sign"></i><span class="menutext">Select Quizes</span></a></li>
     <li><a href="<?php echo base_url();?>courses/course_history" <?php if($this->uri->segment(2) == 'account_settings'){echo 'class="active"';}?>><i class="icon-eye-open"></i><span class="menutext">My Course History</span></a></li>
   <li><a href="<?php echo base_url();?>dashboard/account_settings" <?php if($this->uri->segment(2) == 'account_settings'){echo 'class="active"';}?>><i class="icon-cog"></i><span class="menutext">Update Profile</span></a></li>
   <li><a href="<?php echo base_url();?>login/logout" <?php if($this->uri->segment(2) == 'logout'){echo 'class="active"';}?>><i class="icon-off"></i><span class="menutext">Log Out</span></a></li> -->
   <li><a href="<?php echo base_url();?>trainee"><i class="icon-leaf" ></i><span class="menutext">Training Dashboard</span></a></li>
     <li><a href="#"><i class="icon-eye-open" ></i><span class="menutext">My Payment History</span></a></li>
       <li><a href="<?php echo base_url();?>trainee/view_all_documents"><i class="icon-cog" ></i><span class="menutext">Resources</span></a></li>
         <li><a href="<?php echo base_url();?>trainee/view_all_assignments"><i class="icon-question-sign" ></i><span class="menutext">Assignments</span></a></li>
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