<?php
class Site_configuration extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin'))
		{
        $this->load->model('admin/site_conf_model');
		}
		else
		{
			redirect('login');
		}
		
	}
	function index()
	{
		$data['page'] = 'admin/pages/site_conf/show_options';
		$this->load->view('admin/admin_dash',$data);
	}
	function login_setting()
	{
		$data['admin'] = $this->site_conf_model->login_setting();
		$data['page'] = 'admin/pages/site_conf/login_setting';
		$this->load->view('admin/admin_dash',$data);
	}
	
	function edit_login()
	{
		$edit=$this->site_conf_model->edit_login();	
		$data['msg'] = 'Your Log In information have been updated.';
		$data['admin'] = $this->site_conf_model->login_setting();
		$data['page'] = 'admin/pages/site_conf/login_setting';
		$this->load->view('admin/admin_dash',$data);
	}
	
	function site_setting()
	{
		$data['site']=$this->site_conf_model->site_setting();
		$data['page']='admin/pages/site_conf/site_setting_view';
		$this->load->view('admin/admin_dash',$data);
	}
	function edit_site_setting()
	{
		$edit=$this->site_conf_model->edit_site_setting();
		$data['mes']='The Site Configuration have been updated.';
		$data['site']=$this->site_conf_model->site_setting();
		$data['page']='admin/pages/site_conf/site_setting_view';
		$this->load->view('admin/admin_dash',$data);
	}
}
?>