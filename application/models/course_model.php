<?php
	class Course_model extends CI_model
	{
		function view_youtube()
		{
			$user=$this->session->userdata('user');
			$id=$this->uri->segment(3);	 
			$q="select * from tbl_course where course_id='$id'";
			$result=mysql_query($q);
			if(mysql_num_rows($result)>0)
			{
				
				$course=mysql_fetch_assoc($result);
				$c=$course['course_name'];
				$cid=$course['course_id'];
				$date = date('Y/m/d G:i:s');
				$que="select user_id from tbl_users where username='$user'";
				$res=mysql_query($que);
				if(mysql_num_rows($res)>0)
				{
					$u=mysql_fetch_assoc($res);	
					$uid=$u['user_id'];
					$qu="insert into tbl_course_log (course_log_id,course_id,user_id,course_view_date,course_view_type) values ('','$cid','$uid','$date',1)";
					mysql_query($qu);
					
					$query=mysql_query("select course_id from tbl_quiz where course_id='$cid'");
					if(mysql_num_rows($query)>0)
					{
							//
					}
					else
					{
						$query1=mysql_query("insert into tbl_attempted values('','$cid','$uid')");	
					}
				}
				
				$result=mysql_query($q);
				return $result;
			}
			else return NULL;
		}
		 function view_course()
		 {
			 $user=$this->session->userdata('user');
			$file=$this->uri->segment(3);	 
            
			$quer="select * from tbl_course where course_file = '$file'";
			$result=mysql_query($quer);
			if(mysql_num_rows($result)>0)
			{
				$course=mysql_fetch_assoc($result);
				$c=$course['course_name'];
				$cid=$course['course_id'];
				$date = date('Y/m/d G:i:s');
				$q="select user_id from tbl_users where username='$user'";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					$u=mysql_fetch_assoc($res);	
					$uid=$u['user_id'];
					$q="insert into tbl_course_log (course_log_id,course_id,user_id,course_view_date,course_view_type) values ('','$cid','$uid','$date',1)";
					mysql_query($q);
					
					$query=mysql_query("select course_id from tbl_quiz where course_id='$cid'");
					if(mysql_num_rows($query)>0)
					{
							//
					}
					else
					{
						$query1=mysql_query("insert into tbl_attempted values('','$cid','$uid')");	
					}
				}
				$result=mysql_query($quer);
                if(mysql_num_rows($result)>0)
				return $result;
			}
			else return NULL;
		 }
		 
		 function download($c_id,$ct_id)
		 {
			  $user=$this->session->userdata('user');
			$qu="select course_file from tbl_course where course_id='$c_id' and course_type_title='$ct_id'";
			$result=mysql_query($qu);
			if(mysql_num_rows($result)>0)
			{
				$date = date('Y/m/d G:i:s');
				$q="select user_id from tbl_users where username='$user'";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					$u=mysql_fetch_assoc($res);	
					$uid=$u['user_id'];
					$q="insert into tbl_course_log (course_log_id,course_id,user_id,course_view_date,course_view_type) values ('','$c_id','$uid','$date',2)";
					mysql_query($q);
					
					$query=mysql_query("select course_id from tbl_quiz where course_id='$c_id'");
					if(mysql_num_rows($query)>0)
					{
							//
					}
					else
					{
						$query1=mysql_query("insert into tbl_attempted values('','$c_id','$uid')");	
					}
				}
				$result=mysql_query($qu);
				return $result;
			
			}
			else return NULL;
		 }
		 
		 function course_history()
		 {
			 $user=$this->session->userdata('user');
			 $q="select user_id from tbl_users where username='$user'";
			 $res=mysql_query($q);
			 if(mysql_num_rows($res)>0)
			 {
				$u=mysql_fetch_assoc($res);	
				$uid=$u['user_id'];
				$q="select * from tbl_course_log where user_id='$uid' order by course_log_id desc";
				$r=mysql_query($q);
				if(mysql_num_rows($r)>0)
			 	{
					return $r;
				}
				else return NULL;
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
		function check_history()
		{
			$user = $this->session->userdata('user');
			$row = mysql_query("SELECT user_id FROM tbl_users WHERE username = '$user'");
			if(mysql_num_rows($row)>0)
			{
				$u = mysql_fetch_row($row);
				$user_id = $u[0];
			}
			$uri2 = $this->uri->segment(2);
			if($uri2 == 'view_course' || $uri2=='view_video')
			{
				$f_name = $this->uri->segment(3);
				$cid = mysql_query("SELECT course_id FROM tbl_course WHERE course_file = '$f_name'");
				if(mysql_num_rows($cid)>0)
				{
					$c = mysql_fetch_row($cid);
					$course = $c[0];
				}
			}
			else
			if($uri2 == 'download' || $uri2=='view_course_content' || 'view_questionaire')
			{
				$course = $this->uri->segment(3);
			}
			else
			return TRUE;
			
			$q1 = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$course'");
			$row1 = mysql_fetch_row($q1);
			
			$cat_id = $row1[0];
			$q2 = mysql_query("SELECT order_by,course_id FROM tbl_display_order WHERE course_id = '$course'");
			$row2 = mysql_fetch_row($q2);
			
			if($row2[0] != 1)
			{
				$order = $row2[0] - 1;
				$sq = mysql_query("SELECT course_id FROM tbl_display_order WHERE order_by = '$order'");
				$s = mysql_fetch_row($sq);
				$coid = $s[0];
				$q3 = mysql_query("SELECT attempted_id FROM tbl_attempted WHERE user_id = '$user_id' AND course_id = '$coid'");
				if(mysql_num_rows($q3)>0)
				return TRUE;
				else 
				return FALSE;
			}
			else
			return TRUE;
			
		}
		function get_q_title()
		{
			$id = $this->uri->segment(3);
			$q = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$id'");
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		function view_questionaire()
		{
			$id = $this->uri->segment(3);
			$q = mysql_query("SELECT * FROM tbl_questionare WHERE course_id = '$id'");
			if(mysql_num_rows($q)>0)
			return $q;
			else return NULL;
		}
		function submit()
		{
			$coid = $this->uri->segment(3);
			$user = $this->session->userdata('user');
			$u = mysql_query("SELECT user_id FROM tbl_users WHERE username = '$user'");
			$ui = mysql_fetch_assoc($u);
			$uid = $ui['user_id'];
			$sql = mysql_query("SELECT * FROM tbl_questionare WHERE course_id = '$coid'");
			$i = 1;
			while($row = mysql_fetch_assoc($sql))
			{
				if($row['type'] == 'yn')
				{
					if(isset($_POST['a'.$i]))
					{
					if($_POST['a'.$i])
					{
					$answer = $_POST['a'.$i];
					if($answer == $row['yes_no'])
					$answer = 'correct';
					else
					$answer = 'incorrect';
					}
					else
					$answer = 'incorrect';
					}
					else
					$answer = 'incorrect';
				}
				if($row['type'] == 'des')
				{
					if(isset($_POST['a'.$i]))
					{
					if($_POST['a'.$i])
					{
					$answer = $_POST['a'.$i];
					}
					else
					$answer = 'incorrect';
					}
					else
					$answer = 'incorrect';
				}
				if($row['type'] == 'single')
				{
					if(isset($_POST['a'.$i]))
					{
					if($_POST['a'.$i])
					{
					$answer = $_POST['a'.$i];
					if($answer == $row['correct'])
					$answer = 'correct';
					else
					$answer = 'incorrect';
					}
					else
					$answer = 'incorrect';
					}
					else
					$answer = 'incorrect';
				}
				if($row['type'] == 'multiple')
				{
					$k=0;
					$l=0;
					for($j=1;$j<=10;$j++)
					{
					$answer = $row['correct'.$j];
					if(isset($_POST['a'.$i.$j]))
					{		
						if((($answer == 'correct') && ($_POST['a'.$i.$j] == 'incorrect')) || (($answer == 'incorrect') && ($_POST['a'.$i.$j] == 'correct')) || (($answer == 'incorrect') && ($_POST['a'.$i.$j] == 'incorrect')))
						{
							$l++;
						}		
						
					}
					else
					{
						if($answer == 'correct')
						{
							$l++;
						}
					}
					
					}
					if($l >0)
					$answer = 'incorrect';
					else $answer = 'correct';
				}
				$qu_id = $row['question_id'];
				mysql_query("INSERT INTO tbl_q_answer VALUES('','$coid','$qu_id','$uid','$answer')");
                $i++;
                
			}
			$ch = mysql_query("SELECT quiz_id FROM tbl_quiz WHERE course_id = '$coid'");
			if(mysql_num_rows($ch)>0)
			{
				return TRUE;
			}
			else
            mysql_query("INSERT INTO tbl_attempted VALUES('','$coid','$uid')");
           }
	}
?>