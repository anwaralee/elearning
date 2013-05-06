<?php

class SuperLogin_model extends CI_model {

    function verifyLoginModel() {

        $user = $this->input->post('un');
        $pass = $this->input->post('pw');
        
        $result =  $this->db->get_where('tbl_admin',array('admin_username'=>$user,
                                                       'admin_password'=>$pass,
                                                        'user_type'=>0))->row();
        if ($result){
            
           $this->session->set_userdata('superadmin',$user);
                    
        }
        return $result;
       
    }
    
    function superadmin_content(){
        
        return $this->db->get_where('tbl_staticpages',array('staticpage_id'=>101))->row();
    }

}

?>