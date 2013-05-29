<div class="h_left"><h2>Add new Admin</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>admin/add" method="post">
<h3>Admin FullName:</h3>
<input type="text" name="admin_fullname">	
<h3>Admin Username:</h3>
<input type="text" name="admin_username">
<h3>Admin Password:</h3>
<input type="password" name="admin_password">
<h3>Admin Email 1:</h3>
<input type="text" name="admin_email1">
<!--h3>Admin Email 2:</h3-->
<input type="hidden" name="admin_email2">
<h3>Contact Number:</h3>
<input type="text" name="admin_contact">

<h3>Branch:</h3>
<select name='branch_id'>
                    <option value="0">Select a Branch</option>
                    <?php foreach ($allBranches as $branch): ?>
                        <option value="<?php echo $branch->branch_id; ?>"><?php echo $branch->branch_name; ?></option>
                    <?php endforeach; ?>


                </select>

<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
