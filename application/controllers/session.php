<?php

class Session extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
        $this->load->model('admin/session_model');
    }

    function list_sessions() {

        $data['allSessions'] = $this->session_model->listAllSessions();
        $data['page'] = 'admin/pages/session/list_session';
        $this->load->view('admin/admin_dash', $data);
    }

    function add_session() {
        $data['allCourses'] = $this->session_model->getAllCourses();
        $data['page'] = 'admin/pages/session/add_session';
        $this->load->view('admin/admin_dash', $data);
    }

    function add() {
        $this->session_model->addSession();
        redirect('session/list_sessions');
    }

    function edit_session() {
        $data['sessionById'] = $this->session_model->getAllSessionsByID();
        $data['page'] = 'admin/pages/session/edit_session';
        $this->load->view('admin/admin_dash', $data);
    }

    function edit() {
        $this->session_model->editSession();
         redirect('session/list_sessions');
    }
    
    function remove()
	{
		$res = $this->session_model->remove();
		redirect('session/list_sessions');
	}

  
}

?>
