<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the log?");	
}
</script>
<?php
if($logs)
{
	?>
<table width="100%">
<tr class="heading"><th> S.N </td><th> Username </th><th>LogIn Date-Time </th><th>LogOut Date-Time </th><th> IP </th><th>Log Status</th><th> Action </th></tr>
<?php
$i=0;
foreach($logs as $log)
{
	$i++;
	$this->load->model('admin_model');
	$username = $this->admin_model->getlogUser($log->user_id);
	echo "<tr><td>".$i."</td><td>".$username."</td><td>".$log->user_login_date."</td><td>".$log->user_logout_date."</td><td>".$log->ip."</td><td>";
	if($log->log_status==1){echo "Logged In";}else echo "Logged Out";
	echo "</td><td><a href= '".base_url()."admin/delete_log/".$log->log_id."' class='btn btn-danger' onclick='return show_confirm();'>Remove</a></td></tr>";	
}
?>
</table>
<?php
}?>