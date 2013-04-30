<?php
if(isset($f))
			{
			$file=mysql_fetch_assoc($f);
			$chk = $this->dashboard_model->check_quiz($file['course_id']);
                 echo "<h2>".$file['course_name'];
				 if($chk){
				 echo " (1/2)";
				 }
				 else echo " (1/1)";
				 echo "</h2>";
            $path = 'http://docs.google.com/viewer?url='.base_url().'course_content/'.$this->uri->segment(3).'&embedded=true';?>
            <iframe src='<?php echo $path;?>' style='width:800px;height:700px;' frameborder='0'></iframe>
            <br /><br /><br />
                    <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
            <?php
                 if($chk)
                {
                    ?>
                    <a href="<?php echo base_url()."quiz/attempt/".$file['course_id'];?>" class="btn btn-success">Next</a>
                    <?php
                }
				
				else
				{
					?>
                    <a href="<?php echo base_url()."next/success/".$file['course_id'];?>" class="btn btn-success">Next</a>
                    <?php	
				}
			}
?>
			
			