<?php

class Assignment_model extends CI_model {
    
   
    function list_document() {
        $q = "select * from tbl_doc where status=1";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            return $res;
        }
        else
            return NULL;
    }

    function view_document() {
        $id = $this->uri->segment(3);
        $q = "select * from tbl_doc where doc_id='$id' and status=1";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            return $res;
        }
        else
            return NULL;
    }

    function view_docs() {
        $id = $this->uri->segment(3);
        $quer = "select * from tbl_doc where doc_id='$id'";
        $result = mysql_query($quer);
        if (mysql_num_rows($result) > 0) {
            return $result;
        }
        else
            return NULL;
    }

    function download($id) {
        $q = "select doc_file from tbl_doc where doc_id='$id' and isDownloadable=1";
        $result = mysql_query($q);
        if (mysql_num_rows($result) > 0) {
            return $result;
        }
        else
            return NULL;
    }

    function getCourse($id) {
        $q = "select course_name from tbl_course where course_id='$id'";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            $c = mysql_fetch_assoc($res);
            return $c['course_name'];
        }
    }

    function getCourseFile($id) {
        $q = "select course_file from tbl_course where course_id='$id'";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            $c = mysql_fetch_assoc($res);
            return $c['course_file'];
        }
    }

    function getAllSchedules() {

        $trainer = $this->session->userdata('trainer');
        $result = $this->db->get_where('tbl_trainer', array('username' => $trainer))->row();
        $trainer_id = $result->trainer_id;

        $this->db->order_by('timeslot_id', 'training_date');
        return $this->db->get_where('tbl_training', array('trainer_id' => $trainer_id, 'status' => 1))->result();
    }

    function getAssignmentBySchedule($trianingId) {
        if ($trianingId != 0) {
            return $this->db->get_where('tbl_doc', array('lesson_id' => $trianingId,'doc_type'=>2))->result();
        } else {
            return $this->db->get_where('tbl_doc',array('doc_type'=>2))->result();
        }
    }

    function getTrainingNameById($id) {
        
        return $this->db->get_where('tbl_training',array('training_id'=>$id))->row();
    }

     function add_assignment() {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        if (isset($_POST['download'])) {
            $dl = 1;
        }
        else
            $dl = 0;
        
        $lesson_id = $this->input->post('lesson_id');
        
        $file_name = time() . "_" . rand("100000", "999999");
        $ext = end(explode('.', $_FILES['file']['name']));
        $complete = $file_name . "." . $ext;
        $path = str_replace('system/', '', BASEPATH) . '/docs/' . $complete;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            $data = array('doc_title' => $title,
                'doc_desc' => $desc,
                'doc_file' => $complete,
                'isDownloadable' => $dl,
                'lesson_id'=>$lesson_id,
                'doc_type'=>2,
                'status' => $active
            );

            $this->db->insert('tbl_doc', $data);
        } else {
           
             $data = array('doc_title' => $title,
                'doc_desc' => $desc,
                'doc_file' => '',
                'isDownloadable' => $dl,
                'lesson_id'=>$lesson_id,
                 'doc_type'=>2,
                'status' => $active
            );
            
            $this->db->insert('tbl_doc', $data);
        }
    }
      function edit() {
        $id = $this->uri->segment(3);
       
        return $this->db->get_where('tbl_doc',array('doc_id'=>$id))->row();
    }

    function edit_assignment() {
        $id = $this->uri->segment(3);
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        if (isset($_POST['active'])) {
            $active = 1;
        }
        else
            $active = 0;
        if (isset($_POST['download'])) {
            $dl = 1;
        }
        else
            $dl = 0;
        

        $lesson_id = $this->input->post('lesson_id');
        $ext = end(explode('.', $_FILES['file']['name']));
        if ($ext == '') {
            $q = "update tbl_doc
                set doc_title='$title',
                doc_desc='$desc',
                lesson_id='$lesson_id',
                isDownloadable='$dl',
                doc_type = '2',
                status='$active' where doc_id = '$id'";
            return $this->db->query($q);
        } else if ($ext != NULL) {

            $file = time() . "_" . rand("100000", "999999") . '.' . $ext;
            $path = str_replace('system/', '', BASEPATH);
            $path .= 'docs/' . $file;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $sql = mysql_query("SELECT doc_file FROM tbl_doc WHERE doc_id = '$id'");
                if (mysql_num_rows($sql) > 0) {
                    $row = mysql_fetch_row($sql);
                    unlink(str_replace('system/', '', BASEPATH) . 'docs/' . $row[0]);
                }
            }
            $q = "update tbl_doc
                set doc_title='$title',
                doc_desc='$desc',
                doc_file='$file',
                lesson_id='$lesson_id',
                isDownloadable='$dl',
            doc_type = '2',
                status='$active' where doc_id = '$id'";
            return $this->db->query($q);
        }
    }

    function view_assignment() {
        $id = $this->uri->segment(3);
        $q = "select * from tbl_doc where doc_id = '$id'";
        $res = mysql_query($q);
        if (mysql_num_rows($res) > 0) {
            return $res;
        }
        else
            return NULL;
    }

    function delete_assignment() {
        $id = $this->uri->segment(3);
        $result = $this->db->get_where('tbl_doc',array('doc_id'=>$id))->row();
        $path = str_replace('system/', '', BASEPATH) . '/docs/' . $result->doc_file;
        
        $q = "delete from tbl_doc where doc_id='$id'";
       
        mysql_query($q);
         unlink($path);
    }
    
     function getLessonNameById($id) {
        
        return $this->db->get_where('tbl_lesson',array('lesson_id'=>$id))->row();
    }

}

?>