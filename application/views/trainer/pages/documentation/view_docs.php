<?php
if(isset($f))
			{
			$file=mysql_fetch_assoc($f);
                 echo "<h2>".$file['doc_title'];
				 echo "</h2>";
            $path = 'http://docs.google.com/viewer?url='.base_url().'docs/'.$file['doc_file'].'&embedded=true';?>
            <iframe src='<?php echo $path;?>' style='width:800px;height:700px;' frameborder='0'></iframe>
            <br /><br /><br />
                    <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
            <?php
			}
?>