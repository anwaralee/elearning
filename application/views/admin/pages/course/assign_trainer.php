<script type="text/javascript">
    function show_confirm()
    {
        return confirm("Are you sure you want to remove the course?");	
    }
    function selectBatch(){
    
 
        var selectedBatch = $("#selectBatch").find(':selected').attr('value');
    
        $.ajax({
            type: "GET",
            url: "getCourseByBatchTrainer/"+selectedBatch,
            data: "",
            success: function(msg){
                $("#tableList").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#tableList").html(xhr.responseText);
                alert(thrownError);
            }


        });
    
    }
</script>
<div class="h_left"><h2>Course - Trainer </h2></div>
<div class="seperator"></div>

<div class="add_new">
    <label>Select Batch:</label><select name="batch_id" id="selectBatch" onchange="selectBatch()">
         <option value="-1">Select a batch to proceed</option>
        <option value="0">All</option>
        <?php foreach ($allBatches as $batch): ?>
            <option value="<?php echo $batch->batch_id; ?>"><?php echo $batch->batch_name; ?></option>
        <?php endforeach; ?>
    </select></div>

<div id="tableList">
   
</div>