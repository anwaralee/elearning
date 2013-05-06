<?php
class Admin extends CI_Controller
{
	function __construct(){
		 parent::__construct();
		 $this->load->model('admin_model');

	}
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

	function list_admins(){
		$this->load->model('admin_model');
		if($this->session->userdata('superadmin')){

	       	$data['allAdmins'] = $this->admin_model->listAdmins();
	        $data['page'] = 'superadmin/pages/admin/list_admins';
	        $this->load->view('superadmin/superadmin_dash', $data);
		}
		else {
			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
		}
	}

	function add_admin() {
		if($this->session->userdata('superadmin'))
		{
			$data['allBranches'] = $this->admin_model->getAllBranches();
	        $data['page'] = 'superadmin/pages/admin/add_admin';
	        $this->load->view('superadmin/superadmin_dash', $data);
   		}
   		else {
   			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
   		}
    }

    function add() {
    	if($this->session->userdata('superadmin'))
		{
	        $this->admin_model->addAdmin();
	        redirect('admin/list_admins');
	      }
	      else {
   			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
   		}

    }

    function edit_admin() {
    	if($this->session->userdata('superadmin'))
		{
			$data['allBranches'] = $this->admin_model->getAllBranches();
	        $data['adminById'] = $this->admin_model->getAllAdminsByID();
	        $data['page'] = 'superadmin/pages/admin/edit_admin';
	        $this->load->view('superadmin/superadmin_dash', $data);
	    }
	     else {
   			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
   		}
    }

    function edit() {
    	if($this->session->userdata('superadmin'))
		{
        $this->admin_model->editAdmin();
         redirect('admin/list_admins');
     }
      else {
   			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
   		}
    }
    
    function remove()
	{
		if($this->session->userdata('superadmin'))
		{
			$res = $this->admin_model->remove();
			redirect('admin/list_admins');
		}
		else {
   			$this->session->unset_userdata('superadmin');
			redirect('superadmin');
   		}
	}
}
?>