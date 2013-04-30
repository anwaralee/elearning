<?php 
	$id=$this->uri->segment(3);
	$this->load->model('dashboard_model');
	$title=$this->dashboard_model->getCourseTitle($id);
?>
<h2>Success</h2>
<hr/>
Congratulations!
<p>
You've successfully completed the Lesson - <?php echo "$title";?> and test for it.
</p>

<a href="<?php echo base_url();?>dashboard" class="btn btn-info">I'm done for now</a> | <a href="<?php echo base_url();?>lesson/<?php echo $id;?>" class="btn btn-info">Next Lesson</a>
