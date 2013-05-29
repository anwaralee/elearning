<?php
if(isset($course_content))
			{
				if($course_content)
				{
					$c=mysql_fetch_assoc($course_content);
				?>
                <iframe width="853" height="480" src="<?php echo $c['course_file']; ?>" frameborder="0" allowfullscreen></iframe>
                 <br /><br /> <button onclick="javascript:history.go(-1);" class="btn">Go back</button>
                <?php
			}}
?>