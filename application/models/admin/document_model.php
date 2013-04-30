<?php
	class Document_model extends CI_Model
	{
		function add_document()
		{
			$title = $_POST['title'];
			$desc = $_POST['desc'];
			if(isset($_POST['active']))
			{
				$active = 1;
			}
			else
			$active = 0;
			if(isset($_POST['download']))
			{
			   $dl = 1;
			}
			else
			$dl = 0;
			$size = $_POST['size'];
			$file_name = time()."_".rand("100000","999999");
			$ext = end(explode('.', $_FILES['file']['name']));
			$complete=$file_name.".".$ext;
			$path = str_replace('system/','',BASEPATH).'/docs/'.$complete;
			if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
			{
				$q="insert into tbl_doc values('','$title','$desc','$complete','$size','$dl','$active')";
				$res=mysql_query($q);
			}
			else 
			{
				$q="insert into tbl_doc values('','$title','$desc','','$size','$dl','$active')";
				$res=mysql_query($q);	
			}
		}
		
		function list_document()
		{
			$q="select * from tbl_doc";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function edit()
		{
			$id=$this->uri->segment(3);
			$q="select * from tbl_doc where doc_id='$id'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function edit_document()
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
			if(isset($_POST['download']))
			{
			 $dl = 1;
			}
			else
			$dl = 0;
			$size = $_POST['size'];
        
            $ext = end(explode('.',$_FILES['file']['name']));
            if($ext=='')
            {
                $q="update tbl_doc
                set doc_title='$title',
                doc_desc='$desc',
                file_size='$size',
                isDownloadable='$dl',
                status='$active' where doc_id = '$id'";
                return $this->db->query($q);
            }
            else if($ext!=NULL)
            {
            
                $file = time()."_".rand("100000","999999").'.'.$ext;
                $path = str_replace('system/','',BASEPATH);
                $path .= 'docs/'.$file;
                if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
                {
                    $sql = mysql_query("SELECT doc_file FROM tbl_doc WHERE doc_id = '$id'");
                    if(mysql_num_rows($sql)>0)
                    {
                        $row = mysql_fetch_row($sql);
                        unlink(str_replace('system/','',BASEPATH).'docs/'.$row[0]);
                    }
                }
                $q="update tbl_doc
                set doc_title='$title',
                doc_desc='$desc',
				doc_file='$file',
                file_size='$size',
                isDownloadable='$dl',
                status='$active' where doc_id = '$id'";
                return $this->db->query($q);	
		}
		}
		
		function view_document()
		{
			$id=$this->uri->segment(3);	
			$q="select * from tbl_doc where doc_id = '$id'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function delete_document()
		{
			$id=$this->uri->segment(3);	
			$q="delete from tbl_doc where doc_id='$id'";
			mysql_query($q);
		}

	}
?>