<?php
if(isset($course_content))
			{
				if($course_content)
				{
				    $c = mysql_fetch_assoc($course_content);
					$chk = $this->dashboard_model->check_quiz($c['course_id']);
                 echo "<h2>".$c['course_name'];
				 if($chk){
				 echo " (1/2)";
				 }
				 else echo " (1/1)";
				 echo "</h2>";
				?>
                
                <iframe width="853" height="480" src="<?php echo $c['course_file']; ?>" frameborder="0" allowfullscreen></iframe>
                <br /><br /> <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
               <?php
                $check = $this->dashboard_model->check_quiz($c['course_id']);
                 if($check)
                {
                    ?>
                    <a href="<?php echo base_url()."quiz/attempt/".$c['course_id'];?>" class="btn btn-success">Next</a>
                    <?php
                }
				
				else
				{
					?>
                    <a href="<?php echo base_url()."next/success/".$c['course_id'];?>" class="btn btn-success">Next</a>
                    <!--<a href="<?php /*echo base_url()."next/lesson/".$c['course_id'].'/'.$c['cat_id'];*/?>" class="btn btn-success">Next</a>-->
                    <?php	
				}
			}}
?>