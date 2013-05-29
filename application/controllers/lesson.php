<?php

class Lesson extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('admin')) {
            redirect('admin');
        }
        $this->load->model('admin/lesson_model');
    }

   
    function list_lessons() {
        
        $data['allCourses'] = $this->lesson_model->listAllCourses();
        $data['page'] = 'admin/pages/lesson/list_lesson';
        $this->load->view('admin/admin_dash', $data);
    }

    function getLessonByCourse($courseId) {
        $data['lessonsByCourse'] = $this->lesson_model->getLessonByCourses($courseId);
        $this->load->view('admin/pages/lesson/list_lesson_by_course', $data);
    }

    function add_lesson() {
        $data['allCourses'] = $this->lesson_model->listAllCourses();
        $data['page'] = 'admin/pages/lesson/add_lesson';
        $this->load->view('admin/admin_dash', $data);
    }

    function add() {
        $this->lesson_model->addLesson();
        redirect('lesson/list_lessons');
    }

    function edit_lesson() {
        $data['allCourses'] = $this->lesson_model->listAllCourses();
        $data['lessonById'] = $this->lesson_model->getAllLessonsByID();
        $data['page'] = 'admin/pages/lesson/edit_lesson';
        $this->load->view('admin/admin_dash', $data);
    }

    function edit() {
        $this->lesson_model->editLesson();
        redirect('lesson/list_lessons');
    }

    function remove() {
        $res = $this->lesson_model->remove();
        redirect('lesson/list_lessons');
    }

}

?>
