<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the document?");	
}
</script>
<div class="h_left"><h2>Document(s)</h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url(); ?>document_manager/add" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<?php if (!empty($assignments)) { ?>
    <table width="90%">
        <tr>
            <th>S/N</th>
            <th>Lesson Name</th> 
            <th>Document Action</th>
        </tr>

        <?php
        if ($assignments) {
            $i = 0;
            foreach ($assignments as $assignment):
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                   
                    <td class='c_right'><?php echo $this->assignment_model->getLessonNameById($assignment->lesson_id)->lesson_name;?></td>
                    <td class='action'>
                        
                        <?php  if ($assignment->doc_file != NULL) {?>
                         <a href ="<?php echo base_url(); ?>documentation/view_assignments/<?php echo $assignment->assign_id; ?>" class='btn btn-danger'>View File</a>
                        <?php } else { ?>
                        <b> The document has no file</b>
                        <?php }?>
                          <?php  if ($assignment->doc_file != NULL) {?>
                         <a href ="<?php echo base_url(); ?>documentation/download_assignments/<?php echo $assignment->assign_id; ?>" class='btn btn-info'>Download File</a>
                        <?php } else { ?>
                        <b> The document has no file</b>
                        <?php }?>
                    </td>
                     
                </tr>
            <?php endforeach; }?>
     
    </table>
    <?php } else { ?>
    <h3> No Documents found</h3>
    <?php } ?>
