<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the document?");	
}
</script>
<div class="h_left"><h2>Document Manager</h2></div>
<div class="seperator"></div>
<div class="add_new"><a href="<?php echo base_url();?>document_manager/add" class="btn btn-inverse">Add New</a></div>
<div class="seperator"></div>
<?php
if($document)
{
    ?>
    <table width="50%">
    <tr>
    <th>S/N</th>
    <th>Title</th>
    <th>Action</th>
    </tr>
    <?php
	$i = 0;
	while($c = mysql_fetch_assoc($document))
	{
		$i++;
		echo "<tr><td>".$i."</td>
		<td class='c_right'>".$c['doc_title']."</td>
		<td class='action'>
		<a href= '".base_url()."document_manager/delete_document/".$c['doc_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
		<a href = '".base_url()."document_manager/edit_document/".$c['doc_id']."' class='btn btn-info'>Edit</a>
		</td></tr>";
	}
}
else echo "<h2><font color='red'>No Documents</font></h2>";
?>
</table>