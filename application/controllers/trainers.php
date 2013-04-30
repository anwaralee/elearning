<?php
	class Trainers extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('admin'))
			redirect('login');
			$this->load->model('admin/trainer_model');
		}
		
		public function index()
		{
			if($this->session->userdata('admin'))	
			redirect('trainers/list_trainer');
			else redirect('login');
		}
		
		function list_trainer()
		{
			$data['trainer']=$this->trainer_model->list_trainer();
			$data['page']='admin/pages/trainer/list_trainer';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function add_trainer()
		{
			$data['page']='admin/pages/trainer/add_trainer';
			$this->load->view('admin/admin_dash',$data);	
		}
		
		function add()
		{
			$this->trainer_model->add_trainer();
			redirect('trainers/list_trainer');
		}
		
		function edit_trainer()
		{	
			$user=$this->uri->segment(3);
			$data['userDetail']=$this->trainer_model->edit_trainer($user);
			$data['page']='admin/pages/trainer/edit_trainer';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function update_trainer()
		{	
			$this->trainer_model->update_trainer();
			redirect('trainers/list_trainer');
		}
		
		function delete_trainer()
		{	
			$this->trainer_model->delete_trainer();
			redirect('trainers/list_trainer');
		}
	}
?>