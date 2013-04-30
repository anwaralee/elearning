<?php
	class Page_manager extends CI_controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('admin'))
			{
			$this->load->model('admin/page_manager_model');
			}
			else
			{
				redirect('login');
			}
			
		}
	function index()
	{
		$data['page_list']=$this->page_manager_model->page_list();
		$data['page'] = 'admin/pages/page_manager/page_list_view';
		$this->load->view('admin/admin_dash',$data);
	}
	
	function edit_page()
	{
		$data['edit']=$this->page_manager_model->edit_page();
		$data['page'] = 'admin/pages/page_manager/edit_page_view';
		 $this->load->helper('ckeditor');
		
		       //Ckeditor's configuration
				 $data['txtDes'] = array(
		
			    //ID of the textarea that will be replaced
			      'id' 	=> 	'pagecontent',
				  'path'	=>	'js/ckeditor',
		
				//Optionnal values
					'config' => array(
					'toolbar' 	=> 	array(		//Setting a custom toolbar
					 array('Source' ),
                     array('TextColor','BGColor' ),
                     array( 'Bold', 'Italic', 'Underline', 'Strike' ),
                 	 array('NumberedList','BulletedList' ),
                     array('Print','SpellChecker','Scayt'),
			         array( 'Link', 'Unlink', 'Anchor' ),
					  '/'
				  ),
				    'width' 	=> 	"550px",	//Setting a custom width
				    'height' 	=> 	'100px',	//Setting a custom height	
			     ),
		
			      //Replacing styles from the "Styles tool"
					'styles' => array(
				    //Creating a new style named "style 1"
				      'style 1' => array (
				      						'name' 		=> 	'Blue Title',
					 						'element' 	=> 	'h2',
					  						'styles' => array(
											'color' 			=> 	'Blue',
						 					'font-weight' 		=> 	'bold'
										 )
				     ),
				
				   //Creating a new style named "style 2"
				     'style 2' => array (
					                      'name' 		=> 	'Red Title',
					 					  'element' 	=> 	'h2',
					 					  'styles' => array(
				 						  'color' 			=> 	'Red',
										  'font-weight' 		=> 	'bold',
						 				  'text-decoration'	=> 	'underline'
					                     )
				)				
			)
		);
		$this->load->view('admin/admin_dash',$data);
	}
	
	function update_page()
	{
		$update=$this->page_manager_model->update_page();
		$data['page_list']=$this->page_manager_model->page_list();
		$data['page'] = 'admin/pages/page_manager/page_list_view';
		$this->load->view('admin/admin_dash',$data);
	}
	}
?>