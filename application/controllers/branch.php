<?php

class Branch extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('superadmin')) {
            redirect('superadmin');
        }
        $this->load->model('branch_model');
    }

    function list_branches() {

        $data['allBranches'] = $this->branch_model->listAllBranches();
        $data['page'] = 'superadmin/pages/branch/list_branch';
        $this->load->view('superadmin/superadmin_dash', $data);
    }

    function add_branch() {
        $data['page'] = 'superadmin/pages/branch/add_branch';
        $this->load->view('superadmin/superadmin_dash', $data);
    }

    function add() {
        $this->branch_model->addBranch();
        redirect('branch/list_branches');
    }

    function edit_branch() {
        $data['branchById'] = $this->branch_model->getAllBranchesByID();
        $data['page'] = 'superadmin/pages/branch/edit_branch';
        $this->load->view('superadmin/superadmin_dash', $data);
    }

    function edit() {
        $this->branch_model->editBranch();
         redirect('branch/list_branches');
    }
    
    function remove()
	{
		$res = $this->branch_model->remove();
		redirect('branch/list_branches');
	}

    function list_trainer_details(){
        $data['allBranches'] = $this->branch_model->listAllBranches();
        $data['page'] = 'superadmin/pages/branch/list_trainer_details';
        $this->load->view('superadmin/superadmin_dash', $data);
        
    }
    
    function edit_trainer_details(){
        $data['branchById'] = $this->branch_model->getAllBranchesByID();
        $data['page'] = 'superadmin/pages/branch/edit_trainer_details';
        $this->load->view('superadmin/superadmin_dash', $data);
       }
       
    function update_trainer_details(){
        $this->branch_model->editTrainerDetails();
        redirect('branch/list_trainer_details');
    }
}

?>
