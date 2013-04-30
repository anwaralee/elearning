<?php
class Category_model extends CI_Model
{
	function list_category()
	{
		$q = mysql_query("SELECT * FROM tbl_category");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else return FALSE;
	}
	function remove()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("DELETE FROM tbl_category WHERE cat_id = '$id'");
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
		$q = "INSERT INTO tbl_category VALUES('','$title','$desc','$active')";
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
		$q = "UPDATE tbl_category SET cat_title = '$title', cat_description = '$desc',status = '$active' WHERE cat_id = '$id'";
		return $this->db->query($q);
	}
	function get_cat_recs()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("SELECT * FROM tbl_category WHERE cat_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else 
		return NULL;
		
	}
}
?>