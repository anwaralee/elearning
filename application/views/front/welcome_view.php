<div class="dashboard">
<?php
if(isset($user_content) && ($user_content)!=NULL)
{
	$hc=mysql_fetch_assoc($user_content);
	echo "<h2>".$hc['staticpage_title']."</h2>" ;
	echo $hc['staticpage_content'];
	}
	else
	{

?>
<h2><center>Welcome to the Dashboard</center></h2>

<?php } ?>
</div><!--dashboard-->