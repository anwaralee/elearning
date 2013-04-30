<?php
class Course_model extends CI_Model
{
    function get_cat()
    {
        $q = mysql_query("SELECT cat_id,cat_title FROM tbl_category WHERE status = 1");
        if(mysql_num_rows($q) > 0)
        {
         	return $q;
        }
        else
        return NULL;
    }
    
    function get_type()
    {
        $q = mysql_query("SELECT course_type_id,course_type_title FROM tbl_course_type WHERE status = 1");
        if(mysql_num_rows($q) > 0)
        {
            return $q;
        }
        else
        return NULL;
    }
    
    function list_course()
    {
        $q = mysql_query("SELECT tbl_course.* , tbl_display_order.order_by FROM tbl_course,tbl_display_order WHERE tbl_course.course_id = tbl_display_order.course_id ORDER BY tbl_display_order.order_by");
        if(mysql_num_rows($q)>0)
        {
        return $q;
        }
    else return FALSE;
    }
	function get_course_order()
	{
		$q = mysql_query("SELECT course_id, order_by FROM tbl_display_order");
		if(mysql_num_rows($q)>0)
		{
			while($row = mysql_fetch_assoc($q))
			{
				$data[$row['course_id']] = $row['order_by'];
			}
			return $data;
		}
	}
	function update_order()
	{
		if($this->uri->segment(3) == 'up')
		{
			$course_id = $this->uri->segment(4);
			$q = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$course_id'");
			$row = mysql_fetch_row($q);
			$order = $row[0];
			if($order != 1)
			{
				$order2 = $order - 1;
				mysql_query("UPDATE tbl_display_order SET order_by = -1 WHERE order_by = '$order'");
				mysql_query("UPDATE tbl_display_order SET order_by = '$order' WHERE order_by = '$order2'");
				mysql_query("UPDATE tbl_display_order SET order_by = '$order2' WHERE order_by = -1");
				
			}
		}
		else
		{
			$course_id = $this->uri->segment(4);
			$q = mysql_query("SELECT order_by FROM tbl_display_order ORDER BY order_by DESC LIMIT 1");
			$row = mysql_fetch_row($q);
			$ob = $row[0];
			$q1 = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$course_id'");
			$row1 = mysql_fetch_row($q1);
			$ob1 = $row1[0];
			if($ob != $ob1)
			{
				$order = $ob1;
				$order2 = $order + 1;
				mysql_query("UPDATE tbl_display_order SET order_by = -1 WHERE order_by = '$order'");
				mysql_query("UPDATE tbl_display_order SET order_by = '$order' WHERE order_by = '$order2'");
				mysql_query("UPDATE tbl_display_order SET order_by = '$order2' WHERE order_by = -1");
			}
		}
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
    	if(isset($_POST['available']))
    	{
    	   $available = 1;
    	}
    	else
    	$available = 0;
    	if(isset($_POST['download']))
    	{
    	   $dl = 1;
    	}
    	else
    	$dl = 0;
    	$cat = $_POST['cat'];
    	$type = $_POST['type'];
    	$length = $_POST['length'];
    	$size = $_POST['size'];
    	$source = $_POST['source'];
    	$author = $_POST['author'];
    	$credit = $_POST['credit'];
		if($available == 1 && $active == 1)
		{
    	$sql = mysql_query("select order_by FROM tbl_display_order");
    			if(mysql_num_rows($sql)>0)
    			{
    				$i = 0;
    				while($row = mysql_fetch_row($sql))
    				{
    					$i++;
    					if($i == 1)
    					$order = $row[0];
    					else
    					if($row[0] > $order)
    					$order = $row[0];
    				}
					$order++;
    			}
    			else $order = 1;
		}
		else
		$order = 0;
    	if($type=="Youtube Video")
    	{
        	$file=$_POST['file'];
        	$q = "INSERT INTO tbl_course
        	VALUES('','$cat','$type','$title','$desc','$file','$length','$size','$source','$author','$credit','$dl','$available','$active')";
        	$this->db->query($q);        	
        	$sq = mysql_query("select course_id FROM tbl_course order by course_id desc limit 1");
        	$s = mysql_fetch_row($sq);
        	$coid = $s[0];
        	mysql_query("INSERT INTO tbl_display_order VALUES ('','$cat','$coid','$order')");
    	
    	}
    	else
    	{
        	$ext = end(explode('.',$_FILES['file']['name']));
        	if($ext!=NULL)
        	{
        	
            	$file = time()."_".rand("100000","999999").'.'.$ext;
            	$path = str_replace('system/','',BASEPATH).'course_content/';
            	$path .= $file;
            	if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
            	{
                	$q = "INSERT INTO tbl_course
                	VALUES('','$cat','$type','$title','$desc','$file','$length','$size','$source','$author','$credit','$dl','$available','$active')";
                	if($this->db->query($q))
            			{
            				$sq = mysql_query("select course_id FROM tbl_course order by course_id desc limit 1");
            				$s = mysql_fetch_row($sq);
            				$coid = $s[0];
            				mysql_query("INSERT INTO tbl_display_order VALUES ('','$cat','$coid','$order')");
            			}
            	}
            	else
            	{
                	echo "Error: ".$_FILES["file"]["error"]."<br />";
            	}
        	}
        	else
        	{
            	$file = '';
            	$q = "INSERT INTO tbl_course
            	VALUES('','$cat','$type','$title','$desc','$file','$length','$size','$source','$author','$credit','$dl','$available','$active')";
            	if($this->db->query($q))
            	{
            		$sq = mysql_query("select course_id FROM tbl_course order by course_id desc limit 1");
            				$s = mysql_fetch_row($sq);
            				$coid = $s[0];
            				mysql_query("INSERT INTO tbl_display_order VALUES ('','$cat','$coid','$order')");
            	}
        	}
    	}
		if($_POST['type'] == 'Questionaire')
		{
			$q = mysql_query("SELECT course_id FROM tbl_course ORDER BY course_id DESC LIMIT 1");
			if(mysql_num_rows($q)>0)
			{
				$row = mysql_fetch_row($q);
				return $row[0];
			}
			else return NULL;
		}
   	}
    
    function remove()
    {
        $id = $this->uri->segment(3);
		$q1 = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$id'");
        $q4 = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$id'");
		$row4 = mysql_fetch_row($q4);
		$caid = $row4[0];
		if(mysql_num_rows($q1)>0)
		{
			$row = mysql_fetch_row($q1);
			$ord = $row[0];
			$q2 = mysql_query("SELECT course_id,order_by FROM tbl_display_order WHERE order_by > '$ord' AND cat_id = '$caid'");
			if(mysql_num_rows($q2)>0)
			{
				while($row1 = mysql_fetch_assoc($q2))
				{
					$ord = $row1['order_by'] -1;
					$cid = $row1['course_id'];
					mysql_query("UPDATE tbl_display_order SET order_by = '$ord' WHERE course_id = '$cid'");
				}
			}
		}
        $q = mysql_query("DELETE FROM tbl_course WHERE course_id = '$id'");
		if($q)
		$r = mysql_query("DELETE FROM tbl_display_order WHERE course_id = '$id'");
        return $r;
    }
    function delete_file()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT course_file FROM tbl_course WHERE course_id = '$id'");
        if(mysql_num_rows($q)>0)
        {
            $file = mysql_fetch_row($q);
            unlink(str_replace('system/','',BASEPATH).'/course_content/'.$file[0]);
        }
    }
    function get_course_recs()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT * FROM tbl_course WHERE course_id = '$id'");
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
        if(isset($_POST['active']))
        {
            $active = 1;
        }
        else
        $active = 0;
        if(isset($_POST['available']))
        {
         $available = 1;
        }
        else
        $available = 0;
		if($active == 0 || $available == 0)
		{
			$sql = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$id'");
			$row = mysql_fetch_row($sql);
			$order = $row[0];
			if($order != 0)
			{
				$ord = $order;
				$order =0;
				mysql_query("UPDATE tbl_display_order SET order_by = 0 WHERE course_id = '$id'");
				$sql1 = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$id'");
				$res1 = mysql_fetch_row($sql1);
				$cat_id = $res1[0];
				$sql2 = mysql_query("SELECT course_id,order_by FROM tbl_display_order WHERE cat_id = '$cat_id' AND order_by > '$ord'");
				if(mysql_num_rows($sql2)>0)
				{
					while($res2 = mysql_fetch_row($sql2))
					{
						$ords = $res2[1]-1;
						$course_id = $res2[0];
						mysql_query("UPDATE tbl_display_order SET order_by = '$ords' WHERE course_id = '$course_id'");
					}
				}
				
			}
		}
		if($active == 1 && $available == 1)
		{
				$sql5 = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$id'");
				$res5 = mysql_fetch_row($sql5);
				$cat_id1 = $res5[0];
				$sql6 = mysql_query("SELECT order_by FROM tbl_display_order WHERE course_id = '$id'");
				if(mysql_num_rows($sql6)>0)
				{
					$ord_b = mysql_fetch_row($sql6);
					$ob = $ord_b[0];
					if($ob == 0)
					{
						$q10 = mysql_query("SELECT order_by FROM tbl_display_order WHERE cat_id = '$cat_id1' ORDER BY order_by DESC LIMIT 1");
						if(mysql_num_rows($q10)>0)
						{
							$query = mysql_fetch_row($q10);
							$go = $query[0];
							$go++;
							mysql_query("UPDATE tbl_display_order SET order_by = '$go' WHERE course_id = '$id'");
						}
					}
				}
		}
        if(isset($_POST['download']))
        {
         $dl = 1;
        }
        else
        $dl = 0;
        $cat = $_POST['cat'];
        $type = $_POST['type'];
        $length = $_POST['length'];
        $size = $_POST['size'];
        $source = $_POST['source'];
        $author = $_POST['author'];
        $credit = $_POST['credit'];
        if($type=="Youtube Video")
        {
            $file=$_POST['file'];
            $q="update tbl_course
            set cat_id='$cat',
            course_type_title='$type',
            course_name='$title',
            course_description='$desc',
            course_length='$length',
            course_file='$file',
            doc_size='$size',
            source='$source',
            author='$author',
            credit_hour='$credit',
            download='$dl',
            isAvailable='$available',
            status='$active' where course_id = '$id'";
            return $this->db->query($q);
        }
        else
        {
            $ext = end(explode('.',$_FILES['file']['name']));
            if($ext=='')
            {
                $q="update tbl_course
                set cat_id='$cat',
                course_type_title='$type',
                course_name='$title',
                course_description='$desc',
                course_length='$length',
                doc_size='$size',
                source='$source',
                author='$author',
                credit_hour='$credit',
                download='$dl',
                isAvailable='$available',
                status='$active' where course_id = '$id'";
                return $this->db->query($q);
            }
            else if($ext!=NULL)
            {
            
                $file = time()."_".rand("100000","999999").'.'.$ext;
                $path = str_replace('system/','',BASEPATH);
                $path .= 'course_content/'.$file;
                if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
                {
                    $sql = mysql_query("SELECT course_file FROM tbl_course WHERE course_id = '$id'");
                    if(mysql_num_rows($sql)>0)
                    {
                        $row = mysql_fetch_row($sql);
                        unlink(str_replace('system/','',BASEPATH).'course_content/'.$row[0]);
                    }
                }
                $sql = mysql_query("DELETE FROM tbl_course WHERE course_id = '$id'");
                $q = "INSERT INTO tbl_course VALUES('$id','$cat','$type','$title','$desc','$file','$length','$size','$source','$author','$credit','$dl','$available','$active')";
                return $this->db->query($q);
            }
        }
    }
    
    function getCategoryTitle()
    {
    $q = "SELECT * FROM tbl_category";
    $res = mysql_query($q);
    if(mysql_num_rows($res)>0)
    {
    return $res;
    }
    else return NULL;
    }

    
    function getTypeTitle()
    {
    $q = "SELECT * FROM tbl_course_type";
    $res = mysql_query($q);
    if(mysql_num_rows($res)>0)
    {
    return $res;
    }
    else return NULL;
    }
    
    function view_course()
    {
    //$user=$this->session->userdata('user');
    $file=$this->uri->segment(3);
    $q="select * from tbl_course where course_file='$file'";
    $result=mysql_query($q);
    if(mysql_num_rows($result)>0)
    {
    return $result;
    }
    else return NULL;
    }
    function view_course_content()
		 {
			// $user=$this->session->userdata('admin');
			$id=$this->uri->segment(3);	 
			$q="select * from tbl_course where course_id='$id'";
			$result=mysql_query($q);
			if(mysql_num_rows($result)>0)
			{
				return $result;
			}
			else return NULL;
		 }
    function download($c_id,$ct_id)
		 {
			  //$user=$this->session->userdata('user');
			$q="select course_file from tbl_course where course_id='$c_id' and course_type_title='$ct_id'";
			$result=mysql_query($q);
			if(mysql_num_rows($result)>0)
			{
				return $result;
			
			}
			else return NULL;
		 }
         function getCategory()
		 {
			 $q = mysql_query("SELECT * FROM tbl_category");
			 if(mysql_num_rows($q)>0)
			 {
				 return $q;
			 }
			 else
			 return NULL;
		 }
		 function getCourseByCat()
		 {
			 if(isset($_POST['']))
			 $id = $_POST['cat'];
			 else
			 $id=$this->session->userdata('course_list');
			 $q = mysql_query("SELECT tbl_course.* , tbl_display_order.order_by FROM tbl_course,tbl_display_order WHERE tbl_course.course_id = tbl_display_order.course_id AND tbl_course.cat_id = '$id' ORDER BY tbl_display_order.order_by");
			if(mysql_num_rows($q)>0)
			{
			return $q;
			}
		else return FALSE;
		 }
		function lesson_title()
		{
			$id = $this->uri->segment(3);
			$q = mysql_query("SELECT course_name FROm tbl_course WHERE course_id = '$id'");
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		
		function add_questionare()
		{
			$question = $_POST['q'];
			$type = $_POST['type'];
			if(isset($_POST['answer']))
			{
				if($_POST['answer'])
				$answer1 =$_POST['answer'];
				else
				if(isset($_POST['answers']))
				$answer1 =$_POST['answers'];
			}
			else
			{
			if(isset($_POST['answers']))
			$answer1 =$_POST['answers'];
			else
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
			//$mark = $_POST['mark'];
			$qid = $this->uri->segment(3);
			$q = "INSERT INTO tbl_questionare VALUES('','$qid','".$question."','$type','".$answer1."','".$answer2."','".$answer3."','".$answer4."','".$answer5."','".$answer6."','".$answer7."','".$answer8."','".$answer9."','".$answer10."','$correct','".$correct1."','".$correct2."','".$correct3."','".$correct4."','".$correct5."','".$correct6."','".$correct7."','".$correct8."','".$correct9."','".$correct10."','$desc','$yn')"; 
			$q = mysql_query($q);		
		}
		function edit_questionaire()
		{
			$id = $this->uri->segment(3);
			$q1 = mysql_query("SELECT cat_id FROM tbl_course WHERE course_id = '$id'");
			$row1 = mysql_fetch_row($q1);
			$cat_id = $row1[0];
			$q = mysql_query("SELECT tbl_questionare.question_id, tbl_questionare.question,tbl_course.course_name FROM tbl_questionare,tbl_course WHERE tbl_course.course_id = '$id' AND tbl_course.cat_id = '$cat_id' AND tbl_questionare.course_id = tbl_course.course_id");
			if(mysql_num_rows($q)>0)
			{
				return $q;
			}
			else
			return NULL;
		}
		function remove_q()
		{
			$id = $this->uri->segment(3);
			$q1 = mysql_query("SELECT course_id FROM tbl_questionare WHERE question_id = '$id'");
			$row = mysql_fetch_row($q1);
			$q = mysql_query("DELETE FROM tbl_questionare WHERE question_id = '$id'");						
			return $row[0];
		}
    function get_q()
    {
        $id = $this->uri->segment(3);
        $q = mysql_query("SELECT * FROM tbl_questionare WHERE question_id = '$id'");
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
		mysql_query("UPDATE tbl_questionare SET question='$question',answer1='$answer1',answer2='$answer2',answer3='$answer3',answer4='$answer4',answer5='$answer5',answer6='$answer6',answer7='$answer7',answer8='$answer8',answer9='$answer9',answer10='$answer10',correct='$correct',correct1='$correct1',correct2='$correct2',correct3='$correct3',correct4='$correct4',correct5='$correct5',correct6='$correct6',correct7='$correct7',correct8='$correct8',correct9='$correct9',correct10='$correct10',description='$desc',yes_no='$yn' WHERE question_id = '$id'");
		$q = mysql_query("SELECT course_id FROM tbl_questionare WHERE question_id = '$id'");
		$row = mysql_fetch_assoc($q);
		return $row['course_id'];
	
	}
}
?>
