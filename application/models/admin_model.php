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
}
?>