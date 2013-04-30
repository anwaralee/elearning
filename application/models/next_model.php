<?php
class Next_model extends CI_Model
{
	function lesson($id)
	{
	 	$lesson=$this->uri->segment(3);
		$q="select * from tbl_display_order where course_id='$lesson' and cat_id='$id'";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			$order=mysql_fetch_assoc($res);	
			$o=$order['order_by'];
			$query="select * from tbl_display_order where cat_id='$id' and order_by > '$o'";
			$r=mysql_query($query);
			if(mysql_num_rows($r)>0)
			{
				return true;	
			}
			else return NULL;
		}
	}
	
	function getCategoryId($id)	
		{
			$q = "SELECT cat_id FROM tbl_display_order WHERE course_id = '$id'";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$res = mysql_fetch_assoc($res);
				return $res['cat_id'];
			}
			else return NULL;
		}
		
		function getCourseTitle($id)	
		{
			$q = "SELECT course_name FROM tbl_course WHERE course_id = '$id'";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$res = mysql_fetch_assoc($res);
				return $res['course_name'];
			}
			else return NULL;
		}
		
		function getCategoryTitle($id)	
		{
			$q = "SELECT cat_title FROM tbl_category WHERE cat_id = '$id'";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$res = mysql_fetch_assoc($res);
				return $res['cat_title'];
			}
			else return NULL;
		}
		
		function admin_email($title)
		{
			    $name=$this->session->userdata['user'];
		        $mailquery="select admin_email1, admin_email2 from tbl_admin";
				$mq=mysql_query($mailquery);
				$ademail=mysql_fetch_assoc($mq);
				$sitequery=mysql_query("select * from tbl_configuration");
				$sq=mysql_fetch_assoc($sitequery);
                $this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from($sq['site_email'],$sq['site_name']);
				$this->email->to($ademail['admin_email1']);
				$this->email->cc($ademail['admin_email2']);
				$this->email->subject($name." has completed the Lesson");
               /* $c_title = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$coid'");
                $ct = mysql_fetch_row($c_title);*/
				$this->email->message("Hi admin,<br><br>".$name." has successfully completed the lesson - '".$title."', and has submitted a test for it.<br> Please click <a href='".base_url()."'>here</a> to go to the admin panel to view the test result of ".$name."<br><br>Thank you,<br>".$sq['site_name']);
				$this->email->send();	
		}
		
		
		function admin_email2($title)
		{
			    $name=$this->session->userdata['user'];
		        $mailquery="select admin_email1, admin_email2 from tbl_admin";
				$mq=mysql_query($mailquery);
				$ademail=mysql_fetch_assoc($mq);
				$sitequery=mysql_query("select * from tbl_configuration");
				$sq=mysql_fetch_assoc($sitequery);
                $this->load->library('email');
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from($sq['site_email'],$sq['site_name']);
				$this->email->to($ademail['admin_email1']);
				$this->email->cc($ademail['admin_email2']);
				$this->email->subject($name." has completed the Course");
               /* $c_title = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$coid'");
                $ct = mysql_fetch_row($c_title);*/
				
				$this->email->message("Hi admin,<br><br>".$name." has successfully completed the course - '".$title."', and has submitted a test for it.<br> Please click <a href='".base_url()."'>here</a> to go to the admin panel to view the test result of ".$name."<br><br>Thank you,<br>".$sq['site_name']);
				$this->email->send();	
		}
}
?> 