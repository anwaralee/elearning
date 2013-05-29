<?php 
if($batchById)
{

?>
<div class="h_left"><h2>Edit Batch</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>batch/edit/<?php echo $batchById->batch_id;?>" method="post">

<h3>Batch Name:</h3>
<input type="text" name="batch_name" value = "<?php echo $batchById->batch_name;?>">
<h3>Description:</h3>
<textarea name="batch_desc"><?php echo $batchById->batch_description;?></textarea>

<div>Is Active : <input type="checkbox" name="active" <?php if($batchById->status == 1){ echo "checked = 'checked'";}?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes" class="btn btn-primary">

</form>
<?php 
}
?>