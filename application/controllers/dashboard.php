<?php 
	class Dashboard extends CI_controller
	{
		public function __construct ()
		{
			parent::__construct();
			/*if($this->session->userdata('user'))
			{
					redirect('login');
			}*/
			
			$this->load->model('dashboard_model');
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
		
		function welcome()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}
			$data['user_content']=$this->dashboard_model->user_content();
			$data['user']=$this->session->userdata('user');
			 $data['pages']='front/welcome_view';
			 $this->load->view('dashboard_view',$data); 	
		}
		
		function select_courses()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$data['user']=$this->session->userdata('user');
			$data['category']=$this->dashboard_model->getCategory();
			$data['type']=$this->dashboard_model->getType();
			//$count=$this->dashboard_model->getSearchCourse_count();
			/*$per_page=5;
			$this->load->library('pagination');
        
			$config['base_url'] = site_url('dashboard/select_courses');
			$config['total_rows'] = $count;
			$config['per_page'] = $per_page;
			$config['uri_segment'] = '3';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['next_tag_open'] = '<span class="next_page">';
			$config['next_tag_close'] = '</span>';
			
			$config['prev_tag_open'] = '<span class="previous_page">';
			$config['prev_tag_close'] = '</span>';
			
			$config['num_tag_open'] = '<span class="numbers_page">';
			$config['num_tag_close'] = '</span>';
	
			$config['last_link'] = FALSE;
			$config['first_link'] = FALSE;
			$this->pagination->initialize($config);*/
			if(isset($_POST['submit']) || $this->session->userdata('search_course'))
			{
			     if(isset($_POST['submit']))
                 {
				$cat_id=$this->input->post('category');
                $this->session->set_userdata('search_course',$cat_id);
                }
                else
                $cat_id = $this->session->userdata('search_course');                
				
				$data['course']=$this->dashboard_model->getSearchCourse(/*$per_page,$this->uri->segment($config['uri_segment'])*/);
				$data['cats'] = $this->dashboard_model->get_cat_title();
			}
			//$data['count']=$count;
			$data['pages']='front/select_courses_view';
			$this->load->view('dashboard_view',$data); 	
		}
		
		/*function search_course()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$data['user']=$this->session->userdata('user');
			$data['category']=$this->dashboard_model->getCategory();
			$data['type']=$this->dashboard_model->getType();
			
			$count=$this->dashboard_model->getSearchCourse_count();
			$per_page=2;
			$this->load->library('pagination');
        
			$config['base_url'] = site_url('dashboard/search_course');
			$config['total_rows'] = $count;
			$config['per_page'] = $per_page;
			$config['uri_segment'] = '3';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			$config['next_tag_open'] = '<span class="next_page">';
			$config['next_tag_close'] = '</span>';
			
			$config['prev_tag_open'] = '<span class="previous_page">';
			$config['prev_tag_close'] = '</span>';
			
			$config['num_tag_open'] = '<span class="numbers_page">';
			$config['num_tag_close'] = '</span>';
	
			$config['last_link'] = FALSE;
			$config['first_link'] = FALSE;
			$this->pagination->initialize($config);
			$data['course']=$this->dashboard_model->getSearchCourse($per_page,$this->uri->segment($config['uri_segment']));
			$data['count']=$count;
			$data['pages']='front/search_result';
			$this->load->view('dashboard_view',$data); 	
		}*/
		
		function account_settings()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$user=$this->session->userdata('user');
			$data['user']=$user;
			$data['userDetail']=$this->dashboard_model->account_settings($user);
			$data['pages']='front/account_settings_view';
			$this->load->view('dashboard_view',$data);
		}
		
		function update_settings()
		{
			if(!$this->session->userdata('user'))
			{
					redirect('login');
			}	
			$data['updateData']=$this->dashboard_model->update_settings();
			$data['user']=$this->session->userdata('user');
			$data['pages']='front/update_settings_view';
			$this->load->view('dashboard_view',$data);
		}
	}
?>