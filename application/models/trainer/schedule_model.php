<?php

class Schedule_model extends CI_model {

    function list_schedule() {
        $trainer = $this->session->userdata('trainer');
        $result = $this->db->get_where('tbl_trainer', array('username' => $trainer))->row();
        $trainer_id = $result->trainer_id;

        $this->db->order_by('timeslot_id', 'training_date');
        return $this->db->get_where('tbl_training', array('trainer_id' => $trainer_id, 'status' => 1))->result();
    }

    function view_schedule() {
        $id = $this->uri->segment(3);
        $q = mysql_query("select * from tbl_training where training_id='$id'");
        if (mysql_num_rows($q) > 0) {
            return $q;
        }
        else
            return NULL;
    }

    function getTrainer($id) {
        $q = mysql_query("select username from tbl_trainer where trainer_id='$id'");
        if (mysql_num_rows($q) > 0) {
            $res = mysql_fetch_assoc($q);
            return $res['username'];
        }
        else
            return NULL;
    }

    function getTrainingTimeById($id) {

        return $this->db->get_where('tbl_timeslot_trainings', array('timeslot_id' => $id))->row();
    }
    
    function getCourseNameById($id){
        
        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }
    
     function getLessonNameById($id){
        
        return $this->db->get_where('tbl_lesson', array('lesson_id' => $id))->row();
    }
    
    function getScheduleDetailsById(){
        $id = $this->uri->segment('3');
        return $this->db->get_where('tbl_training',array('training_id'=>$id))->row();
    }

}

?>