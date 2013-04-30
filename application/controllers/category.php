<?php
class Category extends  CI_Controller
{
	function __construct()
	{
        parent::__construct();
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}
        $this->load->model('admin/category_model');
	}
	function list_category()
	{
		$data['cat'] = $this->category_model->list_category();
		$data['page'] = 'admin/pages/list_category';
		$this->load->view('admin/admin_dash',$data);
	}
	function remove()
	{
		$res = $this->category_model->remove();
		redirect('category/list_category');
	}
	
	function add_category()
	{
		$data['page'] = 'admin/pages/add_category';
		$this->load->view('admin/admin_dash',$data);
	}
	function add()
	{
		$this->category_model->add();
		redirect('category/list_category');
	}
	function edit_category()
	{
		$data['records'] = $this->category_model->get_cat_recs();
		$data['page'] = 'admin/pages/edit_category';
		$this->load->view('admin/admin_dash',$data);
	}
	function edit()
	{
		$this->category_model->edit();
		redirect('category/list_category');
	}
	
}
?>