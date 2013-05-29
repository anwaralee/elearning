<?php 
	if($document)
	{
		$d=mysql_fetch_assoc($document);	
	?>
    <h2><?php echo $d['doc_title']; ?></h2>
    <table>
    <tr><td>Description:</td><td><?php if($d['doc_desc']!=NULL) echo $d['doc_desc']; else echo "No Description Available"?></td></tr>
    
    </table>
    <?php
	}
	else echo "<b>No Document Information Available</b>";
	?>
	<br /><br /><br />
    <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
