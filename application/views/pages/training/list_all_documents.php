<div class="h_left"><h2>Document</h2></div>
<div class="seperator"></div>

<?php if (!empty($allDocs)) { ?>
    <table width="90%">
        <tr>
            <th>S/N</th>
            <th>Title</th>
            <th>Document Action</th>
      </tr>

        <?php
        if ($allDocs) {
            $i = 0;
            foreach ($allDocs as $document):
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class='c_right'><?php echo $document->doc_title; ?></td>
                    <td class='action'>
                       
                        <?php if ($document->doc_file != NULL) { ?>
                            <a href ="<?php echo base_url(); ?>trainee/view_docs/<?php echo $document->doc_id; ?>" class='btn btn-danger'>View File</a>
                        <?php } else { echo $document->doc_file;?>
                            <b> The document has no file</b>
                        <?php } ?>
                        <?php if ($document->doc_file != NULL && $document->isDownloadable == 1) { ?>
                            <a href ="<?php echo base_url(); ?>trainee/download/<?php echo $document->doc_id; ?>" class='btn btn-info'>Download File</a>
                        <?php } else { ?>
                            <b> The document has no file</b>
                        <?php } ?>
                    </td>
                   
                </tr>
            <?php endforeach;
        } ?>

    </table>
<?php } else { ?>
    <h3> No Documents found</h3>
<?php } ?>
