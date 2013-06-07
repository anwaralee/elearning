<script src='<?php echo base_url(); ?>jquery.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>js/jsDatePick.jquery.min.1.3.js' type="text/javascript"></script> 
 <link href="<?php echo base_url(); ?>js/jsDatePick_ltr.min.css" type="text/css" rel="stylesheet"/>
<script language='javascript'>
    
    $(function() {
            new JsDatePick({
                useMode:2,
                target:"datepicker",
                dateFormat:"%Y-%m-%d"
                                
            });
        });
        
           function getTimeSlots(){

     
                            var selectedBranch = $("#select_branch").find(':selected').attr('value');
                            var selectedDate = $("#datepicker").attr('value');
                            alert(selectedDate);
                            $.ajax({
                                type: "GET",
                                url: "<?php echo base_url(); ?>appointment/getTimeSlots/"+selectedBranch+"/"+selectedDate,
                                data: "",
                                success: function(msg){
                      
                                    $('#timeslot_list').html(msg);
                                }

                            });
          
                        }
                        
        
        
       
    </script>
   
<div class="h_left"><h2>Book An Appointment for a course</h2></div>    
<div class="seperator"></div>

<form action= "<?php echo base_url(); ?>appointment/bookSession" method="post">

    <h4>First Name:</h4>
    <input type="text" value="<?php echo $user->first_name; ?>" disabled/>
    <input type="hidden" name="firstname" value="<?php echo $user->first_name; ?>"/>
    
    <h4>Sur Name:</h4>
    <input type="text"  value="<?php echo $user->last_name; ?>" disabled/>
    <input type="hidden" name="lastname" value="<?php echo $user->last_name; ?>"/>
   
    <h4>Phone No:</h4>
    <input type="text" value="<?php echo $user->contact_number; ?>" disabled/>
    <input type="hidden" name="contact" value="<?php echo $user->contact_number; ?>"/>
 
    <h4>Email Address:</h4>
    <input type="text"  value="<?php echo $user->email; ?>" disabled/>
    <input type="hidden" name="email" value="<?php echo $user->email; ?>"/>  

    <h4>Choose Appointment Date:</h4>
    <input id="datepicker" type="text" name="appointment_date"/>
    
    <h4>Branch:</h4>
    <select id="select_branch" name="branch_id" onchange="getTimeSlots();">
        <option value=""> Select Branch</option>
        <option value="<?php echo $user->branch_id;?>"><?php echo $this->appointment_model->getBranchNameById($user->branch_id)->branch_name;?></option>
    </select>
    
    <input type="hidden" name="training_id" value="<?php echo $this->uri->segment('3');?>"/>
    
   
    
    <h4>Choose Avaliable Time Slot:</h4>
    <select name='timeslot_id' id="timeslot_list">
        <option value="0">Select Date First</option>


    </select>
    <div class="clear"></div>


    <h4>Any Specific Requirements:</h4>
    <textarea name="specific_requirements"></textarea> 
  

    <hr />
    <input type="submit" value="Submit" class="btn btn-success" style="margin-right:20px;"/>

    <br />
    <hr />




</form>


