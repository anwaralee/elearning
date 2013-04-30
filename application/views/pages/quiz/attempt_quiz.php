<?php
 $check = $this->quiz_model->check_user_attempt();
 if($check){
?>
<script language="javascript">
var c = null
var time = null;
function startTime() {
//if(getCookie('timeLeft')){
//document.getElementById('timer').innerHTML=getCookie('timeLeft');
//}

	timerDisplay = document.getElementById('timer');

if((timerDisplay.innerHTML)=="0.00"){

time=getCookie('timeLeft').replace(':','.');

time = parseFloat(time);

}
else
{
	time = parseFloat(timerDisplay.innerHTML.replace(':','.'));

}



timerDisplay.innerHTML = time.toFixed(2).replace('.', ':');

	var c=setInterval(countdown, 1000);

}
function countdown() {
	if(time > 0.01) {
		time -= 0.01;
		if(time%1 > 0.59) time = Math.floor(time) + 0.59;
		timerDisplay.innerHTML = time.toFixed(2).replace('.', ':');

	} else 
{
clearInterval(c);
timerDisplay.innerHTML = "0:00";
document.forms['quiz_frm'].submit();
}

}
</script>
<?php }?>
<style>
#qoption{
		background-color:#ffffff;
		font: 15px/20px normal Helvetica, Arial, sans-serif;
		color: #222222;
		margin: 5px 0px 5px 0px;
	}
#qoption:hover{
		background-color:#eeeeee;
		font: 15px/20px normal Helvetica, Arial, sans-serif;
		color: #222222;
		margin: 5px 0px 5px 0px;
		}
#timers{
  position: fixed;
  right: 0;
  top: 10%;
  width: 200px;
  margin-top: -2.5em;
}
</style>
</head>
</head>
<body onLoad="startTime();">
<?php 
// getting minutes

//getting seconds
$seconds=0;
?>
<div id='timers' style="margin-top:4.5em;">
<table><tr><td>Time Left</td><td><div id="timer">
<?php echo $minute.":".$seconds;?>
</div>
</td><td>Minutes</td></tr></table>
</div>
<h2><?php if($course != NULL) echo $course." - Test (2/2)";?></h2>
<div class="seperator"></div>
<?php
if($quiz != NULL)
{
	$this->load->model('admin/quiz_model');
	if($this->quiz_model->check_user_attempt())
	{
		$i=1;?>
		<form action="<?php echo base_url();?>quiz/submit/<?php echo $this->uri->segment(3);?>" method="post" id='quiz_frm'>
        <?php
		while($q = mysql_fetch_assoc($quiz))
		{
			?>            
            <b><?php echo $i?>. <?php echo $q['question'];?></b><br><br>
            <?php 
			if($q['type'] == 'yn')
			{
				?>
                <input type="radio" name="a<?php echo $i;?>" value="yes"> Yes<br>
                <input type="radio" name="a<?php echo $i;?>" value="no"> No
                <?php
			}
			else
			if($q['type'] == 'des')
			{
				?>
                <textarea name="a<?php echo $i;?>"></textarea>
                <?php
			}
			else
			if($q['type'] == 'single')
			{
				if($q['answer1'])
				echo "<input type='radio' name='a".$i."' value = '1'> ".$q['answer1']."<br>";
				if($q['answer2'])
				echo "<input type='radio' name='a".$i."' value = '2'> ".$q['answer2']."<br>";
				if($q['answer3'])
				echo "<input type='radio' name='a".$i."' value = '3'> ".$q['answer3']."<br>";
				if($q['answer4'])
				echo "<input type='radio' name='a".$i."' value = '4'> ".$q['answer4']."<br>";
				if($q['answer5'])
				echo "<input type='radio' name='a".$i."' value = '5'> ".$q['answer5']."<br>";
				if($q['answer6'])
				echo "<input type='radio' name='a".$i."' value = '6'> ".$q['answer6']."<br>";
				if($q['answer7'])
				echo "<input type='radio' name='a".$i."' value = '7'> ".$q['answer7']."<br>";
				if($q['answer8'])
				echo "<input type='radio' name='a".$i."' value = '8'> ".$q['answer8']."<br>";
				if($q['answer9'])
				echo "<input type='radio' name='a".$i."' value = '9'> ".$q['answer9']."<br>";
				if($q['answer10'])
				echo "<input type='radio' name='a".$i."' value = '10'> ".$q['answer10']."<br>";
			}
			else
			if($q['type'] == 'multiple')
			{
				if($q['answer1'])
				echo "<input type='checkbox' name='a".$i."1' value = '".$q['correct1']."'> ".$q['answer1']."<br>";
				if($q['answer2'])
				echo "<input type='checkbox' name='a".$i."2' value = '".$q['correct2']."'> ".$q['answer2']."<br>";
				if($q['answer3'])
				echo "<input type='checkbox' name='a".$i."3' value = '".$q['correct3']."'> ".$q['answer3']."<br>";
				if($q['answer4'])
				echo "<input type='checkbox' name='a".$i."4' value = '".$q['correct4']."'> ".$q['answer4']."<br>";
				if($q['answer5'])
				echo "<input type='checkbox' name='a".$i."5' value = '".$q['correct5']."'> ".$q['answer5']."<br>";
				if($q['answer6'])
				echo "<input type='checkbox' name='a".$i."6' value = '".$q['correct6']."'> ".$q['answer6']."<br>";
				if($q['answer7'])
				echo "<input type='checkbox' name='a".$i."7' value = '".$q['correct7']."'> ".$q['answer7']."<br>";
				if($q['answer8'])
				echo "<input type='checkbox' name='a".$i."8' value = '".$q['correct8']."'> ".$q['answer8']."<br>";
				if($q['answer9'])
				echo "<input type='checkbox' name='a".$i."9' value = '".$q['correct9']."'> ".$q['answer9']."<br>";
				if($q['answer10'])
				echo "<input type='checkbox' name='a".$i."10' value = '".$q['correct10']."'> ".$q['answer10']."<br>";
			}
			?>
            <?php
			$i++;
			echo "<hr>";
		}
		echo "<input type='submit' value='Completed'></form>";
	   ?>
        <?php
	}
	else
    {
	echo "You have already attempted this test";
    ?>
    <div class="seperator"></div>
    <br><button onclick="javascript:history.go(-1);" class="btn">Go back</button>
    <div class="seperator"></div>
    <?php
    }
}
else
{
	echo "Test not available";
}
?>