<?php 
if($branchById)
{

?>
<div class="h_left"><h2>Edit Branch</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>branch/update_trainer_details/<?php echo $branchById->branch_id;?>" method="post">

<h3>Branch Name:</h3>
<input type="text" name="branch_name" value = "<?php echo $branchById->branch_name;?>" disabled/>

<h3>Trainer Details:</h3>
<textarea name="trainer_details"><?php echo $branchById->trainer_details;?></textarea>

<div class="seperator"></div>
<input type="submit" value=" Save Changes" class="btn btn-primary">

</form>
<?php 
}
?>