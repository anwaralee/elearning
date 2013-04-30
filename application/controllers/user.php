<?php
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}
        $this->load->model('admin/user_model');
	}
	function list_user()
	{
		$data['user'] = $this->user_model->list_user();
		$data['page'] = 'admin/pages/user/list_user';
		$this->load->view('admin/admin_dash',$data);
	}
	function remove()
	{
		$res = $this->user_model->remove();
		redirect('user/list_user');
	}
	function remove_logs()
	{
		$res = $this->user_model->remove_logs();
		redirect('/user/logs_user/'.$this->session->userdata('uri3'));
	}
	function view_user()
	{
		$data['det'] = $this->user_model->view_user();
		$data['page'] = 'admin/pages/user/view_user';
		$this->load->view('admin/admin_dash',$data);
	}
	function active_user()
	{
		$this->user_model->active_user();
		$data['user_edit']="Changes have been uploaded to the user profile";
		$data['det'] = $this->user_model->view_user();
		$data['page'] = 'admin/pages/user/view_user';
		$this->load->view('admin/admin_dash',$data);
	}
	function logs_user()
	{
		$data['user']=$this->user_model->getUser();
		$data['logs']=$this->user_model->logs_user();
		$data['page'] = 'admin/pages/user/logs_user';
		$this->load->view('admin/admin_dash',$data);
	}
}
?>