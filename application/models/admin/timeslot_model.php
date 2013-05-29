<?php

class Timeslot_model extends CI_Model {

    function listAllAppointmentTimeslots() {

        $username = $this->session->userdata('admin');
        $result = $this->db->get_where('tbl_admin', array('admin_username' => $username))->row();
        return $this->db->get_where('tbl_timeslot_appointments', array('branch_id' => $result->branch_id))->result();
    }

    function addAppointmentTimeslot() {

        $starttime = $this->input->post('start_time');
        $endtime = $this->input->post('end_time');

        $username = $this->session->userdata('admin');
        $result = $this->db->get_where('tbl_admin', array('admin_username' => $username))->row();
        $branch_id = $result->branch_id;
        $data = array('start_time' => $starttime,
            'end_time' => $endtime,
            'branch_id' => $branch_id,
        );
        return $this->db->insert('tbl_timeslot_appointments', $data);
    }
    
    function removeAppointmentTimeslot(){
         $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_timeslot_appointments WHERE id = '$id'");
        return $q;
    }

}

?>