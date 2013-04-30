<?php
class Quiz extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/quiz_model');
	}
	function index()
	{
		if($this->session->userdata('admin'))
		{
			$data['page'] = 'admin/pages/quiz/list_quiz';
			$data['quiz'] = $this->quiz_model->list_quiz();
			$this->load->view('admin/admin_dash',$data);			
		}
		else
		if($this->session->userdata('user'))
		{
			$data['pages'] = 'pages/quiz/attempt_quiz';
			$data['quiz'] = $this->quiz_model->list_quiz_to_attempt();
			$data['minute'] = $this->quiz_model->get_minutes();
			$data['course'] = $this->quiz_model->getCourseName();
			$this->load->view('dashboard_view',$data);
		}
		else
		redirect('login');
	}
	function add_quiz()
	{
		$data['page'] = 'admin/pages/quiz/add_quiz';
		//$data['exclude'] = $this->quiz_model->exclude();
		$data['sub'] = $this->quiz_model->getCourse();
		$this->load->view('admin/admin_dash',$data);
	}
	function add()
	{
		$this->quiz_model->add();
		redirect('quiz');
	}
	function add_question()
	{
		if($this->input->post())
		{
			$this->quiz_model->add_question();
			$data['success'] = "Question posted successfully";
		}
		$id = $this->uri->segment(3);
		$data['page'] = 'admin/pages/quiz/add_question';
		$data['detail'] = $this->quiz_model->getQuizTitle();
		$this->load->view('admin/admin_dash',$data);	
	}
	function remove()
	{
		$this->quiz_model->remove();
		redirect('quiz');
	}
	function edit_quiz()
	{
		$data['rec'] = $this->quiz_model->get_quiz_info();
		$data['page'] = 'admin/pages/quiz/edit_quiz';
		$data['sub'] = $this->quiz_model->getCourse();
		$this->load->view('admin/admin_dash',$data);	
	}
	function edit()
	{
		$this->quiz_model->edit();
		redirect('quiz/edit_quiz/'.$this->uri->segment(3).'/success');
	}
	function submit()
	{
		$this->load->model('next_model');
		$this->quiz_model->submit();
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
		/*$this->quiz_model->submit();
		$data['pages'] = 'pages/quiz/success';
		$this->load->view('dashboard_view',$data);*/
	}
    function student_report()
    {
        $data['student'] = $this->quiz_model->get_student();
        $data['page'] = 'admin/pages/quiz/student_report';
        $this->load->view('admin/admin_dash',$data);
    }
    function get_report()
    {
        $data['report'] = $this->quiz_model->get_report();
        $data['student'] = $this->quiz_model->get_student();
        $data['page'] = 'admin/pages/quiz/student_report';
        $this->load->view('admin/admin_dash',$data);
    }
    function view_result()
    {
        $data['result'] = $this->quiz_model->view_result();
        $data['course_name'] = $this->quiz_model->course_name();
        $data['user_name'] = $this->quiz_model->user_name();
        $data['page'] = 'admin/pages/quiz/view_result';
        $this->load->view('admin/admin_dash',$data);
    }
    function publish_marks()
    {
        $this->quiz_model->publish_marks();
        redirect('quiz/student_report');
    }
    function edit_question()
    {
        $data['q'] = $this->quiz_model->get_question();
        $data['title'] = $this->quiz_model->get_quiz_title();
        $data['page'] = 'admin/pages/quiz/edit_question';
        $this->load->view('admin/admin_dash',$data);
    }
    function remove_q()
    {
        $id = $this->quiz_model->remove_q();
        redirect('quiz/edit_question/'.$id);
    }
    function edit_q()
    {
        $data['q'] = $this->quiz_model->get_q();
        $data['page'] = 'admin/pages/quiz/edit_q';
        $this->load->view('admin/admin_dash',$data);
    }
	function edit_submit()
	{
		$id = $this->quiz_model->edit_submit();
		redirect('quiz/edit_question/'.$id);
	}
	
}
?>