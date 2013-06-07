<?php

class Documentation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('trainer'))
            redirect('login');
        $this->load->model('trainer/documentation_model');
        $this->load->model('dashboard_model');
    }

    public function index() {
        if ($this->session->userdata('trainer'))
            redirect('documentation/list_document');
        else
            redirect('login');
    }

    function list_document() {
        $data['allSchedules'] = $this->documentation_model->getAllSchedules();
        $data['dashboard'] = 'trainer/pages/documentation/list_document';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function list_document_by_schedule($trainingId) {
        $data['documents'] = $this->documentation_model->getDocumentBySchedule($trainingId);
        $data['dashboard'] = 'trainer/pages/documentation/list_document_by_id';
        $this->load->view('trainer/trainer_dashboard', $data);
    }
    
    function getDocumentBySchedule($lessonId){
        $data['documents'] = $this->documentation_model->getDocumentBySchedule($lessonId);
        $this->load->view('trainer/pages/documentation/list_document_by_schedule',$data);
    }

    function view_docs() {
        $data['f'] = $this->documentation_model->view_docs();
        $data['dashboard'] = 'trainer/pages/documentation/view_docs';
        $this->load->view('trainer/trainer_dashboard', $data);
    }
    
     function view_assignments() {
        $data['f'] = $this->documentation_model->view_assignments();
        $data['dashboard'] = 'trainer/pages/documentation/view_docs';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function view_document() {
        $data['document'] = $this->documentation_model->view_document();
        $data['dashboard'] = 'trainer/pages/documentation/view_document';
        $this->load->view('trainer/trainer_dashboard', $data);
    }

    function download() {
        $this->load->helper('download');
        $id = $this->uri->segment(3);
        $fil = $this->documentation_model->download($id);
        if ($fil != NULL) {
            $file = mysql_fetch_assoc($fil);
            $path = str_replace('system/', '', BASEPATH) . "docs/" . $file['doc_file'];
            $data = file_get_contents($path); // Read the file's contents
            $name = $file['doc_file'];
            force_download($name, $data);
        }
        else
            redirect('documentation');
    }
    
    function download_assignments() {
        $this->load->helper('download');
        $id = $this->uri->segment(3);
        $fil = $this->documentation_model->download_assignment($id);
        if ($fil != NULL) {
            $file = mysql_fetch_assoc($fil);
            $path = str_replace('system/', '', BASEPATH) . "docs/" . $file['doc_file'];
            $data = file_get_contents($path); // Read the file's contents
            $name = $file['doc_file'];
            force_download($name, $data);
        }
        else
            redirect('documentation');
    }

}

?>