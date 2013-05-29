<?php

class Trainee extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            redirect('login');
        }
        $this->load->model('trainee/trainee_model');
    }

   function index(){

        $data['allTrainings'] = $this->trainee_model->getAllTrainings();

        $data['pages']='pages/training/list_all_trainings';
        $this->load->view('dashboard_view',$data); 

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
    
}

?>
