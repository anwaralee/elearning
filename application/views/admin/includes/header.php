<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
$title=$this->site_conf_model->getConfiguration();
if($title)
{
		$conf=mysql_fetch_assoc($title);
		echo $conf['site_name'];
}
else
{
?>
Admin Panel<?php }?></title>
<link href="<?php echo base_url();?>css/dashboard.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>css/bootstrap.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>js/jsDatePick_ltr.min.css" />
<script language="javascript" src="<?php echo base_url();?>jquery.js"></script>
<script language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jsDatePick.jquery.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%d-%m-%Y"
			/*selectedDate:{				
				day:5,						
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<style>
.error
{
  color:red;	
}
</style>
</head>
<body>
<div class="wrapper">
<div class="header">
<h1> Welcome Administrator,
  <?php if(!$this->session->userdata('user') && !$this->session->userdata('admin')){?>
  <a href="<?php echo base_url();?>register">Register</a> |
  <?php }?>
  <?php if($this->session->userdata('user') || $this->session->userdata('admin')){?>
  <a href="<?php echo base_url();?>logout">Logout</a>
  <?php }else{?>
  <a href="<?php echo base_url();?>home">Login</a>
  <?php }?>
  </h1>
</div>
<!--header-->
