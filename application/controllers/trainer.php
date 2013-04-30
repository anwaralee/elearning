<?php
	class Trainer extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('trainer'))
			redirect('login');
			$this->load->model('trainer/trainer_model');
		}
		
		public function index()
		{
			if($this->session->userdata('trainer'))	
			redirect('trainer/dashboard');
			else redirect('login');
		}
		
		public function dashboard()
		{
			$data['dashboard_content']=$this->trainer_model->dashboardContent();
			$data['user']=$this->session->userdata('trainer');
			$data['dashboard']='trainer/pages/welcome';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
		
		function account_settings()
		{	
			$user=$this->session->userdata('trainer');
			$data['user']=$user;
			$data['userDetail']=$this->trainer_model->account_settings($user);
			$data['dashboard']='trainer/pages/account_settings_view';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
		
		function update_settings()
		{	
			$data['updateData']=$this->trainer_model->update_settings();
			$data['user']=$this->session->userdata('trainer');
			$data['dashboard']='trainer/pages/update_settings_view';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
	}
?>