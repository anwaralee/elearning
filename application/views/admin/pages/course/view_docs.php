<?php
if(isset($f))
			{
			$file=mysql_fetch_assoc($f);
            $path = 'http://docs.google.com/viewer?url='.base_url().'course_content/'.$this->uri->segment(3).'&embedded=true';?>
            <iframe src='<?php echo $path;?>' style='width:800px;height:700px;' frameborder='0'></iframe>
            <br /><br /><br />
                    <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
            <?php 
			}
?>