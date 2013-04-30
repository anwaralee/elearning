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
	if(isset($pages))
	$this->load->view($pages);
?>
</div>
<div class="clear"></div>
 </div><!--admin-wrapper-->


<?php
require 'includes/footer.php';
?>