<?php
	$this->load->model('next_model');
	$title=$this->next_model->getCourseTitle($id);
	//$catid=$this->next_model->getCategoryId($id);
	$this->next_model->admin_email($title);
?> 
<h2>Success</h2>
<hr/>
Congratulations!
<p>
You've successfully completed the Lesson - <?php echo $title;?>.
</p>

 <a href="<?php echo base_url();?>lesson/<?php echo $id;?>" class="btn btn-info">Next Lesson</a> | <a href="<?php echo base_url();?>dashboard" class="btn btn-info">Cancel</a> 
