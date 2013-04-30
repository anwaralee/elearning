<?php 
$this->load->model('admin/user_model'); 
if(isset($user_edit)){echo "<font color='red'><b>".$user_edit."</b></font>";}
if($det)
{
$user = mysql_fetch_assoc($det);
?>
<div class="h_left"><h2>User details</h2></div>
<div class="seperator"></div>
<form method="post" action="<?php echo base_url().'user/active_user/'.$user['user_id'];?>">

<table width="80%">
<tr>
<td ><strong>Firstname:</strong></td><td><?php echo $user['first_name'];?></td>
</tr>
<tr>
<td ><strong>Middlename:</strong></td><td><?php if($user['middle_name'] =='') echo "No Middle Name Entered"; else echo $user['middle_name'];?></td>
</tr>
<tr>
<td ><strong>Lastname:</strong></td><td><?php if($user['last_name'] =='') echo "No Last Name Entered"; else echo $user['last_name'];?></td>
</tr>
<tr>
<td ><strong>Username:</strong></td><td><?php echo $user['username'];?></td>
</tr>
<tr>
<td><strong>Email:</strong></td><td><?php if($user['email'] =='') echo "No Email Entered"; else echo $user['email'];?></td>
</tr>
<tr>
<td ><strong>Contact Details:</strong></td><td><?php if($user['contact_number'] =='') echo "No Contact Details Entered"; else echo $user['contact_number'];?></td>
</tr>
<tr>
<td><strong>Gender:</strong> </td><td><?php echo $user['gender'];?></td>
</tr>
<tr>
<td><strong>Date Of Birth:</strong> </td><td><?php echo $user['dob_year'].' / '.$user['dob_month'].' / '.$user['dob_day'];?></td>
</tr>
<tr>
<td><strong>Country: </strong></td><td><?php if($user['country_id']){$country = $this->user_model->getCountry($user['country_id']); echo $country;}else{echo "Country Not Selected";}?></td>
</tr>
<tr>
<td ><strong>Image :</strong></td>
<td><img src="<?php echo base_url();?>images/users/<?php echo $user['image'];?>" height="250px" width="200px"></td>
</tr>
<tr>
<td><strong>City:</strong></td><td><?php if($user['city'] =='') echo "No City Entered"; else echo $user['city'];?></td>
</tr>
<?php 
	$province=$this->user_model->getProvince($user['province_id']);
?>
<tr>
<td><strong>Province: </strong></td><td><?php if($user['province_id'] == 0) echo "No Province Entered"; else echo $province['province_name'];?></td>
</tr>

<tr>
<td><strong>Postal Code:</strong> </td><td><?php if($user['postal_code'] =='') echo "No Postal Code Entered"; else echo $user['postal_code'];?></td>
</tr>
<tr>
<td><strong>Is Paid:</strong> </td><td><input type="radio" name="isPaid" value="1" <?php if($user['isPaid']==1){?> checked="checked"<?php }?> />Yes<input type="radio" name="isPaid" value="0" <?php if($user['isPaid']==0){?> checked="checked"<?php }?> />No</td>
</tr>

<tr>
<td><strong>Registered Date:</strong> </td><td><?php echo $user['registered_date'];?></td>
</tr>
<tr>
<td><strong>Is Active:</strong> </td><td><input type="checkbox" name="active" <?php if($user['status'] == 1){ echo "checked = 'checked'";}?>></td>
</tr>
</table>
<div class="seperator"></div>
<input type="submit" value="Update"  class="btn btn-primary"/>
<br /><br />

<!--<button onclick="history.go(-1);" class="btn">Go back</button> -->
</form>

<?php 
}
?>