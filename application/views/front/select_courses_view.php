<?php
if($this->session->userdata('history'))
{
	?>
    <script language="javascript">alert('You cant proceed without completing previous lesson.');</script>
    <?php
	$this->session->unset_userdata('history');
}
?>
<script language="javascript">
$(function (){
$("#register").validate({      //register is the foem class name
rules: {
category: {
required: true
}
},
messages: {

category: {
required: "Please select a course in order to continue."

}
}
});

});

</script>
<?php /*?><?php echo "Logged in as ".$user;?><br><?php */
$this->load->model('dashboard_model');
?>
<h2>Select Courses</h2>
<div class="seperator"></div>
<form action="<?php echo base_url().'dashboard/select_courses'?>" method="post" id="register">
	<select name="category" class="required">
    	<option checked="checked" option value="">--Select Course--</option>
        <?php 
		if(isset($category))
		{
			while($cat=mysql_fetch_assoc($category))
			{
		?>
			<option value="<?php echo $cat['cat_id'];?>"
            <?php
            if(isset($_POST['submit']))
            {
                if($_POST['category']==$cat['cat_id'])
                {
                 ?>
                  selected="selected"
                 <?php
                }
            }
            else if($this->session->userdata('search_course'))
            {
                if($this->session->userdata('search_course')==$cat['cat_id'])
                {
                 ?>
                  selected="selected"
                 <?php
                }
            }
            ?>
            ><?php echo $cat['cat_title'];?></option> 	
        <?php
			}
		}
		?>
    </select><br />
     <div class="seperator"></div>
     <input type="submit" value="Go" class="btn btn-primary" name="submit"/>
</form>

	
    <?php
	if(isset($_POST['submit']) || $this->session->userdata('search_course')){
		$i=1;
if($course != NULL)
{		
		echo " <div class='seperator'></div>";
		echo "<h2><b>".$cats."</b></h2>";
		echo " <div class='seperator'></div>";
	while($co = mysql_fetch_assoc($course))
	{
		if($co['course_type_title'] != 0)
		$type = $co['course_type_title'];
		else
		$type = NULL;
		if($co['cat_id'] != 0)
		$cat = $this->dashboard_model->getCategoryTitle($co['cat_id']);
		else
		$cat = NULL;
		?>
        <div class="serachresults">
        	<h3><?php echo $i.".".$co['course_name'];?> <span class="h3side">(<?php if($cat) { echo $cat; }?>)</span></h3>
                                   <?php
			if(isset($co['course_file']))
			{
			$file = $co['course_file'];
			}
			if(isset( $co['course_id']))
			{
			$c_id = $co['course_id'];
			}
			$type = $co['course_type_title'];
			if($type)
			{
			?>
<!--            <h3>Resource:</h3>-->
			<?php
			if(strcmp('video',strtolower( $type))==0)
			//if(preg_match("/video/i", $type))
			//if($type=='Video')
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/videoicon.png" />
				<?php 
				}
				else if(strcmp('youtube video',strtolower( $type))==0)
			//else if(preg_match("/youtube video/i", $type))
			//if($type=='Youtube Video')
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/youtubeicon.png" />
				<?php 	
				}
				else if(strcmp('document',strtolower( $type))==0)
			//else if(preg_match("/document/i", $type))
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/docicon.png" />
				<?php 	
				}
			else if(strcmp('slideshow',strtolower( $type))==0)
			//if($type=='Slideshow')
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/slideshowicon.png" />
				<?php 	
				}
			else if(strcmp('pdf',strtolower( $type))==0)
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/pdficon.png" />
				<?php 	
				}
				else if(strcmp('questionaire',strtolower( $type))==0)
				{
				?>
				<img src="<?php echo base_url();?>images/admin/icons/testsicon.png" />
				<?php 	
				}
			echo $type; }?> | <?php if($co['doc_size']) { echo $co['doc_size']."|"; }?> 			
            <?php if((strcmp('video',strtolower( $type))==0) || (strcmp('audio',strtolower( $type))==0) || (strcmp('youtube video',strtolower( $type))==0)) 
			//if($type=='Video' || $type=='Audio' || $type=='Youtube Video')
			{
			?>
                <?php 
                if($co['course_length']) 
                { 
                	echo $co['course_length'] . " | " ; 
                } 
                else echo "Length of the video/audio not available | ";
			}
			?>
			

 
            <?php
			if(strcmp('video',strtolower( $type))==0 || strcmp('audio',strtolower( $type))==0)
			{ ?>
				<a href="<?php echo base_url().'courses/view_video/'.$file;?>" class="btn btn-info">View Now</a>
				<?php 
			}
			else if((strcmp('pdf',strtolower( $type))==0) || (strcmp('slideshow',strtolower( $type))==0) || (strcmp('document',strtolower( $type))==0))
			{?>
                <a href="<?php echo base_url().'courses/view_course/'.$file;?>" class="btn btn-info">View Now</a>
            <?php
			}
			else if(strcmp('youtube video',strtolower( $type))==0)
			{?>
                <a href="<?php echo base_url().'courses/view_course_content/'.$co['course_id'];?>" class="btn btn-info">View Now</a>
            <?php
			}
			else if(strcmp('questionaire',strtolower( $type))==0)
			{?>
                <a href="<?php echo base_url().'courses/view_questionaire/'.$co['course_id'];?>" class="btn btn-info">View Now</a>
            <?php
			}
			/*else if($type=='slideshow')
			{?>
            <a href="<?php echo base_url().'courses/view_course/'.$file;?>"target="_blank">View Now</a>
			<?php		
			}*/
			if($co['download']==1)
			{
			?><a href="<?php echo base_url()."courses/download/".$c_id."/".$type;?>" class="btn btn-success">Download</a>
            <?php }?>
        </div>
        <div class="seperator"></div>
        <?php
		$i++;
	}
	?>

	
	<div id='pagination'><?php //echo $this->pagination->create_links();?></div>
<?php }
else if($course==NULL) echo "<h3><b>No Course available.</b></h3>"; 
}

?>