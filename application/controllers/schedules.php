<?php 
	class Schedules extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('trainer'))
			redirect('login');
			$this->load->model('trainer/schedule_model');
		}
		
		public function index()
		{
			if($this->session->userdata('trainer'))	
			redirect('schedules/list_schedule');
			else redirect('login');
		}
		
		function list_schedule()
		{
			$data['schedule'] = $this->schedule_model->list_schedule();
			$data['dashboard'] = 'trainer/pages/schedule/list_schedule';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
		
		function view_schedule()
		{
			$data['schedules']=$this->schedule_model->view_schedule();
			$data['dashboard'] = 'trainer/pages/schedule/view_schedule';
			$this->load->view('trainer/trainer_dashboard',$data);	
		}
	}
?>