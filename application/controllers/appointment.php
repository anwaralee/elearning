<?php
class Appointment extends CI_Controller
{
    function index()
    {
    	$this->load->model('login_model');
        $data['allBranches'] = $this->login_model->getAllBranches();
        $this->load->view('appointment',$data);
    }
    
}