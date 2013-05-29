<?php

class Message extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }

        $this->load->model('message_model');
    }

    function home() {

        $data['allMessages'] = $this->message_model->getAllMessages();
        $data['page'] = 'pages/message/list_messages';

        if ($this->session->userdata('admin')) {
            $this->load->view('admin/admin_dash', $data);
        } else if ($this->session->userdata('trainer')) {
            $this->load->view('trainer/trainer_dash', $data);
        } else if ($this->session->userdata('user')) {
            $this->load->view('user/user_dash', $data);
        }
    }

    function compose_message() {
        
        $data['page'] = 'pages/message/compose_message';
        $this->load->view('admin/admin_dash', $data);
    }
    
    

}

?>
