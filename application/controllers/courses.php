<?php
	class Courses extends CI_controller
	{
		public function __construct ()
		{
			parent::__construct();
			$this->load->model('course_model');
			$this->session->unset_userdata('history');
			if($this->session->userdata('user') && $this->uri->segment(2) != 'course_history')
			{
				if($this->course_model->check_history() == FALSE)
				{
					$this->session->set_userdata('history','error');
					redirect('dashboard/select_courses');
				}
			}
		}
		
		function index()
		{
			if($this->session->userdata('user'))
			{
				redirect('dashboard/welcome');
			}
			else
			{
				redirect('login');
			}
					
		}

		function view_course()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$data['f']=$this->course_model->view_course();
			$data['pages'] = 'pages/course/view_docs';
			$this->load->view('dashboard_view',$data);
		}
		
		function view_video()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}
			$data['vdo']=$this->course_model->view_course();
			$data['pages'] = 'pages/course/view_video';
			$this->load->view('dashboard_view',$data);
		}
		
		function view_course_content()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$data['course_content']=$this->course_model->view_youtube();
			$data['pages'] = 'pages/course/view_youtube';
			$this->load->view('dashboard_view',$data);
		}
		
		function download()
		{
		if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
		$this->load->helper('download');
		$course_id=$this->uri->segment(3);
		$course_type_title=$this->uri->segment(4);
		$fil=$this->course_model->download($course_id,$course_type_title);
		if($fil != NULL)
		{
		$file=mysql_fetch_assoc($fil);
		$path=str_replace('system/','',BASEPATH)."course_content/".$file['course_file'];
		$data = file_get_contents($path); // Read the file's contents
		$name = $file['course_file'];
		force_download($name, $data); 
		}
		else redirect('dashboard/select_courses');
		}
		
		function course_history()
		{
			$data['history']=$this->course_model->course_history();
			$data['pages']='front/course_history_view';
			$this->load->view('dashboard_view',$data);
		}
		function view_questionaire()
		{
			$data['q'] = $this->course_model->view_questionaire();
			$data['title'] = $this->course_model->get_q_title();
			$data['pages']='pages/course/view_questionaire';
			$this->load->view('dashboard_view',$data);
		}
		function submit()
		{
			$ch = $this->course_model->submit();
			if($ch == TRUE)
			{
				redirect('quiz/attempt/'.$this->uri->segment(3));
			}
			else
			{
				redirect('next/success/'.$this->uri->segment(3));
				//$data['pages'] = 'pages/quiz/success';
				//$this->load->view('dashboard_view',$data);
			}
		}
	}
?>