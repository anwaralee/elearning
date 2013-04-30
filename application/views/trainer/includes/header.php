<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
//$this->load->model('dashboard_model');
$title=$this->dashboard_model->getConfiguration();
if($title)
{
		$conf=mysql_fetch_assoc($title);
		echo $conf['site_name'];
}
else
{
?>E-Learning<?php }?></title>


<link href="<?php echo base_url();?>css/dashboard.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>css/bootstrap.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script src='<?php echo base_url();?>jquery.js' type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<style type="text/css">
.error
{
	color:red;
}
</style>
</head>
<body>

<div class="wrapper">
<div class="header">
<h1><?php echo "Welcome To E-Learning ".$this->session->userdata('user'); ?></h1>

</div><!--loginHeader-->