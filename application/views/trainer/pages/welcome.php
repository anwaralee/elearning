<div class="dashboard">
<?php
if(isset($dashboard_content) && ($dashboard_content)!=NULL)
{
	$hc=mysql_fetch_assoc($dashboard_content);
	echo "<h2>".$hc['staticpage_title']."</h2>" ;
	echo $hc['staticpage_content'];
	}
	else
	{

?>
<h2><center>Welcome to the Dashboard</center></h2>

<?php } ?>
</div>