<?php
class Admin extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('admin'))
		{
			redirect('admin_dashboard');
		}
		else
		{
		if($this->session->userdata('user'))
		$this->session->unset_userdata('user');
		redirect('login');
		}
	}
	
	function admin_dashboard()
	{
		if($this->session->userdata('admin'))
		{
		$this->load->model('admin_model');
		$data['admin_content']=$this->admin_model->admin_content();
		$data['page'] = 'admin/pages/welcome';
		$this->load->view('admin/admin_dash',$data);
		}
		else
		redirect('admin');
	}
	
	function view_logs()
	{
		if($this->session->userdata('admin'))
		{
			$this->load->model('admin_model');
			$data['logs'] = $this->admin_model->view_logs();
			$data['page'] = 'admin/pages/logs';
			$this->load->view('admin/admin_dash',$data);
		}
		else
		redirect('admin');
	}
	
	function delete_log()
	{
		if($this->session->userdata('admin'))
		{
		$this->load->model('admin_model');
		$this->admin_model->delete_log();
		$data['logs'] = $this->admin_model->view_logs();
		$data['page'] = 'admin/pages/logs';
		$this->load->view('admin/admin_dash',$data);
		}
		else
		{
		redirect ('admin');
		}
	}
}
?>