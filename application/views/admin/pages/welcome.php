<?php
if(isset($admin_content) && ($admin_content)!=NULL)
{
	$hc=mysql_fetch_assoc($admin_content);
	echo "<h2>".$hc['staticpage_title']."</h2>" ;
	echo "<div class='seperator'></div>" ;
	echo $hc['staticpage_content'];
	}
	else
	{

?>
<h2>Hello Administrator,</h2>
<div class="seperator"></div>
<p>Please select one of the option on the left to begin. </p>

<?php } ?>