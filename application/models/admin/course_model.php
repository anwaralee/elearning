<?php

class Course_model extends CI_Model {

    function listAllCourses() {

        return $this->db->get('tbl_course')->result();
    }

    function addCourse() { {
            $name = $this->input->post('course_name');
            $desc = $this->input->post('course_desc');
            $batchId = $this->input->post('batch_id');
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;

            $data = array('course_name' => $name, 
                          'course_description'=> $desc,
                          'batch_id'=>$batchId,
                           'status'=>$active);
          return $this->db->insert('tbl_course',$data);
           
        }
    }

    function editCourse() {
        $id = $this->uri->segment(3);
        $name = $this->input->post('course_name');
        $desc = $this->input->post('course_desc');
        $batchId = $this->input->post('batch_id');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        
         $data = array('course_name' => $name, 
                          'course_description'=> $desc,
                          'batch_id'=>$batchId,
                           'status'=>$active);
         $this->db->where('course_id', $id);
        return $this->db->update('tbl_course',$data);
      
    }

    function getAllCoursesByID() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_course WHERE course_id = '$id'");
        return $q;
    }

    function getBatchName($id) {

        return $this->db->get_where('tbl_batch', array('batch_id' => $id))->row();
    }

    function listAllBatches() {
        return $this->db->get('tbl_batch')->result();
    }

    function getCourseByBatches($batchId) {
        if ($batchId != 0) {
            return $this->db->get_where('tbl_course', array('batch_id' => $batchId))->result();
        } else {
            return $this->db->get_where('tbl_course')->result();
        }
    }
    
    function getAllTrainers(){
        return $this->db->get('tbl_trainer')->result();
    }
    
    function updateTrainer($courseId,$trainerId){
        
        $status = $this->db->get_where('tbl_course_trainer',array('course_id'=>$courseId))->row();
            
        if($status){
           $data = array('trainer_id'=>$trainerId);
            $this->db->where('course_id',$courseId);
            $this->db->update('tbl_course_trainer',$data);
        }
        else{
            
             $data = array('course_id'=>$courseId, 'trainer_id'=>$trainerId);
            $this->db->insert('tbl_course_trainer',$data);
        }
    }
    
    function isNotEmptyCourse($courseId){
        
          $status = $this->db->get_where('tbl_course_trainer',array('course_id'=>$courseId))->row();
          
          
          if($status){
              return true;
          }
          else {
              return false;
          }
    }
    
    function getTrainerIdForCourse($courseId){
        
        return $this->db->get_where('tbl_course_trainer',array('course_id'=>$courseId))->row();
        
      
     }

}

?>