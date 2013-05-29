<?php

class Schedule extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin'))
            redirect('login');
        $this->load->model('admin/schedule_model');
    }

    public function index() {
        if ($this->session->userdata('admin'))
            redirect('schedule/list_schedule');
        else
            redirect('login');
    }

    public function list_schedule() {
        $m = date('m');
        $d = date('d');
        $y = date('Y');
        $prefs = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url() . 'schedule/list_schedule/',
            'template' => '{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

   {heading_row_start}<tr class = "heading">{/heading_row_start}

   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   {heading_next_cell}<th id="nextMonth"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   {heading_row_end}</tr>{/heading_row_end}

   {week_row_start}<tr class="week">{/week_row_start}
   {week_day_cell}<td>{week_day}</td>{/week_day_cell}
   {week_row_end}</tr>{/week_row_end}

   {cal_row_start}<tr class="days">{/cal_row_start}
   {cal_cell_start}<td class="day">{/cal_cell_start}

   {cal_cell_content}
   <div class="day_num"><a href="{content}">{day}</a></div>
   <div class="content"></div>
   {/cal_cell_content}
   {cal_cell_content_today}
      <div class="day_num highlight"><a href="{content}">{day}</a></div>
      <div class="content"></div>
   {/cal_cell_content_today}

   {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
   {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

   {cal_cell_blank}&nbsp;{/cal_cell_blank}

   {cal_cell_end}</td>{/cal_cell_end}
   {cal_row_end}</tr>{/cal_row_end}

   {table_close}</table>{/table_close}'
        );

        $this->load->library('calendar', $prefs);
        $j = 1;

        $currentYear = date('Y');
        $nextYear = $this->uri->segment('3');

        if($nextYear==""){
            $i = $currentYear;
        }
        else {
            $i = $nextYear;
        }

        $currentMonth = date('m');
        $nextMonth = $this->uri->segment('4');
      
        if($nextMonth==""){
            $m = $currentMonth;
        }
        else {
             $m = $nextMonth;
        }
        while ($i <= 2050) {
            while ($j <= 32) {
                // $events = $this->schedule_model->getEventsCount($i,$j-1,$m);
                if (($j-1 == 1) || ($j-1 == 2) || ($j-1 == 3) || ($j-1 == 4) || ($j-1 == 5) || ($j-1 == 6) || ($j-1 == 7) || ($j-1 == 8) || ($j-1 == 9)) {
                    $date = $i . '-' . $m . '-0' . ($j-1);
                } else {
                    $date = $i . '-' . $m . '-' . ($j-1);
                }

                $a[] = base_url() . 'schedule/inspect/' . $date;
                $j++;
            }
            $i++;
            $j = 1;
        }
        $data['links'] = $a;

        //just for test TODO
        //$data['links'] =  array (24 => '2 Events');



        $data['schedule'] = $this->schedule_model->list_schedule();
        $data['page'] = 'admin/pages/schedule/list_schedule';
        $this->load->view('admin/admin_dash', $data);
    }

    function add() {
        $data['allCourses'] = $this->schedule_model->getAllCourses();
        $data['timeSlots'] = $this->schedule_model->getAvalaibleTimeSlots();
        $data['page'] = 'admin/pages/schedule/add_schedule';
        $this->load->view('admin/admin_dash', $data);
    }

    function add_schedule() {

        $this->schedule_model->add_schedule();
        redirect('schedule/list_schedule');
    }

    function edit_schedule() {
        $data['allCourses'] = $this->schedule_model->getAllCourses();
        $data['allTrainings'] = $this->schedule_model->getAllTrainingDetails();
        $data['timeSlots'] = $this->schedule_model->getAvalaibleTimeSlots();

        
        $data['page'] = 'admin/pages/schedule/edit_schedule';
        $this->load->view('admin/admin_dash', $data);
    }

    function update_schedule() {
        $this->schedule_model->update_schedule();
        redirect('schedule/list_schedule');
    }

    function remove_schedule() {

        $this->schedule_model->remove_schedule();
        redirect('schedule/list_schedule');
    }

    function inspect() {
        $date = $this->uri->segment(3);
        $data['date'] = $date;
        $actualDate = strtotime($date);
        $day = date('D', $actualDate);
        $data['day'] = $day;
        $result = $this->schedule_model->inspectWorkingDay($day);
        if (empty($result)) {
            $this->session->set_flashdata('daycheck', 'Not a working day. Configure Working days first');
            redirect('schedule');
        } else {
            $data['schedulesByDate'] = $this->schedule_model->inspect();
            $data['page'] = 'admin/pages/schedule/list_schedule_by_date';
            $this->load->view('admin/admin_dash', $data);
        }
    }

    function getTrainerByCourse($courseId) {

        $data['trainerByCourse'] = $this->schedule_model->getTrainerByCourse($courseId);
        $this->load->view('admin/pages/schedule/list_trainer_by_course', $data);
    }

    function getLessonsByCourse($courseId) {
        $data['lessonsByCourse'] = $this->schedule_model->getLessonsByCourse($courseId);
        $this->load->view('admin/pages/schedule/list_lessons_by_course', $data);
    }
    
    function getEditLessonsByCourse($courseId) {
        $data['lessonsByCourse'] = $this->schedule_model->getLessonsByCourse($courseId);
       $data['lessonId'] = $this->uri->segment('4');
        $this->load->view('admin/pages/schedule/edit_list_lessons_by_course', $data);
    }

    function configure_working_days() {

        $data['selectedDays'] = $this->schedule_model->getSelectedDays();
        $data['page'] = 'admin/pages/schedule/configure_working_days';
        $this->load->view('admin/admin_dash', $data);
    }

    function add_working_days() {

        $this->schedule_model->addWorkingDays();
        redirect('schedule/list_schedule');
    }

    function list_timeslots() {

        $data['allTimeSlots'] = $this->schedule_model->getTimeSlots();
        $data['page'] = 'admin/pages/schedule/list_timeslots';
        $this->load->view('admin/admin_dash', $data);
    }

    function add_timeslot() {
        $data['selectedDays'] = $this->schedule_model->getSelectedDays();
        $data['page'] = 'admin/pages/schedule/add_timeslot';
        $this->load->view('admin/admin_dash', $data);
    }

    function insertTimeSlot() {

        $this->schedule_model->insertTimeSlot();
        redirect('schedule/list_timeslots');
    }

    function edit_timeslot() {
        $data['selectedDays'] = $this->schedule_model->getSelectedDays();
        $data['timeSlotById'] = $this->schedule_model->getTimeSlotByID();
        $data['page'] = 'admin/pages/schedule/edit_timeslot';
        $this->load->view('admin/admin_dash', $data);
    }

    function updateTimeSlot() {
        $this->schedule_model->updateTimeSlot();
        redirect('schedule/list_timeslots');
    }

    function remove_timeslot() {
        $this->schedule_model->removeTimeSlot();
        redirect('schedule/list_timeslots');
    }

}

?>