<?php if(!empty($trainingsByCourse)){ ?>
<?php foreach($trainingsByCourse as $training):?>

   <option value="<?php echo $training->session_id; ?>"><?php echo $training->session_name." (".$this->login_model->getStartDate($training->session_id)->training_date.")";?></option>
<?php endforeach; ?>
<?php } else {?>
<option>No Trainings Avalaible</option>
<?php }?>
  