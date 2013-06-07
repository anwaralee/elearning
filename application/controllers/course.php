<?php

class Course extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
        $this->load->model('admin/course_model');
    }

    function list_courses() {
      //  $data['allBatches'] = $this->course_model->listAllBatches();
        $data['allCourses'] = $this->course_model->getAllCourses();
        $data['page'] = 'admin/pages/course/list_course';
        $this->load->view('admin/admin_dash', $data);
    }

    function getCourseByBatch($batchId){
        $data['coursesByBatch'] = $this->course_model->getCourseByBatches($batchId);
        $this->load->view('admin/pages/course/list_course_by_batch',$data);
        
        
    }
    
    function getCourseByBatchTrainer($batchId){
        $data['allTrainers'] = $this->course_model->getAllTrainers();
        $data['coursesByBatch'] = $this->course_model->getCourseByBatches($batchId);
        $this->load->view('admin/pages/course/course_trainer',$data);
        
        
    }
    
    function add_course() {
        $data['allBatches'] = $this->course_model->listAllBatches();
        $data['page'] = 'admin/pages/course/add_course';
        $this->load->view('admin/admin_dash', $data);
    }

    function add() {
        $this->course_model->addCourse();
        redirect('course/list_courses');
    }

    function edit_course() {
        $data['allBatches'] = $this->course_model->listAllBatches();
        $data['courseById'] = $this->course_model->getAllCoursesByID();
        $data['page'] = 'admin/pages/course/edit_course';
        $this->load->view('admin/admin_dash', $data);
    }

    function edit() {
        $this->course_model->editCourse();
         redirect('course/list_courses');
    }
    
    function remove()
	{
		$res = $this->course_model->remove();
		redirect('course/list_courses');
	}
        
    function assign_trainer(){
        
        $data['allBatches'] = $this->course_model->listAllBatches();
        $data['allCourses'] = $this->course_model->getAllCourses();
        $data['allTrainers'] = $this->course_model->getAllTrainers();
        
        $data['page'] = 'admin/pages/course/assign_trainer';
        $this->load->view('admin/admin_dash',$data);
    }
    
    function updateTrainer($courseId, $trainerId){
        
        $this->course_model->updateTrainer($courseId,$trainerId);
    }
    
    
    
 
}

?>
