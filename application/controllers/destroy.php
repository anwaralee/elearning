<?php
class Destroy extends CI_Controller
{
	function user()
	{
		$this->session->unset_userdata('search_course');
	}
	function admin()
	{
		$this->session->unset_userdata('course_list');
	}
}
?>