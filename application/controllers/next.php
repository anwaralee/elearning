<?php
class Next extends CI_Controller
{
		public function __construct ()
		{
			parent::__construct();
			$this->load->model('next_model');
			/*$this->session->unset_userdata('history');
			if($this->session->userdata('user'))
			{
				if($this->course_model->check_history() == FALSE)
				{
					$this->session->set_userdata('history','error');
					redirect('dashboard/select_courses');
				}
			}*/
			if(!$this->session->userdata('user'))
			{
				redirect('login');
			}
		}
		
		function success()
		{
			$id=$this->uri->segment(3);
			$catid=$this->next_model->getCategoryId($id);
			
			$exist=$this->next_model->lesson($catid);
			$data['id']=$id;
			if($exist!=NULL)
			{
			 
			$data['pages']='success';
			}
			else 
			{
			$data['pages']='pages/success';		
			}
			$this->load->view('dashboard_view',$data);

		}
		
		function lesson()
		{
			$id=$this->uri->segment(3);
			//$title=$this->next_model->getCourseTitle($id);
			$catid=$this->next_model->getCategoryId($id);
			$data['nextLesson']=$this->next_model->lesson($catid);
			$data['pages']='success';
			$this->load->view('dashboard_view',$data); 
		}
		
}
?>