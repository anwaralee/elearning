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
<h2>Account Settings</h2>
<div class="seperator"></div>
<form action="<?php echo base_url();?>trainer/update_settings" method="post" enctype="multipart/form-data" id="register">
  <?php if(isset($userDetail))
	{
		$data=mysql_fetch_assoc($userDetail);
		{
	?>
  <h3>First Name</h3>
  <input type='text' name='first' class="required" <?php if($data['firstname']){?>value="<?php echo  $data['firstname']?>"<?php }?>/>
  <h3>Last Name</h3>
  <input type='text' name='last'  <?php if($data['lastname']){?>value="<?php echo  $data['lastname']?>"<?php }?>/>
  
  <h3>Username</h3>
  <input type='text' name='user' class="required"  <?php if($data['username']){?>value="<?php echo  $data['username']?>"<?php }?> readonly="readonly"/>
  <font color="red">(username cannot be edited)</font>
  <table>
    </table>

      <h3>Password<font color="red">*&nbsp;</font></h3>


<input type="password" name="pass" class="required" id="pass"  <?php if($data['password']){?>value="<?php echo  $data['password']?>"<?php }?>/>
   
      <h3>Confirm Password<font color="red">*&nbsp;</font></h3>
      <input type="password" name="confpass" class="required" id="confpass"  <?php if($data['password']){?>value="<?php echo  $data['password']?>"<?php }?>/>


      <h3>Contact Number</h3>


<input type='text' name='contact'  <?php if($data['phone']){?>value="<?php echo  $data['phone']?>"<?php }?>/>

      <h3>Email<font color="red">*&nbsp;</font></h3>


      <input type='text' name='email' class="required"  <?php if($data['email']){?>value="<?php echo  $data['email'];?>"<?php }?>/>

<div class="seperator"></div>
<input type='submit' name='submit' value="Update" class="btn btn-primary"/>

    <?php } }?>

</form>