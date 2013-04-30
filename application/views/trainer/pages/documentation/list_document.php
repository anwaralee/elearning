<div class="h_left"><h2>Document(s)</h2></div>
<div class="seperator"></div>
<table width="50%">
<tr>
<th>S/N</th>
<th>Title</th>
<th>Action</th>
</tr>

<?php
if($document)
{
	$i = 0;
	while($c = mysql_fetch_assoc($document))
	{
		$i++;
		echo "<tr>
		<td class='c_left'>".$i."</td>
		<td class='c_right'>".$c['doc_title']."</td>
		<td class='action'>
		<a href= '".base_url()."documentation/view_document/".$c['doc_id']."' class='btn btn-danger'>View Details</a>";
		if($c['doc_file']!=NULL)
		{
		echo "&nbsp;<a href= '".base_url()."documentation/view_docs/".$c['doc_id']."' class='btn btn-danger'>View File</a>";
		}
		else echo "<b> The document has no file</b>";
		if($c['doc_file']!=NULL && $c['isDownloadable']==1)
		{
		echo "&nbsp;<a href = '".base_url()."documentation/download/".$c['doc_id']."' class='btn btn-info'>Download</a>";
		}
		echo "</td></tr>";
	}
}
?>
</table>