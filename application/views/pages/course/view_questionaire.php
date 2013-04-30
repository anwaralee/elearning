<h2><?php echo $title;?></h2>
<div class="seperator"></div>
<?php
if($q != NULL)
{
	$i=1;?>
		<form action="<?php echo base_url();?>courses/submit/<?php echo $this->uri->segment(3);?>" method="post" id='quiz_frm'>
        <?php
	while($qu = mysql_fetch_assoc($q))
	{
		?>            
            <b><?php echo $i?>. <?php echo $qu['question'];?></b><br><br>
            <?php 
			if($qu['type'] == 'yn')
			{
				?>
                <input type="radio" name="a<?php echo $i;?>" value="yes"> Yes<br>
                <input type="radio" name="a<?php echo $i;?>" value="no"> No
                <?php
			}
			else
			if($qu['type'] == 'des')
			{
				?>
                <textarea name="a<?php echo $i;?>"></textarea>
                <?php
			}
			else
			if($qu['type'] == 'single')
			{
				if($qu['answer1'])
				echo "<input type='radio' name='a".$i."' value = '1'> ".$qu['answer1']."<br>";
				if($qu['answer2'])
				echo "<input type='radio' name='a".$i."' value = '2'> ".$qu['answer2']."<br>";
				if($qu['answer3'])
				echo "<input type='radio' name='a".$i."' value = '3'> ".$qu['answer3']."<br>";
				if($qu['answer4'])
				echo "<input type='radio' name='a".$i."' value = '4'> ".$qu['answer4']."<br>";
				if($qu['answer5'])
				echo "<input type='radio' name='a".$i."' value = '5'> ".$qu['answer5']."<br>";
				if($qu['answer6'])
				echo "<input type='radio' name='a".$i."' value = '6'> ".$qu['answer6']."<br>";
				if($qu['answer7'])
				echo "<input type='radio' name='a".$i."' value = '7'> ".$qu['answer7']."<br>";
				if($qu['answer8'])
				echo "<input type='radio' name='a".$i."' value = '8'> ".$qu['answer8']."<br>";
				if($qu['answer9'])
				echo "<input type='radio' name='a".$i."' value = '9'> ".$qu['answer9']."<br>";
				if($qu['answer10'])
				echo "<input type='radio' name='a".$i."' value = '10'> ".$qu['answer10']."<br>";
			}
			else
			if($qu['type'] == 'multiple')
			{
				if($qu['answer1'])
				echo "<input type='checkbox' name='a".$i."1' value = '".$qu['correct1']."'> ".$qu['answer1']."<br>";
				if($qu['answer2'])
				echo "<input type='checkbox' name='a".$i."2' value = '".$qu['correct2']."'> ".$qu['answer2']."<br>";
				if($qu['answer3'])
				echo "<input type='checkbox' name='a".$i."3' value = '".$qu['correct3']."'> ".$qu['answer3']."<br>";
				if($qu['answer4'])
				echo "<input type='checkbox' name='a".$i."4' value = '".$qu['correct4']."'> ".$qu['answer4']."<br>";
				if($qu['answer5'])
				echo "<input type='checkbox' name='a".$i."5' value = '".$qu['correct5']."'> ".$qu['answer5']."<br>";
				if($qu['answer6'])
				echo "<input type='checkbox' name='a".$i."6' value = '".$qu['correct6']."'> ".$qu['answer6']."<br>";
				if($qu['answer7'])
				echo "<input type='checkbox' name='a".$i."7' value = '".$qu['correct7']."'> ".$qu['answer7']."<br>";
				if($qu['answer8'])
				echo "<input type='checkbox' name='a".$i."8' value = '".$qu['correct8']."'> ".$qu['answer8']."<br>";
				if($qu['answer9'])
				echo "<input type='checkbox' name='a".$i."9' value = '".$qu['correct9']."'> ".$qu['answer9']."<br>";
				if($qu['answer10'])
				echo "<input type='checkbox' name='a".$i."10' value = '".$qu['correct10']."'> ".$qu['answer10']."<br>";
			}
			?>
            <?php
			$i++;
			echo "<hr>";
		}
		echo "<input type='submit' value='Completed'></form>";
}
else
echo "No content to display";
?>
