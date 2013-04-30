<?php
	class Schedule_model extends CI_model
	{
		function list_schedule()
		{
			$trainer=$this->session->userdata('trainer');
			$query=mysql_query("select trainer_id from tbl_trainer where username='$trainer'");
			$i=mysql_fetch_assoc($query);
			$id=$i['trainer_id'];
			$q=mysql_query("select * from tbl_training where (trainer_id='$id' or trainer_id=0 or trainer2_id='$id') and status=1");	
			if(mysql_num_rows($q)>0)
			{
				return $q;	
			}
			else return NULL;
		}
		
		function view_schedule()
		{
			$id=$this->uri->segment(3);	
			$q=mysql_query("select * from tbl_training where training_id='$id'");	
			if(mysql_num_rows($q)>0)
			{
				return $q;	
			}
			else return NULL;
		}
		
		function getTrainer($id)
		{
			$q=mysql_query("select username from tbl_trainer where trainer_id='$id'");	
			if(mysql_num_rows($q)>0)
			{
				$res=mysql_fetch_assoc($q);
				return $res['username'];	
			}
			else return NULL;
		}	
	}
?>