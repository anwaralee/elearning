<?php

class Trainee_model extends CI_Model {

    function getAllTrainings(){

        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users',array('username'=>$username))->row();

        $this->db->select('*');
        $this->db->from('tbl_training');
        $this->db->join('tbl_training_users', 'tbl_training.course_id = tbl_training_users.course_id');
        $this->db->where('tbl_training_users.user_id',$result->user_id);
        $this->db->order_by('tbl_training.training_date');
        $this->db->order_by('tbl_training.timeslot_id');
        return $this->db->get()->result();

    }
 
    function getTimeSlotNameById($id){

        return $this->db->get_where('tbl_timeslot_trainings',array('timeslot_id'=>$id))->row();
    }

 function getLessonNameById($id){

        return $this->db->get_where('tbl_lesson',array('lesson_id'=>$id))->row();
    }
     function getCourseNameById($id){

        return $this->db->get_where('tbl_course',array('course_id'=>$id))->row();
    }
     function getTrainerNameById($id){

        return $this->db->get_where('tbl_trainer',array('trainer_id'=>$id))->row();
    }

    function getAllCourseDocs(){
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users',array('username'=>$username))->row();
        
        $training = $this->db->get_where('tbl_training_users',array('user_id'=>$result->user_id))->row();

        $lesson = $this->db->get_where('tbl_training',array('training_id'=>$training->training_id))->row();
        return $this->db->get_where('tbl_doc',array('lesson_id'=>$lesson->lesson_id,'doc_type'=>1))->result();
    }

    function getAllCourseAssigns(){
        $username = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users',array('username'=>$username))->row();
        
        $training = $this->db->get_where('tbl_training_users',array('user_id'=>$result->user_id))->row();

        $lesson = $this->db->get_where('tbl_training',array('training_id'=>$training->training_id))->row();
        return $this->db->get_where('tbl_doc',array('lesson_id'=>$lesson->lesson_id,'doc_type'=>2))->result();
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
 }

?>