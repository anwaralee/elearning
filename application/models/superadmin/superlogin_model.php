<?php

class SuperLogin_model extends CI_model {

    function verifyLoginModel() {

        $un = $this->input->post('un');
        $pw = $this->input->post('pw');
        echo $un;
        echo $pw;
    }

}

?>