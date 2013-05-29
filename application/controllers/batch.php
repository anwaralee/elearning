<?php

class Batch extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
        $this->load->model('admin/batch_model');
    }

    function list_batches() {

        $data['allBatches'] = $this->batch_model->listAllBatches();
        $data['page'] = 'admin/pages/batch/list_batch';
        $this->load->view('admin/admin_dash', $data);
    }

    function add_batch() {
        $data['page'] = 'admin/pages/batch/add_batch';
        $this->load->view('admin/admin_dash', $data);
    }

    function add() {
        $this->batch_model->addbatch();
        redirect('batch/list_batches');
    }

    function edit_batch() {
        $data['batchById'] = $this->batch_model->getAllBatchesByID();
        $data['page'] = 'admin/pages/batch/edit_batch';
        $this->load->view('admin/admin_dash', $data);
    }

    function edit() {
        $this->batch_model->editbatch();
         redirect('batch/list_batches');
    }
    
    function remove()
	{
		$res = $this->batch_model->remove();
		redirect('batch/list_batches');
	}

    
}

?>
