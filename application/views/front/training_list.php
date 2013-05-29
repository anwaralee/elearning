<?php if(!empty($trainingsByCourse)){ ?>
<?php foreach($trainingsByCourse as $training):?>

   <option value="<?php echo $training->training_id; ?>"><?php echo $training->training_date;?></option>
<?php endforeach; ?>
<?php } else {?>
<option>No Trainings Avalaible</option>
<?php }?>
  