<?php
	class Schedule_model extends CI_model
	{
		function list_schedule()
		{
			$q=mysql_query("select * from tbl_training");	
			if(mysql_num_rows($q)>0)
			{
				return $q;	
			}
			else return NULL;
		}
		
		function add_schedule()
		{
			if(isset($_POST['active']))
			{
				$active=1;	
			}
			else $active=0;
			$title=$this->input->post('title');	
			$desc=$this->input->post('desc');
			$trainer=$this->input->post('trainer');
			$trainer2=$this->input->post('trainer2');
			$date=$this->input->post('date');
			$time=$this->input->post('time');
			$loc=$this->input->post('location');
			$equip=$this->input->post('equipment');
			$notes=$this->input->post('notes');
			$q="insert into tbl_training values('','$trainer','$trainer2','$title','$desc','$date','$time','$loc','$equip','$notes','$active')";
			$res=mysql_query($q);
		}
		
		function edit_schedule()
		{
		$id=$this->uri->segment(3);	
		$q=mysql_query("select * from tbl_training where training_id='$id'");
		if(mysql_num_rows($q)>0)
		{
			return $q;	
		}
		else return NULL;
		}
		
		function update_schedule()
		{
		$id=$this->uri->segment(3);
		if(isset($_POST['active']))
			{
				$active=1;	
			}
			else $active=0;
			$title=$this->input->post('title');	
			$desc=$this->input->post('desc');
			$trainer=$this->input->post('trainer');
			$trainer2=$this->input->post('trainer2');
			$date=$this->input->post('date');
			$time=$this->input->post('time');
			$loc=$this->input->post('location');
			$notes=$this->input->post('notes');
			$equip=$this->input->post('equipment');
		$q="update tbl_training set training_title='$title', training_desc='$desc', trainer_id='$trainer',  trainer2_id='$trainer2',training_date='$date', training_time='$time', training_location='$loc',equipment='$equip', notes='$notes', status='$active' where training_id='$id'";	
		mysql_query($q);
		}
		
		function remove_schedule()
		{
			$id=$this->uri->segment(3);
			$q="delete from tbl_training where training_id='$id'";	
			mysql_query($q);
		}
		
		function getTrainer()
		{
			$q="select * from tbl_trainer where status=1";	
			$res=mysql_query($q);
			if(mysql_num_rows($res)>0)
			{
				return $res;	
			}
			else return NULL;
		}
		function inspect()
		{
			$y = $this->uri->segment(3);
			$d = $this->uri->segment(4);
			$m = $this->uri->segment(5);
			if(($d == 1) ||($d == 2) ||($d == 3) ||($d == 4) ||($d == 5) ||($d == 6) ||($d == 7) ||($d == 8) ||($d == 9))
			{
				$d = '0'.$d;
			}
			$date = $d.'-'.$m.'-'.$y;
			$q = mysql_query("SELECT * FROM tbl_training WHERE training_date = '$date'");
			if(mysql_num_rows($q)>0)
			{
				return $q;
			}
			else return NULL;
		}
	}
?>