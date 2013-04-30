<?php echo "Logged in as ".$user;?><br>

<b>Select Courses</b>
<form action="<?php echo base_url().'dashboard/search_course'?>" method="post">
	<select name="category">
    	<option value="nocat" checked="checked">--Select Category--</option>
        <?php 
		if(isset($category))
		{
			while($cat=mysql_fetch_assoc($category))
			{
		?>
			<option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_title'];?></option> 	
        <?php
			}
		}
		?>
    </select>
    <select name="type">
    	<option value="notype" checked="checked">--Select Type--</option>
        <?php
		if(isset($type))
		{
				while($types=mysql_fetch_assoc($type))
				{
		?>
        		<option value="<?php echo $types['course_type_id']?>"><?php echo $types['course_type_title'];?></option>
        <?php 
				}
		}
		?>
     </select>
     
     <input type="submit" value="Search"/>
</form>
<?php
if($course != NULL)
{echo "<h2><b>Search Result</b></h2><hr>";
	while($co=mysql_fetch_assoc($course))
	{
		?>
        <div class="course" style="width:100%;background-color:#3F3">
        	<h3><?php echo $co['course_name'];?></h3><br>
            <?php
			if(isset($co['course_type_title']))
			{
			$type = $co['course_type_title'];
			}
			if(isset($co['cat_title']))
			{
			$cat = $co['cat_title'];
			}
			if(isset($co['course_file']))
			{
			$file = $co['course_file'];
			}
			if(isset( $co['course_id']))
			{
			$c_id = $co['course_id'];
			}
			if(isset($co['course_type_id']))
			{
			$ct_id = $co['course_type_id'];
			}
			if($type) {
			?>
            <b><?php echo $type;?></b>(type) |<?php }  if($cat){?> <b><?php echo $cat;?></b>(category)<?php }else echo "Cat not selected";?> |
            <?php
			if($type=='video')
			{ ?>
				<a href="<?php echo base_url().'courses/view_video/'.$file;?>"target="_blank">View Now</a>
				<?php 
			}
			else if($type=='pdf' || $type=='slideshow')
			{?>
                <a href="<?php echo base_url().'courses/view_course/'.$file;?>"target="_blank">View Now</a>
            <?php
			}
			/*else if($type=='slideshow')
			{?>
            <a href="<?php echo base_url().'courses/view_course/'.$file;?>"target="_blank">View Now</a>
			<?php		
			}*/
			?> | <a href="<?php echo base_url()."courses/download/".$co['course_name']."/".$c_id."/".$ct_id;?>">Download</a>
        </div>
        <?php
	}
	?>
	
	<div id='pagination'><?php echo $this->pagination->create_links();?></div>
<?php }
//else echo "<h2><b>No Course of the type and category available.</b></h2>";
?>