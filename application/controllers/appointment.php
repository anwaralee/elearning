<?php

class Appointment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
    }

    function index() {
        $this->load->model('appointment_model');
        $data['allBranches'] = $this->appointment_model->getAllBranches();
        $data['allTimeslots'] = $this->appointment_model->getAllTimeslots();
        $this->load->view('appointment', $data);
    }

    function register() {
        $result = $this->appointment_model->registerAppointment();
        if ($result) {
            $this->load->view('appointment_complete');
        } else {
            redirect('appointment');
        }
    }

    function list_appointments() {

        if ($this->session->userdata('admin')) {

            $data['allAppointments'] = $this->appointment_model->listAppointments();
            $data['page'] = 'admin/pages/appointments/list_appointments';
            $this->load->view('admin/admin_dash', $data);
        } else {
            redirect('login');
        }
    }
    
    function remove(){
        $res = $this->appointment_model->remove();
	redirect('appointment/list_appointments');
    }

}