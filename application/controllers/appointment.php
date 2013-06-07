<?php

class Appointment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        if($this->session->userdata('admin')){
            $this->load->model('admin/schedule_model');
            
        }
        if($this->session->userdata('user')){
            $this->load->model('trainee/trainee_model');
        }
        
        
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

    function remove() {
        $res = $this->appointment_model->remove();
        redirect('appointment/list_appointments');
    }

    function configure_working_days() {
        if ($this->session->userdata('admin')) {
            $data['selectedDays'] = $this->schedule_model->getSelectedDays();
            $data['page'] = 'admin/pages/appointments/configure_working_days';
            $this->load->view('admin/admin_dash', $data);
        }
    }

    function add_working_days() {
        if ($this->session->userdata('admin')) {
            $this->schedule_model->addWorkingDays();
            redirect('appointment/list_appointments');
        }
    }

    function enroll() {
        if ($this->session->userdata('user')) {
            
            
            $data['allTimeslots'] = $this->appointment_model->getAllTimeslots();
            $data['user'] = $this->trainee_model->getTraineeDetails();
            $data['pages'] = 'pages/enrollment/appointment';
            $this->load->view('enrollment_view', $data);
        }
    }
    
    function getTimeSlots($branchId,$date){
        echo $branchId;
        echo $date;
        $data['timeSlots'] = $this->appointment_model->getTimeSlotsByBranchAndDate($branchId,$date);
        $this->load->view('timeslot_by_branch',$data);
        
    }
    
     function bookSession() {
        
         $this->appointment_model->bookAppointment();
        
         redirect('trainee');
        
    }

}