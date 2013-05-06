<?php
class Admin_model extends CI_Model
{
	function view_logs()
	{
		$this->db->order_by('log_id','desc');
		$res = $this->db->get('tbl_log_manager');
		if($res->num_rows() > 0)
		{
			return $res->result();
		}
	}
	
	function getlogUser($user_id)
	{
		$res = mysql_query("SELECT username FROM tbl_users WHERE user_id = '$user_id' LIMIT 1");
		$row = mysql_fetch_row($res);
		return $row[0];
	}
	function delete_log()
	{
		$log_id=$this->uri->segment(3);
		mysql_query("DELETE FROM tbl_log_manager WHERE log_id = '$log_id'");
	}
	
	function admin_content()
	{
		$q="select * from tbl_staticpages where staticpage_id=20";	
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			return $res;	
		}
		else return NULL;
	}
        
        function verifyLoginModel(){
            echo "Test";
        }

     function listAdmins(){

     	return $this->db->get_where('tbl_admin',array('user_type'=>1))->result();
     }

     function getAllBranches(){

     	return $this->db->get('tbl_branch')->result();	
     }

     function getBranchName($branchId){
     			$this->db->select('branch_name');
     		return $this->db->get_where('tbl_branch',array('branch_id'=>$branchId))->row();
     }
      function addAdmin() { 
      		$fullname = $this->input->post('admin_fullname');
            $username = $this->input->post('admin_username');
            $password = $this->input->post('admin_password');
            $email1 = $this->input->post('admin_email1');
            $email2 = $this->input->post('admin_email2');
            $contact = $this->input->post('admin_contact');
            $branchId = $this->input->post('branch_id');
            
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;
	            
	        $data = array(
	  					 'admin_fullname' => $fullname ,
	   					 'admin_username' => $username ,
	   					 'admin_password' => $password ,
	   					  'admin_email1' => $email1 ,
	   					  'admin_email2' => $email2 ,
	   					  'admin_contact' => $contact ,
	   					  'branch_id' => $branchId,
	   					  'status' => $active
	   					);
           
            return $this->db->insert('tbl_admin',$data);
        }
   
    function editAdmin() {
        $id = $this->uri->segment(3);
       $fullname = $this->input->post('admin_fullname');
            $username = $this->input->post('admin_username');
            $password = $this->input->post('admin_password');
            $email1 = $this->input->post('admin_email1');
            $email2 = $this->input->post('admin_email2');
            $contact = $this->input->post('admin_contact');
            $branchId = $this->input->post('branch_id');

        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;

         $data = array(
	  					 'admin_fullname' => $fullname ,
	   					 'admin_username' => $username ,
	   					 'admin_password' => $password ,
	   					  'admin_email1' => $email1 ,
	   					  'admin_email2' => $email2 ,
	   					  'admin_contact' => $contact ,
	   					  'branch_id' => $branchId,
	   					  'status' => $active
	   					);
        $this->db->where('admin_id', $id);
       return $this->db->update('tbl_admin', $data); 
        
    }

    function getAllAdminsByID() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_admin', array('admin_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
       $this->db->delete('tbl_admin', array('admin_id' => $id)); 
    }
}
?>