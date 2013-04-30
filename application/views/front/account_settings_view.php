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
<form action="<?php echo base_url();?>dashboard/update_settings" method="post" enctype="multipart/form-data" id="register">
  <?php if(isset($userDetail))
	{
		$data=mysql_fetch_assoc($userDetail);
		{
	?>
  <h3>First Name</h3>
  <input type='text' name='first' class="required" <?php if($data['first_name']){?>value="<?php echo  $data['first_name']?>"<?php }?>/>
  <h3>Middle Name</h3>
  <input type='text' name='middle'  <?php if($data['middle_name']){?>value="<?php echo  $data['middle_name']?>"<?php }?> />
  <h3>Last Name</h3>
  <input type='text' name='last'  <?php if($data['last_name']){?>value="<?php echo  $data['last_name']?>"<?php }?>/>
  <h3>Image</h3>
  <?php if(!empty($data['image'])){?>
  <img src="<?php echo base_url().'images/users/'.$data['image'];?>" height="150px" width="100px" />
  <?php } ?>
  <input type='file' name='image'/>
  <h3>DOB </h3>
  <?php 
	$days = range (1, 31);
	 $mm=array(
			   'January'=>'Jan',
			   'February'=>'Feb',
			   'March'=>'Mar',
			   'April'=>'Apr',
			   'May'=>'May',
			   'June'=>'Jun',
			   'July'=>'Jul',
			   'August'=>'Aug',
			   'September'=>'Sep',
			   'October'=>'Oct',
			   'November'=>'Nov',
			   'December'=>'Dec'
			   );
	 $years = range (1930, 2015);
	 echo " <select name='dd' style='width:60px;'>";
	 foreach ($days as $value) {
	 if(isset($dob_day)){
	 if($dob_day)
	 if($value==$dob_day)
	 	echo '<option value="'.$value.'" selected="selected">'.$value.'</option>\n';
	 }
	 else
		 {
		 echo '<option value="'.$value.'">'.$value.'</option>\n';}
		 } 
	echo '</select>';
	 //For month
	 echo " <select name='mm' style='width:60px;'>";
	 foreach ($mm as $value) {
	 if(isset($dob_month)){
	 if($dob_month)
	 if($value==$dob_month)
	 	echo '<option value="'.$value.'" selected="selected">'.$value.'</option>\n';
	 }
	 else
		 {
		 echo '<option value="'.$value.'">'.$value.'</option>\n';}
		 } 
	echo '</select>';
	 /*if(isset($dob_month)){
	 if($dob_month)
	 echo form_dropdown('mm',$mm,$dob_month);
	 }
	 else
	 echo form_dropdown('mm',$mm);*/
	 
	//For year 
	echo "<select name='yyyy' style='width:60px;'>";
	foreach ($years as $value) {
	if(isset($dob_year)){
	 if($dob_year)
	 if($value==$dob_year)
	 echo '<option value="'.$value.'" selected="selected">'.$value.'</option>\n';
	 }
	 else
	echo '<option value="'.$value.'">'.$value.'</option>\n';
	}
	echo '</select>';
	?>
  
  <h3>Username</h3>
  <input type='text' name='user' class="required"  <?php if($data['username']){?>value="<?php echo  $data['username']?>"<?php }?> readonly="readonly"/>
  <font color="red">(username cannot be edited)</font>
  <table>
    </table>

      <h3>Password<font color="red">*&nbsp;</font></h3>


<input type="password" name="pass" class="required" id="pass"  <?php if($data['password']){?>value="<?php echo  $data['password']?>"<?php }?>/>
   
      <h3>Confirm Password<font color="red">*&nbsp;</font></h3>
      <input type="password" name="confpass" class="required" id="confpass"  <?php if($data['password']){?>value="<?php echo  $data['password']?>"<?php }?>/>


      <h3>Gender</h3>


      <input type='radio' name='gender' value="male" <?php if($data['gender']=='male'){?>checked='checked'<?php }?> class="required"/>
        Male
        <input type="radio" name="gender" value="female" <?php if($data['gender']=='female'){?>checked='checked'<?php }?> class="required"/>
        Female


      <h3>Contact Number</h3>


<input type='text' name='contact'  <?php if($data['contact_number']){?>value="<?php echo  $data['contact_number']?>"<?php }?>/>


      <h3>City/Town</h3>


<input type='text' name='city'  <?php if($data['city']){?>value="<?php echo  $data['city']?>"<?php }?>/>


      <h3>Province/State</h3>


<input type='text' name='province'  <?php if($data['province_id']){?>value="<?php echo  $data['province_id']?>"<?php }?>/>


      <h3>Postal Code/Zip Code</h3>


<input type='text' name='postal'  <?php if($data['postal_code']){?>value="<?php echo  $data['postal_code']?>"<?php }?>/>


      <h3>Email<font color="red">*&nbsp;</font></h3>


      <input type='text' name='email' class="required"  <?php if($data['email']){?>value="<?php echo  $data['email'];?>"<?php }?>/>

    

            <h3>Country</h3>


                <select name="country">
                <?php
                    
                    $country=$this->login_model->getCountry();
                    while($co=mysql_fetch_assoc($country))
                    {
                        $countries= $co['countryName'];
                        echo "<option value='".$countries."'>".$countries."</option>";
                    }
                    ?>
                </select>
<div class="seperator"></div>
<input type='submit' name='submit' value="Update" class="btn btn-primary"/>

    <?php } }?>

</form>
