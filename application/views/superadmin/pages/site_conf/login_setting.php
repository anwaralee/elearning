<script src='<?php echo base_url();?>jquery.js' type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<style type="text/css">
.error
{
  color:red;	
}
#change
{
	display : none;
	width: 100%;
}
#error 
{
	color:#F00;
}

</style>
<script language="javascript">
$(function(){
		   $('.change_pass').click(function(){
											$('.pswrdchange').hide();
											$('#change').show();
											});
		  });
</script>
<script language="javascript">
$(function (){			
		$("#register").validate({
		rules: {
			again: {
				equalTo: "#new"
			}
		},
		messages: {
			
			again: {
				equalTo: "Please enter the same password as above"
			
		}
		}
	});
			
});

</script>

<div class="h_left"><h2>Edit Your Login Credentials</h2></div>
<div class="seperator"></div>

<form action="<?php echo base_url();?>superadmin/edit_login" method="post" id="register">
<?php 
if($admin)
{
	$a = mysql_fetch_assoc($admin);
?>
<h3>Username :</h3>
<input type="text" name="ad_un" value="<?php echo $a['admin_username']?>" class="required">
<div class="margintopbot10 loginsettings">
<span class="pswrdchange">Password : <a href="javascript:void(0);" class="change_pass btn btn-info">Change password</a></span><span id="change">
<div class="tx">Old Password</div><div class="in"><input type="password" name="old" id="old"></div>
<div class="tx">New Password</div><div class="in"><input type="password" name="new" id="new"></div>
<div class="tx">Confirm Password</div><div class="in"><input type="password" name="again" id="again"></div>
</span>
</div>
<h3>First Email :</h3>
<input type="text" name="first_email" value="<?php echo $a['admin_email1']?>" class="required">
<h3>Second Email : </h3>
<input type="text" name="second_email" value="<?php echo $a['admin_email2']?>" class="required">
<div class="seperator"></div>
<input type="submit" value=" Update " class="btn btn-primary">


<?php } ?>
</form>
