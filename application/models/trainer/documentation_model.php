<?php
	class Documentation_model extends CI_model
	{
		
		 function list_document()
		 {
		  	$q="select * from tbl_doc where status=1";		
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		 }
		 
		 function view_document()
		 {
			 $id=$this->uri->segment(3);
		  	 $q="select * from tbl_doc where doc_id='$id' and status=1";
			 $res=mysql_query($q);
			 if(mysql_num_rows($res)>0)
			 {
				return $res;	 
			 }
			 else return NULL;
		 }
		
		 function view_docs()
		 {
			$id=$this->uri->segment(3);	 
			$quer="select * from tbl_doc where doc_id='$id'";
			$result=mysql_query($quer);
			if(mysql_num_rows($result)>0)
			{
				return $result;
			}
			else return NULL;
		 }
		 
		 function download($id)
		 {
			$q="select doc_file from tbl_doc where doc_id='$id' and isDownloadable=1";
			$result=mysql_query($q);
			if(mysql_num_rows($result)>0)
			{
				return $result;
			
			}
			else return NULL;
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
	}
?>