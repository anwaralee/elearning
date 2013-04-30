<h2>Static Page List</h2>
<div class="seperator"></div>
<?php if(isset($page_list))
	  	{?>
<table width="100%">
<?php
			while($pg=mysql_fetch_assoc($page_list))	
			{
		
?>
	<tr><td><?php echo $pg['staticpage_title'];?></td><td><a href="<?php echo base_url().'page_manager/edit_page/'.$pg['staticpage_id'];?>" class="btn btn-info">Edit</a></td></tr>
<?php
			}
		
?>
</table>
<?php
		}
		
?>
