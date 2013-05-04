<?php
class SuperAdmin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('superadmin/superlogin_model');
    }
    function index(){
        
        if($this->session->userdata('superadmin')){
            echo "Is an Admin";
        }
        else {
            $this->load->view('superadmin/login');
        }
    }
    
    function verifyLogin(){
        
        echo "here";
        $data['result'] = $this->superlogin_model->verifyLoginModel();
        echo "Verify Here";
    }
}
?>