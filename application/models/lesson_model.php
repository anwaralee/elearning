<?php
class Lesson_model extends CI_Model
{
	function next()
	{
		$course_id = $this->uri->segment(2);
		$q1 = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$course_id'");
		if(mysql_num_rows($q1)>0)
		{
			$o = mysql_fetch_row($q1);
			$order = $o[0] +1;
			
		}
		$q2 = mysql_query("SELECT course_id FROM tbl_display_order WHERE order_by = '$order'");
		if(mysql_num_rows($q2)>0)
		{
			$row1 = mysql_fetch_row($q2);
			$cid = $row1[0];
			$q = mysql_query("SELECT course_type_title,cat_id,course_file FROM tbl_course WHERE course_id = '$cid'");
			if(mysql_num_rows($q)>0)
			{
				$row = mysql_fetch_row($q);
				$type = $row[0];
				$cat_id = $row[1];				
				$file = $row[2];
				
				if($type == 'Youtube Video')
				{
					redirect('courses/view_course_content/'.$cid);
				}
				if($type == 'PDF' || $type == 'Document' || $type == 'Slideshow')
				{
					redirect('courses/view_course/'.$file);
				}
				if($type == 'Video')
				{
					redirect('courses/view_video/'.$file);
				}
				if($type == 'Questionaire')
				{
					redirect('courses/view_questionaire/'.$cid);	
				}
			}
		}
		else
		{
			redirect('completed/'.$cid);
		}
		
		
	}
	function complete()
	{
		$uname = $this->session->userdata('user');
		$q = mysql_query("SELECT user_id FROM tbl_users WHERE username = '$uname'");
		$row = mysql_fetch_row($q);
		$uid = $row[0];
		$cid = $this->uri->segment(2);
		$q1 = mysql_query("SELECT attempted_id FROM tbl_attempted WHERE course_id = '$cid' AND user_id = '$uid'");
		if(mysql_num_rows($q1)>0)
		{
			return TRUE;
		}
		else
		return FALSE;
	}
	function getCat()
	{
		$cid = $this->uri->segment(2);
		$q = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$cid'");
		$row= mysql_fetch_row($q);
		$cat = $row[0];
		$q1 = mysql_query("SELECT cat_title FROM tbl_category WHERE cat_id = '$cat'");
		$row1 = mysql_fetch_row($q1);
		return $row1[0];
	}
}
?>