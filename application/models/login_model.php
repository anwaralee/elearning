<?php
	class Login_model extends CI_model
	{
		function verify()
		{
			$un=$this->input->post('un');
			$pw=$this->input->post('pw');
			$as=$this->input->post('as');
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
						$ip=$_SERVER['REMOTE_ADDR'];
						/*$query="select user_id from tbl_log_manager where user_id='$uid'";
						$ress=mysql_query($query);
						if(mysql_num_rows($ress)>0)
						{*/
						$que="insert into tbl_log_manager (log_id,user_id,user_login_date,ip,log_status) values('',$uid,'$date','$ip',1)";
						$r=mysql_query($que);
						/*}
						else
							{
								$quer = "INSERT into tbl_log_manager VALUES('','$uid','$date',1)";
								mysql_query($quer);	
							}*/
							
					}
					return true;
				}
				else return false;
			}
			else
			if($as == 'admin')
			{
				$q="SELECT admin_username, admin_password, admin_id FROM tbl_admin WHERE admin_username = '$un' AND admin_password = '$pw' AND status = 1";
				$res=$this->db->query($q);
				if($res->num_rows() > 0)
				{
					$this->session->set_userdata('admin',$un);
					return true;
				}
				else return false;
			}
            	else
			if($as == 'trainer')
			{
				$q="SELECT username, password, trainer_id FROM tbl_trainer WHERE username = '$un' AND password = '$pw' AND status = 1";
				$res=$this->db->query($q);
				if($res->num_rows() > 0)
				{
					$this->session->set_userdata('trainer',$un);
					return true;
				}
				else return false;
			}
                 
                 else 
                       if($as == 'superadmin'){
                           
                       }
		}
		
		function logout($uname)
	{
		$q="select user_id from tbl_users where username='$uname'";
		$res=mysql_query($q);
		$id=mysql_fetch_assoc($res);
		$uid=$id['user_id'];
		$date = date('Y/m/d G:i:s');
		$q="select log_id from tbl_log_manager where user_id='$uid' order by log_id desc limit 1";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			$logid=mysql_fetch_assoc($res);
			$id=$logid['log_id'];
		$q="update tbl_log_manager set log_status=0,user_logout_date='$date' where log_id='$id'";
		mysql_query($q);
		}
	}
	
		
	function getCountry()
	{
	$q='select * from tbl_country';
	$res=mysql_query($q);
	if(mysql_num_rows($res)>0);
		{
			return $res;	
		}
		//else return NULL;
	}
	
	function signup_verify()
	{
			$first=$this->input->post('first');
			//$middle=$this->input->post('middle');
			$last=$this->input->post('last');
			$user=$this->input->post('user');
			$pass=$this->input->post('pass');
			$contact=$this->input->post('contact');
			//$image=$this->input->post('image');
			$email=$this->input->post('email');
                        $batch = $this->input->post('batch');
                        $course = $this->input->post('course');
			//$gender=$this->input->post('gender');
			//$yyyy=$this->input->post('yyyy');
			/*$mm=$this->input->post('mm');
			$dd=$this->input->post('dd');
			$country=$this->input->post('country');
			$city=$this->input->post('city');
			$province=$this->input->post('province');
			$postal=$this->input->post('postal');
			$date=date('Y/m/d H:i:s');
			$file_name = time()."_".rand("100000","999999");
			$ext = end(explode('/', $_FILES['image']['type']));
			$complete=$file_name.".".$ext;
			$path = str_replace('system/','',BASEPATH).'/images/users/'.$complete;
			move_uploaded_file($_FILES['image']['tmp_name'],$path); */
			$data = array(
						   'user_id' =>'',				  
						   'first_name' => $first ,
						   //'middle_name' => $middle ,
						   'last_name' => $last,
						   'username' => $user,
						   'password' => $pass,
						   'contact_number' => $contact,
                                                   'batch' =>$batch,
                                                   'course'=>$course,
						  // 'image' => $complete,
						   'email' => $email,
						   /*'gender' => $gender,
						   'dob_year' => $yyyy,
						   'dob_month' => $mm,
						   'dob_day' => $dd,
						   'country_id' => $country,
						   'city' => $city,
						   'province_id' => $province,
						   'postal_code' => $postal, */
						   'isPaid' => '',
						  // 'registered_date' => $date,
						  // 'verification_code' => '',
						   'status' => '1' 
						);

			$this->db->insert('tbl_users', $data); 	
	}
	
	function login_forgot()
	{
		$email=$this->input->post('email');
		$q="select username,password from tbl_users where email='$email'";	
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
		return $res;	
		}
		else return NULL; 
	}
	
	function home_content()
	{
		$q="select * from tbl_staticpages where staticpage_id= 1";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
		return $res;	
		}
		else return NULL; 
		
	}
	
        function getAllBatches(){
            $batches = $this->db->get('tbl_batch');
             return $batches->result();
        }
        
        function getAllCourses(){
            
             $courses = $this->db->get('tbl_course');
             return $courses->result();
        }
        
        function getCoursesByBatch($id){
           
            $courseByBatch = $this->db->get_where('tbl_course', array('batch_id'=>$id));
            return $courseByBatch->result();
            
        }
	}
?>