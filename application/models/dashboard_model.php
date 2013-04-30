<?php
	class Dashboard_model extends CI_model
	{
		function getCategory()	
		{
			$q = "SELECT * FROM tbl_category WHERE status = 1 ORDER BY cat_title";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
			else return "No active Category available";
		}
		
		function getType()	
		{
			$q = "SELECT * FROM tbl_course_type WHERE status = 1 ORDER BY course_type_title";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
			else return "No active Type available";
		}
		function getCategoryTitle($id)	
		{
			$q = "SELECT * FROM tbl_category WHERE cat_id = '$id'";
			$res = mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				$res = mysql_fetch_assoc($res);
				return $res['cat_title'];
			}
			else return "No active Category available";
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
		
		/*
		function getSearchCourse($limit=NULL,$offset=NULL)
		{
			$limit = 5;
			$offset=$this->uri->segment(3);
			if(!$offset)
			{
				$offset=0;	
			}
			$cat_id=$this->input->post('category');	
			$type_id=$this->input->post('type');
			if($cat_id != 'nocat' && $type_id != 'notype')
			{
				$q="select tbl_course.*,tbl_category.cat_title,tbl_course_type.course_type_title
				from tbl_course,tbl_category,tbl_course_type
				where
				tbl_course.cat_id='$cat_id' and 
				tbl_course.course_type_id='$type_id' and 
				tbl_course.isAvailable=1 and 
				tbl_course.status=1 and
				tbl_category.cat_id='$cat_id' and
				tbl_course_type.course_type_id='$type_id'
				order by tbl_course.course_name
				limit $offset,$limit";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					return $res;	
					
				}
				else
						return NULL;
			}
			else if($cat_id == 'nocat' && $type_id != 'notype')
				{
					$q="select tbl_course.*,tbl_course_type.course_type_title,tbl_category.cat_title
				from tbl_course,tbl_course_type,tbl_category
				where
				tbl_course.course_type_id='$type_id' and 
				tbl_course.isAvailable=1 and 
				tbl_course.status=1 and 
				tbl_course_type.course_type_id='$type_id' and
				tbl_category.cat_id=tbl_course.cat_id
				order by tbl_course.course_name
				limit $offset,$limit";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					return $res;	
					
				}
				else
				{
						return NULL;
				}
				}
				else if($cat_id != 'nocat' && $type_id == 'notype')
					{
						$q="select tbl_course.*,tbl_category.cat_title,course_type_title
						from tbl_course,tbl_category,tbl_course_type
						where
						tbl_course.cat_id='$cat_id' and 
						tbl_course.isAvailable=1 and 
						tbl_course.status=1 and
						tbl_category.cat_id='$cat_id' and
						tbl_course_type.course_type_id=tbl_course.course_type_id
						order by tbl_course.course_name
						limit $offset,$limit";
						$res=mysql_query($q);
						if(mysql_num_rows($res)>0)
						{
							return $res;	
						}
						else
						{
						return NULL;
						}
					}
					else
					{
						$q="select tbl_course.*,tbl_category.*,tbl_course_type.*
							from tbl_course,tbl_category,tbl_course_type
							where
							tbl_course.isAvailable=1 and 
							tbl_course.status=1 and
							(tbl_course.cat_id=tbl_category.cat_id or
							tbl_course.course_type_id=tbl_course_type.course_type_id)
							order by tbl_course.course_name
							limit $offset,$limit";
						$res=mysql_query($q);
						if(mysql_num_rows($res)>0)
						{
							return $res;	
							
						}
						else
						{
						return NULL;
						
						}
					}
			
		}*/
		function getSearchCourse(/*$limit=NULL,$offset=NULL*/)
		{
			/*$limit = 5;
			$offset=$this->uri->segment(3);
			if(!$offset)
			{
				$offset=0;	
			}*/
			if($this->input->post())
			$cat_id=$this->input->post('category');
			else
			$cat_id = $this->session->userdata('search_course');
			if($cat_id != 'nocat')
			{
				$q="select tbl_course.*,tbl_display_order.order_by 
				from tbl_course,tbl_display_order
				where 
				tbl_course.isAvailable=1 and 
				tbl_course.status=1 and
				tbl_course.cat_id='$cat_id' and tbl_course.course_id = tbl_display_order.course_id ORDER BY tbl_display_order.order_by";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					return $res;	
					
				}
				else
						return NULL;
			}
		}
		function get_cat_title()
		{
			if($this->input->post())
			$id=$this->input->post('category');
			else
			$id = $this->session->userdata('search_course');
			$q = mysql_query("SELECT cat_title FROM tbl_category WHERE cat_id = '$id'");
			$row = mysql_fetch_row($q);
			return $row[0];
		}
		function getSearchCourse_count()
		{	
			$cat_id=$this->input->post('category');
			if($cat_id != 'nocat')
			{
				$q="select * 
				from tbl_course
				where
				isAvailable=1 and 
				status=1 and
				cat_id='$cat_id''";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					$i=0;
					while(mysql_fetch_row($res))
					{
					$i++;	
					}
					return $i;
				}
				else
						return NULL;
			}
			else 
			{
				if($cat_id == 'nocat')
				{
						$q="select *
							from tbl_course
							where
							tbl_course.isAvailable=1 and 
							tbl_course.status=1 ";
						$res=mysql_query($q);
						if(mysql_num_rows($res)>0)
						{
							$i=0;
							while(mysql_fetch_row($res))
							{
							$i++;	
							}
							return $i;
						}
						else
						return NULL;
					}
				}
			}		
		function account_settings($user)
		{
			$q="select * from tbl_users where username='$user'"	;
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;
			}
		}
		
		function update_settings()
		{
			$user=$this->session->userdata('user');
			$first=$this->input->post('first');
			$middle=$this->input->post('middle');
			$last=$this->input->post('last');
			$un=$this->input->post('user');
			$pass=$this->input->post('pass');
			$contact=$this->input->post('contact');
			//$image=$this->input->post('image');
			$email=$this->input->post('email');
			$gender=$this->input->post('gender');
			$yyyy=$this->input->post('yyyy');
			$mm=$this->input->post('mm');
			$dd=$this->input->post('dd');
			$country=$this->input->post('country');
			$city=$this->input->post('city');
			$province=$this->input->post('province');
			$postal=$this->input->post('postal');
			$date=date('Y/m/d H:i:s');
			$file_name = time()."_".rand("100000","999999");
			$ext = end(explode('/', $_FILES['image']['type']));
			if($ext!='')
			{
			$complete=$file_name.".".$ext;
			$path = str_replace('system/','',BASEPATH).'images/users/'.$complete;
			if(move_uploaded_file($_FILES['image']['tmp_name'],$path))
			{
				$q="select image from tbl_users where username='$user'";
				$res=mysql_query($q);
				if(mysql_num_rows($res)>0)
				{
					$img=mysql_fetch_assoc($res);	
					unlink(str_replace('system/','',BASEPATH).'images/users/'.$img['image']);
				}
				else return NULL;
			}
			$data = array(
						   			  
						   'first_name' => $first ,
						   'middle_name' => $middle ,
						   'last_name' => $last,
						   'username' => $un,
						   'password' => $pass,
						   'contact_number' => $contact,
						   'image' => $complete,
						   'email' => $email,
						   'gender' => $gender,
						   'dob_year' => $yyyy,
						   'dob_month' => $mm,
						   'dob_day' => $dd,
						   'country_id' => $country,
						   'city' => $city,
						   'province_id' => $province,
						   'postal_code' => $postal,
						   'isPaid' => '',
						   'registered_date' => $date,
						   'verification_code' => '',
						   'status' => '1'
						);
			}
			else
			{
				$data = array(
						   			  
						   'first_name' => $first ,
						   'middle_name' => $middle ,
						   'last_name' => $last,
						   'username' => $un,
						   'password' => $pass,
						   'contact_number' => $contact,
						   'email' => $email,
						   'gender' => $gender,
						   'dob_year' => $yyyy,
						   'dob_month' => $mm,
						   'dob_day' => $dd,
						   'country_id' => $country,
						   'city' => $city,
						   'province_id' => $province,
						   'postal_code' => $postal,
						   'isPaid' => '',
						   'registered_date' => $date,
						   'verification_code' => '',
						   'status' => '1'
						);
			}
			$this->db->where("username", $user);
			$q=$this->db->update('tbl_users', $data); 
			if($q)
			{
				$this->session->unset_userdata('user');
				$this->session->set_userdata('user',$un);
				return true;	
			}
			else return NULL;
		}
		
		function getConfiguration()
	{
		$q="select * from tbl_configuration";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			return $res;	
		}
		else return NULL;
	}
	
	function user_content()
	{
		$q="select * from tbl_staticpages where staticpage_id=21";
		$res=mysql_query($q);
		if(mysql_num_rows($res)>0)
		{
			return $res;	
		}
		else return NULL;	
	}
    function check_quiz($id)
    {
        $q = mysql_query("SELECT course_id FROM tbl_quiz WHERE course_id = '$id'");
        if(mysql_num_rows($q)>0)
        return true;
        else
        return FALSE;
    }
	}
?>