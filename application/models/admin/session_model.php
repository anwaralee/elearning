<?php

class Session_model extends CI_Model {

    function listAllSessions() {
        $this->db->order_by('session_id','desc');
        return $this->db->get('tbl_course_session')->result();
    }

    function addSession() { {
            $name = $this->input->post('session_name');
            $desc = $this->input->post('session_desc');
            $course_id = $this->input->post('course_id');
           // $start_date = $this->input->post('start_date');
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;
            $q = "INSERT INTO tbl_course_session VALUES('','$name','$desc','$course_id','$active')";
            return $this->db->query($q);
        }
    }

    function editSession() {
        $id = $this->uri->segment(3);
        $name = $this->input->post('session_name');
        $desc = $this->input->post('session_desc');
        $trainer_det = $this->input->post('trainer_details');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        $q = "UPDATE tbl_course_session SET session_name = '$name', session_desc = '$desc',trainer_details = '$trainer_det', status = '$active' WHERE session_id = '$id'";
        return $this->db->query($q);
    }

    function getAllSessionsById() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_course_session', array('session_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_course_session WHERE session_id = '$id'");
        return $q;
    }
    
    function getAllCourses(){
        return $this->db->get('tbl_course')->result();
    }
    
     function getCourseNameById($id) {
        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }
     function getTrainerNameByCourse($courseId) {

        $result = $this->db->get_where('tbl_course_trainer', array('course_id' => $courseId))->row();
        
        return $this->db->get_where('tbl_trainer',array('trainer_id'=>$result->trainer_id))->row();
    }

   }
?>