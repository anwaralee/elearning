<?php

class Paypal_model extends CI_Model {
    
    function insertPayment(){
        
        $username = $this->session->userdata($username);
        $result = $this->db->get_where('tbl_users',array('username'=>$username))->row();
        
        $userId = $result->user_id;
        
        $courseId = $result->course_id;
        
        $trainingId = $this->db->get_where('tbl_training_users',array('user_id'=>$userId,'course_id'=>$courseId))->row()->training_id;
    
        $amountPaid = $pdata['payment_fee'];
        $data = array('user_id'=>$userId,'course_id'=>$courseId,'training_id'=>$trainingId,'payment_fee'=>$amountPaid,'status'=>1);
        
        $this->db->insert('tbl_paypal_log',$data);
    }
}
?>