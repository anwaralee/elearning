<?php
	class Trainer_model extends CI_Model
	{
		function list_trainer()
		{
			$q="select * from tbl_trainer";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function edit_trainer($user)
		{
			$q="select * from tbl_trainer where trainer_id='$user'"	;
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
		}
		
		function add_trainer()
		{
			$first=$this->input->post('first');
			$last=$this->input->post('last');
			$un=$this->input->post('user');
			$pass=$this->input->post('pass');
			$contact=$this->input->post('contact');
			//$image=$this->input->post('image');
			$email=$this->input->post('email');
			if($_POST['active']!=NULL)
			{
				$active=1;	
			}
			else $active=0;
			
			$data = array(			  
						   'firstname' => $first ,
						   'lastname' => $last,
						   'username' => $un,
						   'password' => $pass,
						   'phone' => $contact,
						   'email' => $email,
						   'status' => $active
						);
			$q=$this->db->insert('tbl_trainer', $data); 
		}
		
		function update_trainer()
		{
			$id=$this->uri->segment(3);
			$first=$this->input->post('first');
			$last=$this->input->post('last');
			$un=$this->input->post('user');
			$pass=$this->input->post('pass');
			$contact=$this->input->post('contact');
			//$image=$this->input->post('image');
			$email=$this->input->post('email');
			//$a=$this->input->post('acitve');
			if(isset($_POST['active']))
			{
				$active=1;	
			}
			else $active=0;
			$data = array(			  
						   'firstname' => $first ,
						   'lastname' => $last,
						   'username' => $un,
						   'password' => $pass,
						   'phone' => $contact,
						   'email' => $email,
						   'status' => $active
						);
			$q="update tbl_trainer set firstname='$first', lastname='$last', username='$un', password='$pass', phone='$contact', email='$email', status='$active'";
			mysql_query($q);
			/*$this->db->where('trainer_id', $id);
			$this->db->update('tbl_trainer', $data);;*/
		}
		
		function delete_trainer()
		{
			$id=$this->uri->segment(3);
			$q="delete from tbl_trainer where trainer_id='$id'";
			mysql_query($q);
		}
	}
?>
