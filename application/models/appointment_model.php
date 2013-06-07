<?php

class Appointment_model extends CI_Model {

    function getAllBranches() {
        return $this->db->get('tbl_branch')->result();
    }

    function getAllTimeslots() {
        return $this->db->get('tbl_timeslot_appointments')->result();
    }

    function registerAppointment() {

        $fname = $this->input->post('firstname');
        $lname = $this->input->post('lastname');
        $phoneno = $this->input->post('phoneno');
        $email = $this->input->post('email');
        $branch_id = $this->input->post('branch_id');
        $appointment_date = $this->input->post('appointment_date');
        $timeslot_id = $this->input->post('timeslot_id');
        $specific_requirements = $this->input->post('specific_requirements');


        $active = 1;

        $data = array('firstname' => $fname,
            'lastname' => $lname,
            'phoneno' => $phoneno,
            'email' => $email,
            'appointment_date' => $appointment_date,
            'branch_id' => $branch_id,
            'timeslot_id' => $timeslot_id,
            'requirements' => $specific_requirements,
            'training_id'=>0,
            'status' => $active);


        return $this->db->insert('tbl_appointments', $data);
    }

    function listAppointments() {

        $uname = $this->session->userdata('admin');
        $result = $this->db->get_where('tbl_admin', array('admin_username' => $uname))->row();

        $config['base_url'] = base_url() . 'appointment/list_appointments';
        $config['total_rows'] = $this->db->get_where('tbl_appointments', array('branch_id' => $result->branch_id))->num_rows();
        $config['per_page'] = 20;
        $config['num_links'] = 10;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';

        $this->pagination->initialize($config);

        $this->db->order_by('appointment_date', 'asc');
        $this->db->where('branch_id',$result->branch_id);
        $this->db->where('status',1);
        return $this->db->get('tbl_appointments',$config['per_page'], $this->uri->segment(3))->result();
       
    }
    
    function getTimeSlot($id)
    {
        return $this->db->get_where('tbl_timeslot_appointments',array('id'=>$id))->row();
    }
    
     function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("UPDATE tbl_appointments SET status = '0' where appointment_id = '$id'");
        return $q;
    }
    
    function getTimeSlotsByBranchAndDate($branchId,$date){
        $actualDate = strtotime($date);
        $day = date('D', $actualDate);
              
        if($day=="Sun"){
            $dayId = 1;
        }
        else  if($day=="Mon"){
            $dayId = 2;
        }
         else  if($day=="Tue"){
            $dayId = 3;
        }
         else  if($day=="Wed"){
            $dayId = 4;
        }
         else  if($day=="Thu"){
            $dayId = 5;
        }
         else  if($day=="Fri"){
            $dayId = 6;
        }
         else  if($day=="Sat"){
            $dayId = 7;
        }
        
        $this->db->select('timeslot_id');
        $this->db->where('appointment_date',$date);
       $timeslot =  $this->db->get_where('tbl_appointments',array('branch_id'=>$branchId,'status'=>1))->result();
        
      
       foreach($timeslot as $slot){
           $tislot[''] = $slot->timeslot_id;
       }
       
        $this->db->where_not_in('id',$tislot);
        return $this->db->get_where('tbl_timeslot_appointments',array('branch_id'=>$branchId,'day_id'=>$dayId))->result();
        
        
    }
    
    function getBranchNameById($id){
        
        return $this->db->get_where('tbl_branch',array('branch_id'=>$id))->row();
    }
    
     function bookAppointment() {

        $fname = $this->input->post('firstname');
        $lname = $this->input->post('lastname');
        $phoneno = $this->input->post('contact');
        $email = $this->input->post('email');
        $branch_id = $this->input->post('branch_id');
        $appointment_date = $this->input->post('appointment_date');
        $timeslot_id = $this->input->post('timeslot_id');
        $specific_requirements = $this->input->post('specific_requirements');
        $training_id = $this->input->post('training_id');
        $active = 1;

        $data = array('firstname' => $fname,
            'lastname' => $lname,
            'phoneno' => $phoneno,
            'email' => $email,
            'appointment_date' => $appointment_date,
            'branch_id' => $branch_id,
            'timeslot_id' => $timeslot_id,
            'requirements' => $specific_requirements,
            'training_id'=>$training_id,
            'status' => $active);


        $this->db->insert('tbl_appointments', $data);
        
        
        
        $uname = $this->session->userdata('user');
        $result = $this->db->get_where('tbl_users', array('username' => $uname))->row(); 
        
        $user_id = $result->user_id;
        $course_id = $result->course_id;
        
        $data1 = array('user_id'=>$user_id,
                        'training_id'=>$training_id,
                        'branch_id'=>$branch_id,
                        'course_id'=>$course_id,
                        'enrollment_status'=>2,
                        'course_status'=>0,
                        'payment_status'=>0);
        
        $this->db->insert('tbl_training_users',$data1);
        
    }
    
    

}

?>