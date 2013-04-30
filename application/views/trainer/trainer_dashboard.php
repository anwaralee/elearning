<style type="text/css">
object, #mediaplayer_wrapper
{
	  width: 0px;,!important
      height: 0px;!important
}
</style>
<?php
require 'includes/header.php';
?>

<div class="admin_wrapper">
 <?php require 'includes/left.php';?>
 <div class="option_content floatLeft">
<?php		
	if(isset($dashboard))
	$this->load->view($dashboard);
?>
</div>
<div class="clear"></div>
 </div><!--admin-wrapper-->