<?php
class SuperAdmin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         
              $this->load->model('superadmin/superlogin_model');
              $this->load->model('superadmin/super_site_conf_model');
         
    }
    function index(){
        
        if($this->session->userdata('superadmin')){
            redirect('superadmin/superadmin_dashboard');
        }
        else {
            $this->load->view('superadmin/login');
        }
    }
    
    function verifyLogin(){
        
        $result = $this->superlogin_model->verifyLoginModel();
        if($result && $this->session->userdata('superadmin')){
            redirect('superadmin/superadmin_dashboard');
        }
        else {
            $data['error'] = "Invalid Username or Password";
            $this->load->view('superadmin/login', $data);
        }
       
    }
    
    function superadmin_dashboard(){
        
        if($this->session->userdata('superadmin'))
		{
		$data['superadmin_content']=$this->superlogin_model->superadmin_content();
               
		$data['page'] = 'superadmin/pages/welcome';
		$this->load->view('superadmin/superadmin_dash',$data);
		}
		else
		redirect('superadmin');
        
    }
    
     function logout() {
      if ($this->session->userdata('superadmin')) {
            $this->session->unset_userdata('superadmin');
        } 
        redirect('superadmin');
    }
    
         function site_configuration()
	{
		$data['page'] = 'superadmin/pages/site_conf/show_options';
		$this->load->view('superadmin/superadmin_dash',$data);
	}
	function login_setting()
	{
		$data['admin'] = $this->super_site_conf_model->login_setting();
		$data['page'] = 'superadmin/pages/site_conf/login_setting';
		$this->load->view('superadmin/superadmin_dash',$data);
	}
	
	function edit_login()
	{
		$edit=$this->super_site_conf_model->edit_login();	
		$data['msg'] = 'Your Log In information have been updated.';
		$data['admin'] = $this->super_site_conf_model->login_setting();
		$data['page'] = 'superadmin/pages/site_conf/login_setting';
		$this->load->view('superadmin/superadmin_dash',$data);
	}
	
	      
}
?>