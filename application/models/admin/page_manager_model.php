<?php 
	class Page_manager_model extends CI_model
	{
		function page_list()
		{
			$q="select staticpage_id,staticpage_title from tbl_staticpages";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function edit_page()
		{
			$id=$this->uri->segment(3);
			$q="select * from tbl_staticpages where staticpage_id='$id'";
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		
		function update_page()
		{
			$id=$this->uri->segment(3);
			$link=$this->input->post('page_link');
			$title=$this->input->post('page_title');
			$content=$this->input->post('page_content');
			$key=$this->input->post('page_meta_key');
			$desc=$this->input->post('page_meta_desc');
			$q="update tbl_staticpages set staticpage_link='$link', staticpage_title='$title', staticpage_content='$content', staticpage_metakey='$key', staticpage_metadesc='$desc' where staticpage_id='$id'";
			$res=mysql_query($q);
			if($res)
			{
				return $res;	
			}
			else return NULL;
		}
	}
?>