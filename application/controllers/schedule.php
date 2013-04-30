<?php 
	class Schedule extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('admin'))
			redirect('login');
			$this->load->model('admin/schedule_model');
		}
		
		public function index()
		{
			if($this->session->userdata('admin'))	
			redirect('schedule/list_schedule');
			else redirect('login');
		}
		
		public function list_schedule()
		{
			$m = date('m');
			$d = date('d');
			$y = date('Y');
			$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   =>  base_url().'schedule/list_schedule/',
			   'template' => '{table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

   {heading_row_start}<tr class = "heading">{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr>{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr>{/cal_row_start}
   {cal_cell_start}<td>{/cal_cell_start}

   {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   {cal_cell_no_content}{day}{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}'
             );

           $this->load->library('calendar', $prefs);
		   $i = 2012;
			$j = 1;
			$m = date('m');
			while($i <= 2050)
			{
				while($j <= 31)
				{
					$a[] = base_url().'schedule/inspect/'.$i.'/'.($j-1).'/'.$m.'/';
					$j++;
				}
				$i++;
				$j = 1;
			}
		$data['links'] = $a;
			
			$data['schedule'] = $this->schedule_model->list_schedule();
			$data['page'] = 'admin/pages/schedule/list_schedule';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function add()
		{
			$data['page'] = 'admin/pages/schedule/add_schedule';
			$this->load->view('admin/admin_dash',$data);	
		}
		
		function add_schedule()
		{
			$this->schedule_model->add_schedule();	
			redirect ('schedule/list_schedule');
		}
		
		function edit_schedule()
		{
			$data['records']=$this->schedule_model->edit_schedule();	
			$data['page'] = 'admin/pages/schedule/edit_schedule';
			$this->load->view('admin/admin_dash',$data);
		}
		
		function update_schedule()
		{
			$this->schedule_model->update_schedule();
			redirect ('schedule/list_schedule');
		}
		
		function remove_schedule()
		{
			
			$this->schedule_model->remove_schedule();	
			redirect ('schedule/list_schedule');
		}
		function inspect()
		{
			$y = $this->uri->segment(3);
			$d = $this->uri->segment(4);
			$m = $this->uri->segment(5);
			$data['date'] = $d.'-'.$m.'-'.$y;
			$data['sch'] = $this->schedule_model->inspect();
			$data['page'] = 'admin/pages/schedule/inspect_schedule';
			$this->load->view('admin/admin_dash',$data);
		}
	}
?>