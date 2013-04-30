<?php
class Site_model extends CI_Model
{
	function verify()
	{
		$un=$_POST['un'];
		$pw=$_POST['pw'];
		$as=$_POST['as'];
		if($as == 'user')
		{
			$q="SELECT username,password FROM tbl_users WHERE username = '$un' AND password = '$pw' AND status = 1";
			$res=$this->db->query($q);
			if($res->num_rows() > 0)
			{
				$this->session->set_userdata('user',$un);
				$q = "SELECT user_id FROM tbl_users WHERE username = '$un'";
				$res = mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					$row = mysql_fetch_assoc($res);
					$uid = $row['user_id'];
					$date = date('Y/m/d G:i:s');
					$query="select user_id from tbl_log_manager where user_id='$uid'";
					$ress=mysql_query($query);
					if(mysql_num_rows($ress)>0)
					{
					$que="update tbl_log_manager set user_login_date='$date', log_status=1 where user_id='$uid'";
					$r=mysql_query($que);
					}
					else
						{
							$quer = "INSERT into tbl_log_manager VALUES('','$uid','$date',1)";
							mysql_query($quer);	
						}
				}
			}
		}
		else
		if($as == 'admin')
		{
			$q="SELECT admin_username, admin_password FROM tbl_admin WHERE admin_username = '$un' AND admin_password = '$pw' AND status = 1";
			$res=$this->db->query($q);
			if($res->num_rows() > 0)
			{
				$this->session->set_userdata('admin',$un);
			}
		}
		
	}
	
	function logout($uname)
	{
		$q="select user_id from tbl_users where username='$uname'";
		$res=mysql_query($q);
		$id=mysql_fetch_assoc($res);
		$uid=$id['user_id'];
		$q="update tbl_log_manager set log_status=0 where user_id='$uid'";
		mysql_query($q);
	}
}
?>