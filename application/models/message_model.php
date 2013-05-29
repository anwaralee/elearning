<?php

class Message_model extends CI_Model {

 function getAllMessages(){
     
     if($this->session->userdata('admin')){
            $username = $this->session->userdata('admin');
            $admin = $this->db->get_where('tbl_admin',array('admin_username'=>$username))->row();
            
            $this->db->order_by('sent_date','desc');
             return $this->db->get_where('tbl_messaging',array('reciever_id'=>1,'admin_id'=>$admin->admin_id))->result();
        }
        else if($this->session->userdata('trainer')){
             return $this->db->get_where('tbl_messaging',array(''))->result();
        }
        else if($this->session->userdata('user')){
              return $this->db->get_where('tbl_messaging',array(''))->result();
        }
        
   
 }
 
 function getTrainerDetails($id){
     
     return $this->db->get_where('tbl_trainer',array('trainer_id'=>$id))->row();
 }
 
 function getTraineeDetails($id){
     
     return $this->db->get_where('tbl_users',array('user_id'=>$id))->row();
 }
 

    
 }

?>