<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course type?");	
}
</script>
<div class="h_left"><h2>Resource Manager</h2></div>
<div class="seperator"></div>
<table width="50%">
<tr>
<th>S/N</th>
<th>Title</th>
</tr>

<?php
if($cat)
{
	$i = 0;
	while($c = mysql_fetch_assoc($cat))
	{
		$i++;
		echo "<tr><td class='c_left'>".$i."</td><td class='c_right'>".$c['course_type_title']."</td></tr>";
	}
}
?>
</table>