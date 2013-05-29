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
        
        function site_setting()
	{
		$q="select * from tbl_configuration";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			return $res;	
		}
		else return NULL;
	}
	
	function edit_site_setting()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email'); 
		$contact=$this->input->post('contact');
		$file_name = time()."_".rand("100000","999999");
	    $ext = end(explode('/', $_FILES['logo']['type']));
		if($ext!='')
		{
	    $complete=$file_name.".".$ext;
	   	$path = str_replace('system/','',BASEPATH).'images/admin/'.$complete;
		if(move_uploaded_file($_FILES['logo']['tmp_name'],$path))
		{
			$q="select site_logo from tbl_configuration";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$img=mysql_fetch_assoc($res);	
				unlink(str_replace('system/','',BASEPATH).'images/admin/'.$img['site_logo']);
			}
			else return NULL;
		}
		$q="update tbl_configuration set site_name='$name', site_email='$email', site_logo='$complete', site_contact='$contact'";
		}
		else
		{
			$q="update tbl_configuration set site_name='$name', site_email='$email',site_contact='$contact'";
		}
		$res=mysql_query($q);
		if($res)
		{
			return $res;	
		}
		else return NULL;
	}
        
	
	
}
?>