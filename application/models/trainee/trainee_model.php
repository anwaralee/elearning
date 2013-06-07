<?php

class Trainee_model extends CI_Model {

    function getAllTrainings() {

        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();

        $this->db->select_min('lesson_id');
        $lesson = $this->db->get_where('tbl_training', array('course_id' => $result->course_id))->row();


        $this->db->select('*');
        $this->db->from('tbl_course_session');
        $this->db->join('tbl_training', 'tbl_course_session.session_id=tbl_training.session_id');
        $this->db->where('tbl_course_session.course_id', $result->course_id);
        $this->db->where('tbl_training.lesson_id', $lesson->lesson_id);
        $this->db->where('tbl_training.status', 1);
        $this->db->where('tbl_course_session.status', 1);
        $this->db->order_by('tbl_training.training_date');
        return $this->db->get()->result();
        //   return $this->db->get_where('tbl_course_session',array('course_id'=>$result->course_id))->result();
    }

    function getTimeSlotNameById($id) {

        return $this->db->get_where('tbl_timeslot_trainings', array('timeslot_id' => $id))->row();
    }

    function getLessonNameById($id) {

        return $this->db->get_where('tbl_lesson', array('lesson_id' => $id))->row();
    }

    function getCourseNameById($id) {

        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }

    function getTrainerNameById($id) {

        return $this->db->get_where('tbl_trainer', array('trainer_id' => $id))->row();
    }

    function getTrainerNameByCourse($courseId) {

        $result = $this->db->get_where('tbl_course_trainer', array('course_id' => $courseId))->row();

        return $this->db->get_where('tbl_trainer', array('trainer_id' => $result->trainer_id))->row();
    }

    function getAllCourseDocs() {
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();

        $training = $this->db->get_where('tbl_training_users', array('user_id' => $result->user_id))->row();

        $lesson = $this->db->get_where('tbl_training', array('training_id' => $training->training_id))->row();
        return $this->db->get_where('tbl_doc', array('lesson_id' => $lesson->lesson_id, 'doc_type' => 1))->result();
    }

    function getAllCourseAssigns() {
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();

        $training = $this->db->get_where('tbl_training_users', array('user_id' => $result->user_id))->row();

        $lesson = $this->db->get_where('tbl_training', array('training_id' => $training->training_id))->row();
        return $this->db->get_where('tbl_doc', array('lesson_id' => $lesson->lesson_id, 'doc_type' => 2))->result();
    }

    function view_docs() {
        $id = $this->uri->segment(3);
        $quer = "select * from tbl_doc where doc_id='$id'";
        $result = mysql_query($quer);
        if (mysql_num_rows($result) > 0) {
            return $result;
        }
        else
            return NULL;
    }

    function download($id) {
        $q = "select doc_file from tbl_doc where doc_id='$id' and isDownloadable=1";
        $result = mysql_query($q);
        if (mysql_num_rows($result) > 0) {
            return $result;
        }
        else
            return NULL;
    }

    function getStartDate($id) {

        $this->db->select_min('lesson_id');
        $this->db->select('training_date');
        return $this->db->get_where('tbl_training', array('session_id' => $id))->row();
    }
    
    function getTraineeDetails(){
        
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();
        return $result;
        
    }
    
    function getSessionNameById($id){
        $this->db->select('session_id');
        $result = $this->db->get_where('tbl_training',array('training_id'=>$id))->row();
        
        $this->db->select('session_name');
        return $this->db->get_where('tbl_course_session',array('session_id'=>$result->session_id))->row();
    }
    
    function getCourseStatus(){
         $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();
        
       
        $this->db->where('course_status',1);
        return $this->db->get_where('tbl_training_users',array('user_id'=>$result->user_id))->row();
    }
    
    function getAppointmentDetails($id){
        return $this->db->get_where('tbl_appointments',array('training_id'=>$id))->row();
    }
    
    function getAppointmentTimeById($id){
        
        return $this->db->get_where('tbl_timeslot_appointments',array('id'=>$id))->row();
    }
    
    function getAdminName($id){
        
        return $this->db->get_where('tbl_admin',array('branch_id'=>$id))->row();
    }
    
     function getAllSchedules() {

        $trainer = $this->session->userdata('trainer');
        $result = $this->db->get_where('tbl_trainer', array('username' => $trainer))->row();
        $trainer_id = $result->trainer_id;

          $this->db->select('lesson_id');
        $this->db->distinct();
        $this->db->order_by('training_date');
        return $this->db->get_where('tbl_training', array('trainer_id' => $trainer_id, 'status' => 1))->result();
    }
    
    function getTrainingNameById($id) {
        
        return $this->db->get_where('tbl_training',array('training_id'=>$id))->row();
    }
    
    function submit_assignment() {
               
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $username))->row();
        
        $course_id = $result->course_id;
        $user_id = $result->user_id;
        $lesson_id = $this->input->post('lesson_id');
        
        $training = $this->db->get_where('tbl_training_users',array('course_id'=>$course_id,'user_id'=>$user_id))->row();
        
        $training_id = $training->training_id;
        $file_name = time() . "_" . rand("100000", "999999");
        $ext = end(explode('.', $_FILES['file']['name']));
       
        $complete = $file_name . "." . $ext;
        $path = str_replace('system/', '', BASEPATH) . '/docs/' . $complete;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $data = array('doc_file' => $complete,
                'training_id'=>$training_id,
                'user_id' => $user_id,
                'lesson_id'=>$lesson_id,
                'status' => 0
            );

            $this->db->insert('tbl_assignment_users', $data);
        } else {
           
             $data = array(
                'training_id'=>$training_id,
                'doc_file' => '',
                'user_id' => $user_id,
                'lesson_id'=>$lesson_id,
                'status' => 0
            );
            
            $this->db->insert('tbl_assignment_users', $data);
        }
    }


}

?>