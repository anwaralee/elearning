<?php

class Lesson_model extends CI_Model {

    function listAllLessons() {

        return $this->db->get('tbl_lesson')->result();
    }

    function addLesson() { {
            $name = $this->input->post('lesson_name');
            $desc = $this->input->post('lesson_desc');
            $courseId = $this->input->post('course_id');
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;

            $data = array('lesson_name' => $name, 
                          'lesson_description'=> $desc,
                          'course_id'=>$courseId,
                           'status'=>$active);
          return $this->db->insert('tbl_lesson',$data);
           
        }
    }

    function editLesson() {
        $id = $this->uri->segment(3);
        $name = $this->input->post('lesson_name');
        $desc = $this->input->post('lesson_desc');
        $courseId = $this->input->post('course_id');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        
         $data = array('lesson_name' => $name, 
                          'lesson_description'=> $desc,
                          'course_id'=>$courseId,
                           'status'=>$active);
         $this->db->where('lesson_id', $id);
        return $this->db->update('tbl_lesson',$data);
      
    }

    function getAllLessonsByID() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_lesson', array('lesson_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_lesson WHERE lesson_id = '$id'");
        return $q;
    }

    function getCourseName($id) {

        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }

    function listAllCourses() {
        return $this->db->get('tbl_course')->result();
    }

    function getLessonByCourses($courseId) {
        if ($courseId != 0) {
            return $this->db->get_where('tbl_lesson', array('course_id' => $courseId))->result();
        } else {
            return $this->db->get_where('tbl_lesson')->result();
        }
    }

}

?>