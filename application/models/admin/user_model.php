<?php
class User_model extends CI_Model
{
	function list_user()
	{
		$q = mysql_query("SELECT * FROM tbl_users");
		if(mysql_num_rows($q) > 0)
		{
			return $q;
		}
		else
		return 0;
	}
	function remove()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("DELETE FROM tbl_users WHERE user_id = '$id'");
		return $q;
	}
	function remove_logs()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("DELETE FROM tbl_course_log WHERE course_log_id = '$id'");
		return $q;
	}
	function view_user()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("SELECT * FROM tbl_users WHERE user_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else 
		return NULL;
	}
	function getCountry($id)
	{
		$q = mysql_query("SELECT countryName FROM tbl_country WHERE country_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			$row = mysql_fetch_assoc($q);
			return $row['countryName'];
		}
	}
	
	function active_user()
	{
		$id=$this->uri->segment('3');
		$isPaid=$this->input->post('isPaid');
		$active=$this->input->post('active');
		if(!empty($active))
		{
			$active=1;	
		}
		else
		{
			$active=0;	
		}
		$q="update tbl_users set isPaid='$isPaid', status='$active' where user_id='$id'";
		mysql_query($q);
	}
	function getProvince($id)
		{
			$q="select province_name from tbl_province where province_id='$id'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return mysql_fetch_assoc($res);	
			}
		}
		
		function logs_user()
		{
			$id=$this->uri->segment('3');
			$q="select * from tbl_course_log where user_id='$id' order by course_log_id desc";
		    $res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
			else return NULL;
		}
		
		function getUser()
		{
			$id=$this->uri->segment('3');
			$q="select username from tbl_users where user_id='$id'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
		}
		
		function getCourse($id)
		{
			$q="select course_name from tbl_course where course_id='$id'";	
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$c=mysql_fetch_assoc($res);	
				return $c['course_name'];
			}
		}
		
		function getCourseFile($id)
		{
			$q="select course_file from tbl_course where course_id='$id'";	
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$c=mysql_fetch_assoc($res);	
				return $c['course_file'];
			}
		}
}
?>