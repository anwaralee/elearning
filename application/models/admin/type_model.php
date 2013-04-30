<?php
class type_model extends CI_Model
{
	function list_type()
	{
		$q = mysql_query("SELECT * FROM tbl_course_type");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else return FALSE;
	}
	function remove()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("DELETE FROM tbl_course_type WHERE course_type_id = '$id'");
		return $q;
	}
	function add()
	{
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		if(isset($_POST['active']))
		{
			$active = 1;
		}
		else
		$active = 0;
		$q = "INSERT INTO tbl_course_type VALUES('','$title','$desc','$active')";
		return $this->db->query($q);
	}
	
	function edit()
	{
		$id = $this->uri->segment(3);
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		if(isset($_POST['active']))
		{
			$active = 1;
		}
		else
		$active = 0;
		$q = "UPDATE tbl_course_type SET course_type_title = '$title', course_type_description = '$desc',status = '$active' WHERE course_type_id = '$id'";
		return $this->db->query($q);
	}
	function get_course_type_recs()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("SELECT * FROM tbl_course_type WHERE course_type_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else 
		return NULL;
		
	}
}
?>