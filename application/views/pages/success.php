<?php 
	$this->load->model('next_model');
	//$title=$this->next_model->getCourseTitle($id);
	$catid=$this->next_model->getCategoryId($id);
	$cat=$this->next_model->getCategoryTitle($catid);
	$this->next_model->admin_email2($cat);
?>
<h2>Success</h2>
<hr/>
Congratulations!
<p>
You've successfully completed all the Lessons and their tests for the course - <?php echo $cat;?>.
</p>

<a href="<?php echo base_url();?>dashboard" class="btn btn-info">Go to dashboard</a>