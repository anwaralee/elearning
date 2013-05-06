<?php require 'includes/header.php';?>


  <div class="admin_wrapper">
    <?php require 'includes/sidebar.php';?>
    <div class="option_content floatLeft">
    <?php
				
if(isset($edit_page)){echo "<font color='red'><b>".$edit_page."</b></font>";}
if(isset($mes)){echo "<font color='red'><b>".$mes."</b></font>";}
if(isset($msg)){echo "<font color='red'><b>".$msg."</b></font>";}
if(isset($page))
	$this->load->view($page);
?>
    </div><!--option_content-->
      <div class="clear"></div>
  </div>

  <?php require 'includes/footer.php';?>