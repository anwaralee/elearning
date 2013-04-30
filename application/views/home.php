<?php
require 'includes/header.php';
?>

<div class="admin_wrapper register">
<?php
	if(isset($page))
	$this->load->view($page);
?>
</div>

<?php
require 'includes/footer.php';
?>