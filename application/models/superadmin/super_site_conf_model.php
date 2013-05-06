<?php
class Super_site_conf_model extends CI_Model
{
	function login_setting()
	{
		$q = mysql_query("SELECT * FROM tbl_admin where user_type=0");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else
		return NULL;
	}
	
	function edit_login()
	{
		$un=$this->input->post('ad_un');
		$old_pw=$this->input->post('old');
		$new_pw=$this->input->post('new');
		if(!($new_pw)){$new_pw=$old_pw;}
		$first=$this->input->post('first_email');
		$second=$this->input->post('second_email');
		$q="update tbl_admin set admin_username='$un', admin_password='$new_pw', admin_email1='$first', admin_email2='$second', status=1 where user_type = 0";
		$res=mysql_query($q);
		if($res)
		{
			return $res;	
		}
		else return false;
	}
        
        
	
	
}
?>