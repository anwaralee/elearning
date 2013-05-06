<?php 
if($adminById)
{

?>
<div class="h_left"><h2>Edit Admin</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>admin/edit/<?php echo $adminById->admin_id;?>" method="post">

<h3>Admin FullName:</h3>
<input type="text" name="admin_fullname" value = "<?php echo $adminById->admin_fullname;?>">	
<h3>Admin Username:</h3>
<input type="text" name="admin_username" value = "<?php echo $adminById->admin_username;?>">
<h3>Admin Password:</h3>
<input type="password" name="admin_password" value = "<?php echo $adminById->admin_password;?>">
<h3>Admin Email 1:</h3>
<input type="text" name="admin_email1" value = "<?php echo $adminById->admin_email1;?>">
<h3>Admin Email 2:</h3>
<input type="text" name="admin_email2" value = "<?php echo $adminById->admin_email2;?>">
<h3>Contact Number:</h3>
<input type="text" name="admin_contact" value = "<?php echo $adminById->admin_contact;?>">

<h3>Branch:</h3>
<select name='branch_id'>
                    
                    <?php

                     foreach ($allBranches as $branch): 
                     	if($branch->branch_id == $adminById->branch_id){
                     		$selected = "selected";
                     	}
                     	else {
                     		$selected = "";
                     	} 
                     ?>

                        <option value="<?php echo $branch->branch_id; ?>" <?php echo $selected;?>><?php echo $branch->branch_name; ?></option>
                    <?php endforeach; ?>


                </select>

<div>Is Active : <input type="checkbox" name="active" <?php if($adminById->status == 1){ echo "checked = 'checked'";}?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes" class="btn btn-primary">

</form>
<?php 
}
?>