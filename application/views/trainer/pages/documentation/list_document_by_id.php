<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the document?");	
}
</script>
<div class="h_left"><h2>Document(s)</h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url(); ?>document_manager/add" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<?php if (!empty($documents)) { ?>
    <table width="90%">
        <tr>
            <th>S/N</th>
            <th>Title</th>
            <th>Lesson Name</th> 
            <th>Document Action</th>
            <th>Other Action</th>
        </tr>

        <?php
        if ($documents) {
            $i = 0;
            foreach ($documents as $document):
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class='c_right'><?php echo $document->doc_title; ?></td>
                    <td class='c_right'><?php echo $this->documentation_model->getLessonNameById($document->lesson_id)->lesson_name; ?></td>
                    <td class='action'>
                        <a href ="<?php echo base_url(); ?>documentation/view_document/<?php echo $document->doc_id; ?>" class='btn btn-primary'>View Details</a>
                        <?php  if ($document->doc_file != NULL) {?>
                         <a href ="<?php echo base_url(); ?>documentation/view_docs/<?php echo $document->doc_id; ?>" class='btn btn-danger'>View File</a>
                        <?php } else { ?>
                        <b> The document has no file</b>
                        <?php }?>
                          <?php  if ($document->doc_file != NULL && $document->isDownloadable==1) {?>
                         <a href ="<?php echo base_url(); ?>documentation/download/<?php echo $document->doc_id; ?>" class='btn btn-info'>Download File</a>
                        <?php } else { ?>
                        <b> The document has no file</b>
                        <?php }?>
                    </td>
                      <td class='action'>
                        <a href="<?php echo base_url(); ?>document_manager/delete_document/<?php echo $document->doc_id; ?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
                        <a href ="<?php echo base_url(); ?>document_manager/edit_document/<?php echo $document->doc_id; ?>" class='btn btn-info'>Edit</a>
                    </td>
                </tr>
            <?php endforeach; }?>
     
    </table>
    <?php } else { ?>
    <h3> No Documents found</h3>
    <?php } ?>
