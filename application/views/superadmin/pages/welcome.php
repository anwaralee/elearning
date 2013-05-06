<?php
if(isset($superadmin_content) && ($superadmin_content)!=NULL)
{
	echo "<h2>".$superadmin_content->staticpage_title."</h2>" ;
	echo "<div class='seperator'></div>" ;
	echo $superadmin_content->staticpage_content;
	}
	else
	{

?>
<h2>Hello Super Administrator,</h2>
<div class="seperator"></div>
<p>Please select one of the option on the left to begin. </p>

<?php } ?>