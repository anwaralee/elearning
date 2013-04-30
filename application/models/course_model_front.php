<?php
class Course_model_front extends CI_Model
{
	function getType()
	{
		$q = mysql_query("SELECT * FROM tbl_course_type");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else
		return NULL;
	}
	function getCat()
	{
		$q = mysql_query("SELECT * FROM tbl_category");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else
		return NULL;
	}
	function getCourse()
	{
		$cid = $_POST['cat'];
		$tid = $_POST['type'];
		if($cid && $tid)
		$q = mysql_query("SELECT * FROM tbl_course WEHRE cat_id = '$cid' AND course_type_id = '$tid'");
		else
		{
			if($cid)
			{
				$q = mysql_query("SELECT * FROM tbl_course WEHRE cat_id = '$cid'");
			}
			else
			{
				if($tid)
				{
					$q = mysql_query("SELECT * FROM tbl_course WEHRE course_type_id = '$tid'");
				}
			
				else
				{
					$q = mysql_query("SELECT * FROM tbl_course");
				}
			}
		}
		if(mysql_num_rows($q) >0 )
		{
			return $q;
		}
		
	}
	function get_c_type($id)
	{
		$q = mysql_query("SELECT course_type_title FROM tbl_course_type WEHRE course_type_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		else
		return "No type found";
	}
	function get_c_cat($id)
	{
		if($id)
		{
		$q = mysql_query("SELECT cat_title FROM tbl_category WEHRE cat_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		else
		return "No Category found";
		}
		else
		return "No Category found";
	}	
}
?>