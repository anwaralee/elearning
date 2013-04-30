<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the user?");	
}
</script>
<div class="h_left"><h2>User Manager</h2></div>
<div class="seperator"></div>
<table width="50%">
<tr>
<th>S/N</th>
<th>Username</th>
<th>Action</th>
</tr>
<?php
if($user)
{
	$i = 0;
	while($c = mysql_fetch_assoc($user))
	{
		$i++;
		echo "<tr><td>".$i."</td><td class='c_right'>".$c['username']."</td><td class='action'><a href= '".base_url()."user/remove/".$c['user_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> <a href = '".base_url()."user/view_user/".$c['user_id']."' class='btn btn-info'>View</a> <a href = '".base_url()."user/logs_user/".$c['user_id']."' class='btn btn-info'>eLearning Logs</a></td></tr>";
	}
}
?>
</table>