<?php

class Batch_model extends CI_Model {

    function listAllBatches() {

        return $this->db->get('tbl_batch')->result();
    }

    function addbatch() { {
            $name = $this->input->post('batch_name');
            $desc = $this->input->post('batch_desc');
            if (isset($_POST['active'])) {
                $active = 1;
            }
            else
                $active = 0;
            $q = "INSERT INTO tbl_batch VALUES('','$name','$desc','$active')";
            return $this->db->query($q);
        }
    }

    function editbatch() {
        $id = $this->uri->segment(3);
        $name = $this->input->post('batch_name');
        $desc = $this->input->post('batch_desc');
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        $q = "UPDATE tbl_batch SET batch_name = '$name', batch_description = '$desc',status = '$active' WHERE batch_id = '$id'";
        return $this->db->query($q);
    }

    function getAllBatchesByID() {
        $id = $this->uri->segment(3);

        return $this->db->get_where('tbl_batch', array('batch_id' => $id))->row();
    }

    function remove() {
        $id = $this->uri->segment(3);
        $q = mysql_query("DELETE FROM tbl_batch WHERE batch_id = '$id'");
        return $q;
    }

    
}
?>