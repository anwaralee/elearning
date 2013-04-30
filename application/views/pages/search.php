<h2>Search Result</h2>
<?php
if($course)
{
	while($c = mysql_fetch_assoc($course))
	{
		?>
        <div class="courses">
        <h3><?php echo $c['course_name'];?></h3>
        <?php 
		$this->load->model('course_model_front');
		echo $this->course_model_front->get_c_type($c['course_type_id']);
		?>
        (Type) | 
        <?php 
		echo $this->course_model_front->get_c_cat($c['cat_id']);
		?>(Category)
        </div>
        <?php		
	}
}