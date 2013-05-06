<?php

class Branch_model extends CI_Model {

    function listAllBranches() {

        return $this->db->get('tbl_branch')->result();
    }

    function addBranch() { {
            $name = $this->input->post('branch_name');
            $desc = $this->input->post('branch_desc');
            $trainer_det = $this->input->post('trainer_details');
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;
            $q = "INSERT INTO tbl_branch VALUES('','$name','$desc','$trainer_det','$active')";
            return $this->db->query($q);
        }
    }

    function editBranch() {
        $id = $this->uri->segment(3);
        $name = $this->input->post('branch_name');
        $desc = $this->input->post('branch_desc');
        $trainer_det = $this->input->post('trainer_details');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        $q = "UPDATE tbl_branch SET branch_name = '$name', branch_desc = '$desc',trainer_details = '$trainer_det', status = '$active' WHERE branch_id = '$id'";
        return $this->db->query($q);
    }

    function getAllBranchesByID() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_branch', array('branch_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_branch WHERE branch_id = '$id'");
        return $q;
    }

     function editTrainerDetails() {
        $id = $this->uri->segment(3);
        $trainer_det = $this->input->post('trainer_details');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        $q = "UPDATE tbl_branch SET trainer_details = '$trainer_det' WHERE branch_id = '$id'";
        return $this->db->query($q);
    }
}
?>