<?php
class Course extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}
        $this->load->model('admin/course_model');
	}
	function list_course()
	{
		if(isset($_POST['cat']) || $this->session->userdata('course_list'))
		{
			if(isset($_POST['cat']))
			{
				$this->session->set_userdata('course_list',$_POST['cat']);
				$data['course']= $this->course_model->getCourseByCat();
			}
			else if($this->session->userdata('course_list'))
			{
				$data['course']= $this->course_model->getCourseByCat();	
			}
		}
		else
        {
            //echo 'hello';exit();
           $data['course'] = NULL; 
        }
		
		$data['cat'] = $this->course_model->getCategory();
		//$data['course'] = $this->course_model->list_course();
		$data['page'] = 'admin/pages/course/list_course';
		//$data['order'] = $this->course_model->get_course_order();
		$this->load->view('admin/admin_dash',$data);
	}
	function update_order()
	{
		$this->course_model->update_order();
		redirect('course/list_course','refresh');
	}
	function remove()
	{
		$this->course_model->delete_file();
		$res = $this->course_model->remove();
		redirect('course/list_course');
	}
	
	function add_course()
	{
		$data['cat'] = $this->course_model->get_cat();
		$data['type'] = $this->course_model->get_type();
		$data['page'] = 'admin/pages/course/add_course';
		$this->load->view('admin/admin_dash',$data);
	}
	
	function add()
	{
		if($_POST['type'] != 'Questionaire')
		{
		$this->course_model->add();
		redirect('course/list_course');
		}
		else
		{
			$id = $this->course_model->add();
			redirect('course/add_questionare/'.$id);
		}
	}
	function edit_course()
	{
		$data['records'] = $this->course_model->get_course_recs();
		$data['cat'] = $this->course_model->get_cat();
		$data['type'] = $this->course_model->get_type();
		$data['page'] = 'admin/pages/course/edit_course';
		$this->load->view('admin/admin_dash',$data);
	}
	function edit()
	{
		$this->course_model->edit();
		redirect('course/list_course');
	}
	
	function view_course()
		{
			if(!$this->session->userdata('admin'))
			{
					redirect('login');
			}	
			$data['f']=$this->course_model->view_course();
			$data['page'] = 'admin/pages/course/view_docs';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function view_video()
		{
			if(!$this->session->userdata('admin'))
			{
					redirect('login');
			}
			$data['vdo']=$this->course_model->view_course();
			$data['page'] = 'admin/pages/course/view_video';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function view_course_content()
		{
			if(!$this->session->userdata('admin'))
			{
					redirect('login');
			}	
			$data['course_content']=$this->course_model->view_course_content();
			$data['page'] = 'admin/pages/course/view_youtube';
			$this->load->view('admin/admin_dash',$data);
		}
		function add_questionare()
		{
			if($this->input->post())
			{
				$this->course_model->add_questionare();
				$data['success'] = "Question posted successfully";
			}
			$data['lesson'] = $this->course_model->lesson_title();
			$data['page'] = 'admin/pages/course/add_questionare';
			$this->load->view('admin/admin_dash',$data);
		}
		
	function edit_questionaire()
	{
		$data['q'] = $this->course_model->edit_questionaire();
		$data['page'] = "admin/pages/course/edit_questionaire";
		$this->load->view('admin/admin_dash',$data);		
	}
    function remove_q()
    {
        $id = $this->course_model->remove_q();
		$path = 'course/edit_questionaire/'.$id;
        redirect($path);
    }
    function edit_q()
    {
        $data['q'] = $this->course_model->get_q();
        $data['page'] = 'admin/pages/course/edit_questionaire_view';
        $this->load->view('admin/admin_dash',$data);
    }
	function edit_submit()
	{
		$id = $this->course_model->edit_submit();
		redirect('course/edit_questionaire/'.$id);//
	}
	
}
?>