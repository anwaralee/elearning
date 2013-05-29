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


        $active = 0;

        $data = array('firstname' => $fname,
            'lastname' => $lname,
            'phoneno' => $phoneno,
            'email' => $email,
            'appointment_date' => $appointment_date,
            'branch_id' => $branch_id,
            'timeslot_id' => $timeslot_id,
            'requirements' => $specific_requirements,
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

        $this->db->order_by('appointment_id', 'desc');
        $this->db->where('branch_id',$result->branch_id);
        return $this->db->get('tbl_appointments',$config['per_page'], $this->uri->segment(3))->result();
       
    }
    
    function getTimeSlot($id)
    {
        return $this->db->get_where('tbl_timeslot_appointments',array('id'=>$id))->row();
    }
    
     function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_appointments WHERE appointment_id = '$id'");
        return $q;
    }
}

?>