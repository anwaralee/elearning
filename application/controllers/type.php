<?php
class type extends  CI_Controller
{
	function __construct()
	{
        parent::__construct();
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}
        $this->load->model('admin/type_model');
	}
	function list_type()
	{
		$data['cat'] = $this->type_model->list_type();
		$data['page'] = 'admin/pages/type/list_type';
		$this->load->view('admin/admin_dash',$data);
	}
	function remove()
	{
		$res = $this->type_model->remove();
		redirect('type/list_type');
	}
	
	function add_type()
	{
		$data['page'] = 'admin/pages/type/add_type';
		$this->load->view('admin/admin_dash',$data);
	}
	function add()
	{
		$this->type_model->add();
		redirect('type/list_type');
	}
	function edit_type()
	{
		$data['records'] = $this->type_model->get_course_type_recs();
		$data['page'] = 'admin/pages/type/edit_type';
		$this->load->view('admin/admin_dash',$data);
	}
	function edit()
	{
		$this->type_model->edit();
		redirect('type/list_type');
	}
	
}
?>