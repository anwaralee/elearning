<?php

class Schedule_model extends CI_model {

    function list_schedule() {
        $q = mysql_query("select * from tbl_training");
        if (mysql_num_rows($q) > 0) {
            return $q;
        }
        else
            return NULL;
    }

    function add_schedule() {
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;

       $title = '';
       $desc = '';
        $courseId = $this->input->post('course_id');
        $lessonId = $this->input->post('lesson_id');
        $sessionId = $this->input->post('session_id');
        $trainerId = $this->input->post('trainer_id');
        $timeSlotId = $this->input->post('timeslot_id');
        $date = $this->input->post('date');

        $data = array('training_title' => $title,
            'training_desc' => $desc,
            'training_date' => $date,
            'timeslot_id' => $timeSlotId,
            'course_id' => $courseId,
            'session_id'=>$sessionId,
            'lesson_id' => $lessonId,
            'trainer_id' => $trainerId,
            'status' => $active);

        $this->db->insert('tbl_training', $data);
        $this->db->insert('tbl_timeslot_status',array('date'=>$date,'timeslot_id'=>$timeSlotId));
    }

    function update_schedule() {
        
        $id = $this->uri->segment(4);

        $trainingRes = $this->db->get_where('tbl_training',array('training_id'=>$id))->row();
        $remTimeSlotId = $trainingRes->timeslot_id;

        $this->db->delete('tbl_timeslot_status',array('timeslot_id'=>$remTimeSlotId));

        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;

        $title = '';
        $desc = '';
        $courseId = $this->input->post('course_id');
        $lessonId = $this->input->post('lesson_id');
        $trainerId = $this->input->post('trainer_id');
        $timeSlotId = $this->input->post('timeslot_id');
        $date = $this->input->post('date');

        $data = array('training_title' => $title,
            'training_desc' => $desc,
            'training_date' => $date,
            'timeslot_id' => $timeSlotId,
            'course_id' => $courseId,
            'lesson_id' => $lessonId,
            'trainer_id' => $trainerId,
            'status' => $active);

      
        $this->db->where('training_id', $id);
        $this->db->update('tbl_training', $data);
        $this->db->insert('tbl_timeslot_status',array('date'=>$date,'timeslot_id'=>$timeSlotId));

    }

    function remove_schedule() {
        $id = $this->uri->segment(3);
        $q = "delete from tbl_training where training_id='$id'";
        mysql_query($q);
    }

    function getTrainer() {
        $q = "select * from tbl_trainer where status=1";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            return $res;
        }
        else
            return NULL;
    }

    function inspect() {
        $date = $this->uri->segment(3);
        $this->db->order_by('timeslot_id');

        return $this->db->get_where('tbl_training', array('training_date' => $date))->result();
    }

    function inspectByDate($date) {
        $this->db->order_by('timeslot_id');
        return $this->db->get_where('tbl_training', array('training_date' => $date))->result();
    }

    function getEventsCount($y, $d, $m) {

        if (($d == 1) || ($d == 2) || ($d == 3) || ($d == 4) || ($d == 5) || ($d == 6) || ($d == 7) || ($d == 8) || ($d == 9)) {
            $d = '0' . $d;
        }

        $date = $y . "-" . "$m" . "-" . $d;


        $this->db->where('training_date', $date);
        $this->db->from('tbl_training');
        return $this->db->count_all_results();
    }

    function getAllCourses() {
        return $this->db->get('tbl_course')->result();
    }

    function getTrainerByCourse($courseId) {

        return $this->db->get_where('tbl_course_trainer', array('course_id' => $courseId))->row();
    }

    function getTrainerNameById($trainerId) {

        return $this->db->get_where('tbl_trainer', array('trainer_id' => $trainerId))->row();
    }

    function getLessonsByCourse($courseId) {
        return $this->db->get_where('tbl_lesson', array('course_id' => $courseId))->result();
    }
    
     function getSessionsByCourse($courseId) {
        return $this->db->get_where('tbl_course_session', array('course_id' => $courseId))->result();
    }

    function addWorkingDays() {
        if (!isset($_POST['day_1'])) {
            $active_1 = 0;
        } else {
            $active_1 = 1;
        }

        if (!isset($_POST['day_2'])) {
            $active_2 = 0;
        } else {
            $active_2 = 1;
        }


        if (!isset($_POST['day_3'])) {
            $active_3 = 0;
        } else {
            $active_3 = 1;
        }


        if (!isset($_POST['day_4'])) {
            $active_4 = 0;
        } else {
            $active_4 = 1;
        }


        if (!isset($_POST['day_5'])) {
            $active_5 = 0;
        } else {
            $active_5 = 1;
        }


        if (!isset($_POST['day_6'])) {
            $active_6 = 0;
        } else {
            $active_6 = 1;
        }


        if (!isset($_POST['day_7'])) {
            $active_7 = 0;
        } else {
            $active_7 = 1;
        }




        $data = array('day_sun' => $active_1,
            'day_mon' => $active_2,
            'day_tue' => $active_3,
            'day_wed' => $active_4,
            'day_thu' => $active_5,
            'day_fri' => $active_6,
            'day_sat' => $active_7);

        //$this->db->select_max('day_id');
        $status = $this->db->get('tbl_working_days')->row();



        if (!empty($status)) {

            $this->db->select_max('day_id');
            $query = $this->db->get('tbl_working_days')->row();

            $dayId = $query->day_id;
            $this->db->where('day_id', $dayId);
            $this->db->update('tbl_working_days', $data);
        } else {

            $this->db->insert('tbl_working_days', $data);
        }
    }

    function getSelectedDays() {

        $this->db->select_max('day_id');
        $query = $this->db->get('tbl_working_days')->row();

        $dayId = $query->day_id;

        return $this->db->get_where('tbl_working_days', array('day_id' => $dayId))->row();
    }

    function getTimeSlots() {

        $this->db->order_by('day_id', 'asc');
        return $this->db->get('tbl_timeslot_trainings')->result();
    }

    function insertTimeSlot() {

        $day = $this->input->post('day_id');
        $time = $this->input->post('time');

        $data = array('day_id' => $day, 'time' => $time);

        $this->db->insert('tbl_timeslot_trainings', $data);
    }

    function getTimeSlotById() {
        $id = $this->uri->segment(3);
        return $this->db->get_where('tbl_timeslot_trainings', array('timeslot_id' => $id))->row();
    }

    function updateTimeSlot() {

        $id = $this->uri->segment(3);


        $day = $this->input->post('day_id');
        $time = $this->input->post('time');

        $data = array('day_id' => $day, 'time' => $time);
        $this->db->where('timeslot_id', $id);
        return $this->db->update('tbl_timeslot_trainings', $data);
    }

    function removeTimeSlot() {
        $id = $this->uri->segment(3);
        return $this->db->delete('tbl_timeslot_trainings', array('timeslot_id' => $id));
    }

    function inspectWorkingDay($day) {

        if ($day == 'Sun') {
            return $this->db->get_where('tbl_working_days', array('day_sun' => 1))->row();
        } else if ($day == 'Mon') {
            return $this->db->get_where('tbl_working_days', array('day_mon' => 1))->row();
        } else if ($day == 'Tue') {
            return $this->db->get_where('tbl_working_days', array('day_tue' => 1))->row();
        } else if ($day == 'Wed') {
            return $this->db->get_where('tbl_working_days', array('day_wed' => 1))->row();
        } else if ($day == 'Thu') {
            return $this->db->get_where('tbl_working_days', array('day_thu' => 1))->row();
        } else if ($day == 'Fri') {
            return $this->db->get_where('tbl_working_days', array('day_fri' => 1))->row();
        } else if ($day == 'Sat') {
            return $this->db->get_where('tbl_working_days', array('day_sat' => 1))->row();
        }
    }

    function getAvalaibleTimeSlots() {
        $day = $this->uri->segment('4');
        $date = $this->uri->segment('3');

        $dateCheck = $this->db->get_where('tbl_timeslot_status',array('date'=>$date))->result();
        
           
     
       
       if ($day == "Sun") {
             
            if(!empty($dateCheck)){
              
                 $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',1);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 1))->result();
                }


        } else if ($day == "Mon") {
           
           if(!empty($dateCheck)){
              
                $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',2);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 2))->result();
                }
        } else if ($day == "Tue") {
            
            if(!empty($dateCheck)){
              
                 $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',3);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 3))->result();
                }
        } else if ($day == "Wed") {
            
            if(!empty($dateCheck)){
              
                 $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',4);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 4))->result();
                }

        } else if ($day == "Thu") {
           
           if(!empty($dateCheck)){
              
                $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',5);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 5))->result();
                }

        } else if ($day == "Fri") {
            
            if(!empty($dateCheck)){
              
                
                    $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                  $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',6);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 6))->result();
                }

        } else if ($day == "Sat") {
            if(!empty($dateCheck)){
              
                $this->db->select('tbl_timeslot_trainings.timeslot_id,tbl_timeslot_trainings.time');
                $this->db->from('tbl_timeslot_trainings');
                $this->db->join('tbl_timeslot_status', 'tbl_timeslot_status.timeslot_id != tbl_timeslot_trainings.timeslot_id');
                $this->db->where('tbl_timeslot_status.date',$date);
                $this->db->where('tbl_timeslot_trainings.day_id',7);
                
                return $this->db->get()->result();

            }
                else 
                {
                    return $this->db->get_where('tbl_timeslot_trainings', array('day_id' => 7))->result();
                }

        }
    }

    function getTrainingTimeById($id) {

        return $this->db->get_where('tbl_timeslot_trainings', array('timeslot_id' => $id))->row();
    }

    function getCourseNameById($id) {
        return $this->db->get_where('tbl_course', array('course_id' => $id))->row();
    }
    
    function getSessionNameById($id) {
        return $this->db->get_where('tbl_course_session', array('session_id' => $id))->row();
    }

    function getLessonNameById($id) {
        return $this->db->get_where('tbl_lesson', array('lesson_id' => $id))->row();
    }

    function getAllTrainingDetails() {
        $id = $this->uri->segment('5');


        $result = $this->db->get_where('tbl_training', array('training_id' => $id))->row();
        $timeSlotId = $result->timeslot_id;
       //$this->db->where('timeslot_id', $timeSlotId);
        //$this->db->update('tbl_timeslot_trainings', array('status' => 0));
        return $result;
    }

    function getTrainerNameByCourse($courseId) {

        $result = $this->db->get_where('tbl_course_trainer', array('course_id' => $courseId))->row();
        
        return $this->db->get_where('tbl_trainer',array('trainer_id'=>$result->trainer_id))->row();
    }


}

?>