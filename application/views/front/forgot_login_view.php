<script language='javascript'>
  $(document).ready(function(){
    $("#register").validate();
	});
</script>
<h1>Forgot Your Password?</h1>
 <div class="seperator"></div>
<form method="post" action="<?php echo base_url();?>login/login_forgot" id="register">
	<label for="email">Enter your email address:</label>
    <input type="text" name="email" id="email" class="required"/>
    <div class="seperator"></div>
    <input type="submit" value="Submit" class="btn btn-primary"/>
</form>