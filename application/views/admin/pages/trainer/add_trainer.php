<script language="javascript">
$(function (){			
		$("#register").validate({
		rules: {
			confpass: {
				required: true,
				equalTo: "#pass"
			}
		},
		messages: {
			
			confpass: {
				required: "Please provide a password",
				equalTo: "Please enter the same password as above"
			
		}
		}
	});
			
});

</script>
<?php echo "<font color='red'>".validation_errors()."</font>"; ?>
<h2>Add new trainer</h2>
<div class="seperator"></div>
<form action="<?php echo base_url();?>trainers/add" method="post" enctype="multipart/form-data" id="register">
  
  <h3>First Name</h3>
  <input type='text' name='first' class="required"/>
  <h3>Last Name</h3>
  <input type='text' name='last' />
  
  <h3>Username</h3>
  <input type='text' name='user' class="required" />
      <h3>Password<font color="red">*&nbsp;</font></h3>


<input type="password" name="pass" class="required" id="pass"/>
   
      <h3>Confirm Password<font color="red">*&nbsp;</font></h3>
      <input type="password" name="confpass" class="required" id="confpass" />
      <h3>Contact Number</h3>
<input type='text' name='contact'/>
      <h3>Email<font color="red">*&nbsp;</font></h3>
      <input type='text' name='email' class="required" />
      <h3>isActive</h3>
<input type='checkbox' name='active'/>

<div class="seperator"></div>
<input type='submit' name='submit' value="Add" class="btn btn-primary"/>
</form>