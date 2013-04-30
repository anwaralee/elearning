<?php
class Quiz_model extends CI_Model
{
	function list_quiz()
	{
		$q = mysql_query("SELECT * FROM tbl_quiz");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else 
		return NULL;
	}
	function getCourse()
	{
		$q = mysql_query("SELECT course_name,course_id FROM tbl_course WHERE status = 1");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else
		return NULL;
	}
	function exclude($id)
	{
		$query = mysql_query("SELECT * FROM tbl_quiz WHERE course_id = '$id'");
		if(mysql_num_rows($query)>0)
		{
			return FALSE;
		}
		else
		return TRUE;
	}
	function add()
	{
		
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$cid = $_POST['cid'];
		$full = $_POST['full'];
		$pass = $_POST['pass'];
		$time = $_POST['time'];
		if(isset($_POST['status']))
		{
		$status = 1;
		}
		else $status = 0;
		mysql_query("INSERT INTO tbl_quiz VALUES('','$cid','$title','$desc','$full','$pass','$time','$status')");
	}
	function getQuizTitle()
	{
		$quiz_id = $this->uri->segment(3);
		$q = mysql_query("SELECT quiz_title FROM tbl_quiz WHERE quiz_id = '$quiz_id'");
		if(mysql_num_rows($q)>0)
		{
			$row = mysql_fetch_row($q);
			return $row[0];
		}
	}
	function add_question()
	{
		$question = $_POST['q'];
		$type = $_POST['type'];
		if(isset($_POST['answer1']))
		{
			$answer1 =$_POST['answer1'];
		}
		else
		{
		$answer1 = '';
		}
		if(isset($_POST['answer2']))
		{
			$answer2 =$_POST['answer2'];
		}
		else
		{
		$answer2 = '';
		}
		if(isset($_POST['answer3']))
		{
			$answer3 =$_POST['answer3'];
		}
		else
		{
		$answer3 = '';
		}
		if(isset($_POST['answer4']))
		{
			$answer4 =$_POST['answer4'];
		}
		else
		{
		$answer4 = '';
		}
		if(isset($_POST['answer5']))
		{
			$answer5 =$_POST['answer5'];
		}
		else
		{
		$answer5 = '';
		}
		if(isset($_POST['answer6']))
		{
			$answer6 =$_POST['answer6'];
		}
		else
		{
		$answer6 = '';
		}
		if(isset($_POST['answer7']))
		{
			$answer7 =$_POST['answer7'];
		}
		else
		{
		$answer7 = '';
		}
		if(isset($_POST['answer8']))
		{
			$answer8 =$_POST['answer8'];
		}
		else
		{
		$answer8 = '';
		}
		if(isset($_POST['answer9']))
		{
			$answer9 =$_POST['answer9'];
		}
		else
		{
		$answer9 = '';
		}
		if(isset($_POST['answer10']))
		{
			$answer10 =$_POST['answer10'];
		}
		else
		{
		$answer10 = '';
		}
		if(isset($_POST['correct1']))
		{
			$correct1 ='correct';
		}
		else
		{
		$correct1 = 'incorrect';
		}
		if(isset($_POST['correct2']))
		{
			$correct2 ='correct';
		}
		else
		{
		$correct2 = 'incorrect';
		}
		if(isset($_POST['correct3']))
		{
			$correct3 ='correct';
		}
		else
		{
		$correct3 = 'incorrect';
		}
		if(isset($_POST['correct4']))
		{
			$correct4 ='correct';
		}
		else
		{
		$correct4 = 'incorrect';
		}
		if(isset($_POST['correct5']))
		{
			$correct5 ='correct';
		}
		else
		{
		$correct5 = 'incorrect';
		}
		if(isset($_POST['correct6']))
		{
			$correct6 ='correct';
		}
		else
		{
		$correct6 = 'incorrect';
		}
		if(isset($_POST['correct7']))
		{
			$correct7 ='correct';
		}
		else
		{
		$correct7 = 'incorrect';
		}
		if(isset($_POST['correct8']))
		{
			$correct8 ='correct';
		}
		else
		{
		$correct8 = 'incorrect';
		}
		if(isset($_POST['correct9']))
		{
			$correct9 ='correct';
		}
		else
		{
		$correct9 = 'incorrect';
		}
		if(isset($_POST['correct10']))
		{
			$correct10 ='correct';
		}
		else
		{
		$correct10 = 'incorrect';
		}
		if(isset($_POST['desc']))
		{
			$desc = $_POST['desc'];
		}
		else
		{
		$desc = '';
		}
		if(isset($_POST['yn']))
		{
			$yn = $_POST['yn'];
		}
		else
		{
		$yn = '';
		}
		if(isset($_POST['correct']))
		{
		$correct = $_POST['correct'];
		}
		else
		{
		$correct = '';
		}
		$mark = $_POST['mark'];
		$qid = $this->uri->segment(3);
		$q = "INSERT INTO tbl_question VALUES('','$qid','".$question."','$type','".$answer1."','".$answer2."','".$answer3."','".$answer4."','".$answer5."','".$answer6."','".$answer7."','".$answer8."','".$answer9."','".$answer10."','$correct','".$correct1."','".$correct2."','".$correct3."','".$correct4."','".$correct5."','".$correct6."','".$correct7."','".$correct8."','".$correct9."','".$correct10."','$mark','$desc','$yn')"; 
		$q = mysql_query($q);		
	}
	function remove()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("DELETE FROM tbl_quiz WHERE quiz_id = '$id'");
	}
	function get_quiz_info()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("SELECT * FROM tbl_quiz WHERE quiz_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			return $q;
		}
		else
		return NULL;
	}
	function edit()
	{
		$id = $this->uri->segment(3);
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$cid = $_POST['cid'];
		$full = $_POST['full'];
		$pass = $_POST['pass'];
		$time = $_POST['time'];
		if(isset($_POST['status']))
		{
		$status = 1;
		}
		else $status = 0;
		$q = "UPDATE tbl_quiz SET quiz_title = '$title',quiz_desc = '$desc', course_id = '$cid',quiz_full = '$full',quiz_pass = '$pass',quiz_time = '$time',quiz_status = '$status' WHERE quiz_id = '$id'";
		mysql_query($q);
	}
	function list_quiz_to_attempt()
	{
		$id = $this->uri->segment(3);
		$q= mysql_query("SELECT quiz_id FROM tbl_quiz WHERE course_id = '$id'");
		$qid = mysql_fetch_row($q);
		$quiz_id = $qid[0];
		$sql = mysql_query("SELECT * FROM tbl_question WHERE quiz_id = '$quiz_id'");
		if(mysql_num_rows($sql)>0)
		{
			return $sql;
		}
		else
		return NULL;
	}
	function getCourseName()
	{
		$id = $this->uri->segment(3);
		$q = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$id'");
		if(mysql_num_rows($q)>0)
		{
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		else
		return NULL;
	}
	function check_user_attempt()
	{
		$uname = $this->session->userdata('user');
		$q = mysql_query("SELECT user_id FROM tbl_users WHERE username = '$uname'");
		$row = mysql_fetch_row($q);
		$uid = $row[0];
		$cid = $this->uri->segment(3);
		$q = mysql_query("SELECT attempted_id FROM tbl_attempted WHERE user_id = '$uid' AND course_id = '$cid'");
		if(mysql_num_rows($q)>0)
		return FALSE;
		else 
		return TRUE;
	}	
	function get_minutes()
	{
		$course_id = $this->uri->segment(3);
		$q = mysql_query("SELECT quiz_time FROM tbl_quiz WHERE course_id = '$course_id'");
		$min = mysql_fetch_assoc($q);
		return $min['quiz_time'];
	}
	function submit()
	{
	   $coid = $this->uri->segment(3);
			$user = $this->session->userdata('user');
			$u = mysql_query("SELECT user_id FROM tbl_users WHERE username = '$user'");
			$ui = mysql_fetch_assoc($u);
			$uid = $ui['user_id'];
			$id = $this->uri->segment(3);
			$q= mysql_query("SELECT quiz_id FROM tbl_quiz WHERE course_id = '$id'");
			$qid = mysql_fetch_row($q);
			$quiz_id = $qid[0];
			$sql = mysql_query("SELECT * FROM tbl_question WHERE quiz_id = '$quiz_id'");
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
				mysql_query("INSERT INTO tbl_answer VALUES('','$quiz_id','$qu_id','$uid','$answer')");
               
				$i++;
                
			}
             mysql_query("INSERT INTO tbl_attempted VALUES('','$coid','$uid')");
            $query = mysql_query("SELECT first_name,middle_name,last_name FROM tbl_users WHERE user_id = '$uid'");
                $n = mysql_fetch_row($query);
                if($n[0] && $n[1] && $n[2])
                $name = $n[0].' '.$n[1].' '.$n[2];
                else 
                if($n[0] && $n[2])
                $name = $n[0].' '.$n[2];
                else
                if($n[0] && $n[1])
                $name = $n[0].' '.$n[2];
                else
                $name = $n[0];
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
				$this->email->subject($name." has completed the lesson");
                $c_title = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$coid'");
                $ct = mysql_fetch_row($c_title);
				$this->email->message("Hi admin,<br><br>".$name." has successfully completed the lesson - ".$ct[0].", and has submitted a test for it.<br> Please click <a href='".base_url()."'>here</a> to go to the admin panel to view the test result of ".$name."<br><br>Thank you,<br>".$sq['site_name']);
				$this->email->send();
		
             
	}
    function get_student()
    {
        $q = mysql_query("SELECT DISTINCT tbl_users.* FROM tbl_users,tbl_attempted WHERE tbl_users.user_id = tbl_attempted.user_id");
        if(mysql_num_rows($q)>0)
        {
            return $q;
        }
        else
        return NULL;
    }
    function get_report()
    {
        $id = $this->input->post('user');
        $q = mysql_query("SELECT user_id FROM tbl_attempted WHERE user_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            $q1 = mysql_query("SELECT tbl_course.course_name,tbl_course.course_id FROM tbl_course,tbl_attempted
             WHERE tbl_attempted.user_id = '$id' AND
             tbl_course.course_id = tbl_attempted.course_id
             ");
             if(mysql_num_rows($q1)>0)
             return $q1;
             else 
             return NULL;   
        }
        
    }
    function getUname($id)
    {
        $q = mysql_query("SELECT username FROM tbl_users WHERE user_id = '$id'");
        if(mysql_num_rows($q)>0)
        $row = mysql_fetch_assoc($q);
        return $row['username'];
    }
    function check_c_quiz($id)
    {
        $q = mysql_query("SELECT quiz_id FROM tbl_quiz WHERE course_id = '$id'");
        if(mysql_num_rows($q)>0)
        return TRUE;
        else 
        return FALSE;
    }
    function view_result()
    {
        $cid = $this->uri->segment(3);
        $uid = $this->uri->segment(4);
        $q = mysql_query("SELECT quiz_id FROM tbl_quiz WHERE course_id = '$cid'");
        $row = mysql_fetch_row($q);
        $qid = $row[0];
        $q1 = mysql_query("SELECT * FROM tbl_answer WHERE quiz_id = '$qid' AND user_id = '$uid'");
        if(mysql_num_rows($q1)>0)
        {
            return $q1;
        }
        else return NULL;
    }
	function get_quest($id)
	{
		$q = mysql_query("SELECT question_id FROM tbl_answer WHERE answer_id = '$id'");
		$row = mysql_fetch_row($q);
		$q1 = mysql_query("SELECT question FROM tbl_question WHERE question_id = '$row[0]'");
		$row1 = mysql_fetch_row($q1);
		return $row1[0];
	}
    function course_name()
    {
        $cid = $this->uri->segment(3);
        $q = mysql_query("SELECT course_name FROM tbl_course WHERE course_id = '$cid'");
        $row = mysql_fetch_row($q);
        return $row[0];
    }
    
    function user_name()
    {
        $uid = $this->uri->segment(4);
        $q = mysql_query("SELECT username FROM tbl_users WHERE user_id = '$uid'");
        $row = mysql_fetch_row($q);
        return $row[0];
    }
    function get_mark($id)
    {
        $q = mysql_query("SELECT tbl_question.marks FROM tbl_question,tbl_answer WHERE tbl_answer.answer_id = '$id' AND tbl_answer.question_id = tbl_question.question_id");
        if(mysql_num_rows($q)>0)
        {
            $row = mysql_fetch_row($q);
            return $row[0];
        }
        else return "Not available";
    }
    function publish_marks()
    {
        $i = $_POST['i'];
        $uid = $_POST['uid'];
        $cid = $_POST['cid'];
        $full = $_POST['m'];
        for($j=1; $j<=$i ; $j++)
        {
            if($j==1)
            {
                $marks = $_POST['m'.$j];
            }
            else
            $marks = $marks + $_POST['m'.$j];
        }
        mysql_query("INSERT INTO tbl_score VALUES ('','$uid','$cid','$marks','$full',1)");
    }
    function check_published($uid,$cid)
    {
        $q = mysql_query("SELECT score,full FROM tbl_score WHERE course_id = '$cid' AND user_id = '$uid'");
        if(mysql_num_rows($q)>0)
        {
            $s = mysql_fetch_row($q);
            return $s[0].' / '.$s[1];
        }
        else
        return FALSE;
    }
    function tot_q($id)
    {
        $q = mysql_query("SELECT question_id FROM tbl_question WHERE quiz_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            $i=0;
            while($row= mysql_fetch_row($q))
            {
                $i++;
            }
            return $i;
        }
        else
        return 0;
    }
    function get_question()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT * FROM tbl_question WHERE quiz_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            return $q;
        }
        else
        return NULL;
    }
    function get_quiz_title()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT quiz_title FROM tbl_quiz WHERE quiz_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            $row= mysql_fetch_row($q);
            return $row[0];
        }
        else
        return NULL;
    }
    function remove_q()
    {
        $id = $this->uri->segment(3);
		$q1 = mysql_query("SELECT quiz_id FROM tbl_question WHERE question_id = '$id'");
        $row = mysql_fetch_row($q1);
        $q = mysql_query("DELETE FROM tbl_question WHERE question_id = '$id'");        
        return $row[0];
    }
    function get_q()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT * FROM tbl_question WHERE question_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            return $q;
        }
        else
        return NULL;
    }    
	function edit_submit()
	{
		$id = $this->uri->segment(3);
		$question = $_POST['q'];
		$type = $_POST['type'];
		if(isset($_POST['answer1']))
		{
			$answer1 =$_POST['answer1'];
		}
		else
		{
		$answer1 = '';
		}
		if(isset($_POST['answer2']))
		{
			$answer2 =$_POST['answer2'];
		}
		else
		{
		$answer2 = '';
		}
		if(isset($_POST['answer3']))
		{
			$answer3 =$_POST['answer3'];
		}
		else
		{
		$answer3 = '';
		}
		if(isset($_POST['answer4']))
		{
			$answer4 =$_POST['answer4'];
		}
		else
		{
		$answer4 = '';
		}
		if(isset($_POST['answer5']))
		{
			$answer5 =$_POST['answer5'];
		}
		else
		{
		$answer5 = '';
		}
		if(isset($_POST['answer6']))
		{
			$answer6 =$_POST['answer6'];
		}
		else
		{
		$answer6 = '';
		}
		if(isset($_POST['answer7']))
		{
			$answer7 =$_POST['answer7'];
		}
		else
		{
		$answer7 = '';
		}
		if(isset($_POST['answer8']))
		{
			$answer8 =$_POST['answer8'];
		}
		else
		{
		$answer8 = '';
		}
		if(isset($_POST['answer9']))
		{
			$answer9 =$_POST['answer9'];
		}
		else
		{
		$answer9 = '';
		}
		if(isset($_POST['answer10']))
		{
			$answer10 =$_POST['answer10'];
		}
		else
		{
		$answer10 = '';
		}		
		if(isset($_POST['correct1']))
		{
			$correct1 ='correct';
		}
		else
		{
		$correct1 = 'incorrect';
		}
		if(isset($_POST['correct2']))
		{
			$correct2 ='correct';
		}
		else
		{
		$correct2 = 'incorrect';
		}
		if(isset($_POST['correct3']))
		{
			$correct3 ='correct';
		}
		else
		{
		$correct3 = 'incorrect';
		}
		if(isset($_POST['correct4']))
		{
			$correct4 ='correct';
		}
		else
		{
		$correct4 = 'incorrect';
		}
		if(isset($_POST['correct5']))
		{
			$correct5 ='correct';
		}
		else
		{
		$correct5 = 'incorrect';
		}
		if(isset($_POST['correct6']))
		{
			$correct6 ='correct';
		}
		else
		{
		$correct6 = 'incorrect';
		}
		if(isset($_POST['correct7']))
		{
			$correct7 ='correct';
		}
		else
		{
		$correct7 = 'incorrect';
		}
		if(isset($_POST['correct8']))
		{
			$correct8 ='correct';
		}
		else
		{
		$correct8 = 'incorrect';
		}
		if(isset($_POST['correct9']))
		{
			$correct9 ='correct';
		}
		else
		{
		$correct9 = 'incorrect';
		}
		if(isset($_POST['correct10']))
		{
			$correct10 ='correct';
		}
		else
		{
		$correct10 = 'incorrect';
		}		
		if(isset($_POST['desc']))
		{
			$desc = $_POST['desc'];
		}
		else
		{
		$desc = '';
		}
		if(isset($_POST['yn']))
		{
			$yn = $_POST['yn'];
			
		}
		else
		{
		$yn = '';
		}
		if(isset($_POST['correct']))
		{
		$correct = $_POST['correct'];
		}
		else
		{
		$correct = '';
		}
		$mark = $_POST['mark'];
		mysql_query("UPDATE tbl_question SET question='$question',answer1='$answer1',answer2='$answer2',answer3='$answer3',answer4='$answer4',answer5='$answer5',answer6='$answer6',answer7='$answer7',answer8='$answer8',answer9='$answer9',answer10='$answer10',correct='$correct',correct1='$correct1',correct2='$correct2',correct3='$correct3',correct4='$correct4',correct5='$correct5',correct6='$correct6',correct7='$correct7',correct8='$correct8',correct9='$correct9',correct10='$correct10',marks='$mark',description='$desc',yes_no='$yn' WHERE question_id = '$id'");
		$q = mysql_query("SELECT quiz_id FROM tbl_question WHERE question_id = '$id'");
		$row = mysql_fetch_assoc($q);
		return $row['quiz_id'];
	}
					
}
?>