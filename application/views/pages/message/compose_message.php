<script type="text/javascript">
      function selectReciever(){


         var selectedRec = $("#select_reciever").find(':selected').attr('value');
    
        $.ajax({
            type: "GET",
            url: "getUsersByType/"+selectedRec,
            data: "",
            success: function(msg){
                $("#users_list").html(msg);
            }
            


        });
          
    }
  </script>
<div class="h_left"><h2>Compose a new Message</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url(); ?>message/send_message" method="post">
    <h3>To:</h3>
    <select name="select_reciever" id="select_reciever" onchange="selectReciever()">
        <option value="0">Select Reciever</option>
        <option value="1">Admin</option>
        <option value="2">Trainer</option>
        <option value="3">Users</option>
    </select>
    <select id="users_list">
        <option value="0">Select a User</option>
    </select>
    <h3>Subject:</h3>
    <textarea name="subject"></textarea>
    <h3>Message:</h3>
    <textarea name="message"></textarea>

    <input type="submit" value=" Add " class="btn btn-primary">
</form>
