<?php
	class Trainer_model extends CI_Model
	{
		function dashboardContent()
		{
			$q="select * from tbl_staticpages where staticpage_id=22";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function account_settings($user)
		{
			$q="select * from tbl_trainer where username='$user'"	;
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
		}
		
		function update_settings()
		{
			$user=$this->session->userdata('trainer');
			$first=$this->input->post('first');
			$last=$this->input->post('last');
			$un=$this->input->post('user');
			$pass=$this->input->post('pass');
			$contact=$this->input->post('contact');
			//$image=$this->input->post('image');
			$email=$this->input->post('email');
			
			$data = array(			  
						   'firstname' => $first ,
						   'lastname' => $last,
						   'username' => $un,
						   'password' => $pass,
						   'phone' => $contact,
						   'email' => $email,
						   'status' => '1'
						);
			$this->db->where("username", $user);
			$q=$this->db->update('tbl_trainer', $data); 
			if($q)
			{
				$this->session->unset_userdata('trainer');
				$this->session->set_userdata('trainer',$un);
				return true;	
			}
			else return NULL;
		}
	}
?>