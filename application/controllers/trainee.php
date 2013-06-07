<?php

class Trainee extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('date');
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
        $this->load->model('trainee/trainee_model');
    }

   function index(){
       
       $status = $this->trainee_model->getCourseStatus();
       
       if(!empty ($status)){
           $enrollmentStatus = $status->enrollment_status;
           if($enrollmentStatus==2){
                $data['courseStatus'] = $status;
                
                $data['appDetails'] = $this->trainee_model->getAppointmentDetails($status->training_id);
                $data['pages']='pages/training/booked_status';
                $this->load->view('enrollment_view',$data);
           }
           else if($enrollmentStatus==1){
                $data['pages']='pages/training/welcome_course';
                $this->load->view('dashboard_view',$data); 
           }
       }
       else{
        $data['allTrainings'] = $this->trainee_model->getAllTrainings();
        $data['pages']='pages/training/list_all_trainings';
        $this->load->view('enrollment_view',$data); 
       }
        

   }

   function view_all_documents(){

        $data['allDocs'] = $this->trainee_model->getAllCourseDocs();
        $data['pages'] = 'pages/training/list_all_documents';

   
        $this->load->view('dashboard_view',$data); 

   }

   function view_all_assignments(){

        $data['allDocs'] = $this->trainee_model->getAllCourseAssigns();
        $data['pages'] = 'pages/training/list_all_assignments';

   
        $this->load->view('dashboard_view',$data); 

   }

   function view_docs() {
        $data['f'] = $this->trainee_model->view_docs();
        $data['pages'] = 'pages/training/view_docs';
        $this->load->view('dashboard_view', $data);
    }

    function download() {
        $this->load->helper('download');
        $id = $this->uri->segment(3);
        $fil = $this->trainee_model->download($id);
        if ($fil != NULL) {
            $file = mysql_fetch_assoc($fil);
            $path = str_replace('system/', '', BASEPATH) . "docs/" . $file['doc_file'];
            $data = file_get_contents($path); // Read the file's contents
            $name = $file['doc_file'];
            force_download($name, $data);
        }
        else
            redirect('trainee/view_all_documents');
    }
    
    function enrollment(){
        $data['traineeDetails'] = $this->trainee_model->getTraineeDetails();
        $data['pages']='pages/enrollment/enrollment_form';
        $this->load->view('enrollment_view',$data);
    }
    
    function submit(){
        $data['allSchedules'] = $this->trainee_model->getAllSchedules();
        $data['pages'] = 'pages/training/submit_assignment';
        $this->load->view('dashboard_view', $data);
        
    }
    
    function submit_assignment() {
        $this->trainee_model->submit_assignment();
        redirect('trainee/view_all_assignments');
    }
    
}

?>
