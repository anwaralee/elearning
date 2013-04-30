
<?php 
	class Document_manager extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('admin'))
			redirect('login');
			$this->load->model('admin/document_model');
		}
		
		public function index()
		{	
			if($this->session->userdata('admin'))	
			/*redirect('login'); 	
			else */redirect('document_manager/list_document');
		}
		
		function add()
		{
			$data['page'] = 'admin/pages/document/add_document';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function add_document()
		{
			$this->document_model->add_document();
			redirect('document_manager/list_document');
		}
		
		function list_document()
		{
			$data['document']=$this->document_model->list_document();	
			$data['page']='admin/pages/document/list_document';
			$this->load->view('admin/admin_dash',$data);
		}
		
		
		
		function edit_document()
		{
			$data['document']=$this->document_model->edit();
			$data['page'] = 'admin/pages/document/edit_document';
			$this->load->view('admin/admin_dash',$data);
			
		}
		
		function update_document()
		{
			$this->document_model->edit_document();
			redirect('document_manager/list_document');
		}
		
		function view_document()
		{
			$data['f']=$this->document_model->view_document();
			$data['page'] = 'admin/pages/document/view_document';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function delete_document()
		{
			$this->document_model->delete_document();
			redirect('document_manager/list_document');
		}
		
		function view_video()
		{
			$data['vdo']=$this->documentation_model->view_course();
			$data['dashboard']='trainer/pages/documentation/view_video';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
		
		function view_course_content()
		{	
			$data['course_content']=$this->documentation_model->view_youtube();
			$data['dashboard']='trainer/pages/documentation/view_youtube';
			$this->load->view('trainer/trainer_dashboard',$data);
		}
		
		function download()
		{	
		$this->load->helper('download');
		$course_id=$this->uri->segment(3);
		$course_type_title=$this->uri->segment(4);
		$fil=$this->documentation_model->download($course_id,$course_type_title);
		if($fil != NULL)
		{
		$file=mysql_fetch_assoc($fil);
		$path=str_replace('system/','',BASEPATH)."course_content/".$file['course_file'];
		$data = file_get_contents($path); // Read the file's contents
		$name = $file['course_file'];
		force_download($name, $data); 
		}
		else redirect('documentation');
		}
		
	}
?>