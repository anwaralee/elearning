<?php
class Lesson_old extends CI_Controller
{
	function __construct()
	{
		parent :: __construct();
		if(!$this->session->userdata('user'))
		redirect('login');
		$this->load->model('lesson_model');
	}
	function index()
	{
		$this->lesson_model->next();
	}
	function complete()
	{
		$check = $this->lesson_model->complete();
		if($check)
		{
			$data['pages']='front/congrats';
			$data['cat'] = $this->lesson_model->getCat();
			$this->load->view('dashboard_view',$data);
		}
	}
}
?>