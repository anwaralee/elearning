<?php

class Assignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('trainer'))
            redirect('login');
        $this->load->model('trainer/assignment_model');
    }

    public function index() {
        if ($this->session->userdata('trainer'))
        /* redirect('login'); 	
          else */
            redirect('assignment/assignment_home');
    }
    
    function assignment_home(){
         $data['allSchedules'] = $this->assignment_model->getAllSchedules();
         $data['dashboard'] = 'trainer/pages/assignment/assignment_home';
         $this->load->view('trainer/trainer_dashboard', $data);
    }
    
    function getAssignmentBySchedule($trainingId){
        $data['documents'] = $this->assignment_model->getAssignmentBySchedule($trainingId);
        $this->load->view('trainer/pages/assignment/list_assignment_by_schedule',$data);
    }

    function add() {
        $data['allSchedules'] = $this->assignment_model->getAllSchedules();
        $data['dashboard'] = 'trainer/pages/assignment/add_assignment';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function add_assignment() {
        $this->assignment_model->add_assignment();
        redirect('assignment/assignment_home');
    }

    function list_assignment() {
        $data['assignment'] = $this->assignment_model->list_assignment();
        $data['dashboard'] = 'trainer/pages/assignment/list_assignment';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function edit_assignment() {
        $data['allSchedules'] = $this->assignment_model->getAllSchedules();
        $data['document'] = $this->assignment_model->edit();
        $data['dashboard'] = 'trainer/pages/assignment/edit_assignment';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function update_assignment() {
        $this->assignment_model->edit_assignment();
         redirect('assignment/assignment_home');
    }

    function view_assignment() {
        $data['f'] = $this->assignment_model->view_assignment();
        $data['dashboard'] = 'trainer/pages/assignment/view_assignment';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function delete_assignment() {
        $this->assignment_model->delete_assignment();
          redirect('assignment/assignment_home');
    }
    
    /*
    function view_video() {
        $data['vdo'] = $this->assignmentation_model->view_course();
        $data['dashboard'] = 'trainer/pages/assignmentation/view_video';
        $this->load->view('trainer/trainer_dashboard', $data);
    }*/

   /* function view_course_content() {
        $data['course_content'] = $this->assignmentation_model->view_youtube();
        $data['dashboard'] = 'trainer/pages/assignmentation/view_youtube';
        $this->load->view('trainer/trainer_dashboard', $data);
    }
    * */
    

    function download() {
        $this->load->helper('download');
        $course_id = $this->uri->segment(3);
        $course_type_title = $this->uri->segment(4);
        $fil = $this->assignment_model->download($course_id, $course_type_title);
        if ($fil != NULL) {
            $file = mysql_fetch_assoc($fil);
            $path = str_replace('system/', '', BASEPATH) . "course_content/" . $file['course_file'];
            $data = file_get_contents($path); // Read the file's contents
            $name = $file['course_file'];
            force_download($name, $data);
        }
        else
             redirect('assignment/assignment_home');
    }

}

?>