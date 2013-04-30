<?php
class Course_front extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}
        $this->load->model('course_model_front');
	}
	function browse_course()
	{
		$data['type'] = $this->course_model_front->getType();
		$data['cat'] = $this->course_model_front->getCat();
		$data['page'] = 'pages/browse';
		$this->load->view('home',$data);
	}
	function search()
	{
		$cid = $_POST['cat'];
		$tid = $_POST['type'];
		$data['course'] = $this->course_model_front->getCourse();
		$data['page'] = 'pages/search';
		$this->load->view('home',$data);
	}
}
?>