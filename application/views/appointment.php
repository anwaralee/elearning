<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Training Management System</title>

        <link href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/landing.css" type="text/css" rel="stylesheet">
                <link href="<?php echo base_url(); ?>js/jsDatePick_ltr.min.css" type="text/css" rel="stylesheet"/>
                <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
                    <script src='<?php echo base_url(); ?>jquery.js' type="text/javascript"></script>
                    <script src='<?php echo base_url(); ?>js/jsDatePick.jquery.min.1.3.js' type="text/javascript"></script>
                    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
                    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
                    <script language='javascript'>
                        $(document).ready(function(){
                            $("#register").validate();
                            $('#appnt_btn').click(function() {
                                $('#collapse_appnt').show();
                            }); 
                        });
                        
                    </script>
                    <script>
                        $(function() {
                            new JsDatePick({
                                useMode:2,
                                target:"datepicker"
                            });
                        });
                    </script>
                    </head>
                    <body>

                        <div class="header">
                        </div><!--header-->
                        <div class="seperator"></div>
                        <div class="wrapper">
                            <div class="loginWrap">

                                <div class=" floatLeft texts">

                                </div>      





                                <!--textss-->

                                <div class="form">
                                    <div class="loginForm appointmentForm " id="loginDivForm">


                                        <form action= "<?php echo base_url(); ?>login/verify" method="post">
                                            <h1>Thank for your interest in one of our Work Experience Courses </h1>
                                            <h3>Please book your appointment with one of your consultant who would be happy to give you more details. </h3>
                                            <ul>
                                                <hr/>

                                                <li>
                                                    <span class ="floatLeft">First Name:</span><input type="text" name="firstname" class="floatLeft"/>
                                                    <div class="clear"></div>
                                                </li>

                                                <li>
                                                    <span class="floatLeft">Sur Name:</span><input type="text" name="surname" class="floatLeft"/>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <span class="floatLeft">Phone No:</span><input type="text" name="phoneno" class="floatLeft"/>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <span class="floatLeft">Branch:</span class="floatLeft">
                                                    <select name='branch_id' class="floatLeft">
                                                        <option value="0">Select a Branch</option>
                                                        <?php foreach ($allBranches as $branch): ?>
                                                            <option value="<?php echo $branch->branch_id; ?>"><?php echo $branch->branch_name; ?></option>
                                                        <?php endforeach; ?>


                                                    </select>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <span class="floatLeft">Choose Appointment Date:</span><input  id="datepicker" class="floatLeft" type="text" name="appointment_date"/>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <span class="floatLeft">Choose Avaliable Time Slot:</span>
                                                    <select name='branch_id' class="floatLeft">
                                                        <option value="0">Select Time Slot</option>

                                                        <option value="1">7:30 AM to 8:30 AM</option>
                                                        <option value="1">8:30 AM to 9:30 AM</option>
                                                        <option value="1">9:30 AM to 10:30 AM</option>
                                                        <option value="1">11:30 AM to 12:30 AM</option>
                                                        <option value="1">12:30 AM to 1:30 PM</option>

                                                    </select>
                                                    <div class="clear"></div>
                                                </li>
                                                <li>
                                                    <span class="floatLeft">Any Specific Requirements:</span> <textarea  class="floatLeft" name="specific_requirements"></textarea> 
                                                    <div class="clear"></div>
                                                </li>

                                                <li>
                                                    <hr />
                                                    <input type="submit" value="Submit" class="btn btn-success" style="margin-right:20px;"/>
                                                    <a href="<?php echo base_url(); ?>/login" class="btn btn-primary">Login (if you are already an member)</a> 
                                                    <br />
                                                    <hr />


                                                </li>
                                            </ul>
                                        </form>


                                    </div>


                                </div>
                                <!--
                                
                                <div class="appointment_today texts" align="center"> 
                                    <div id="main_appnt_btn">
                                        <input type='button' id="appnt_btn" name='submit' value="Book An Appointment Today" class="btn btn-primary" onclick="$('#collapse_appnt').show();"/>
                                        <br/><br/>
                                        <div id="collapse_appnt" style="display: none;">

                                        <input type='button' name='submit' value="Book Appointment Now" class="btn btn-success"/>
                                        <p style="font-family: sans-serif;font-size: xx-small">(If you are new to us Please book an appointment's to see one of our experienced Work Experience consultant today)</p>
                                        <br/>

                                        <a href="#loginDivForm"><input type='button' name='submit' value="If you are already an member click to log in" class="btn btn-inverse"/></a>
                                        <br/><br/>  <br/><br/>
                                    </div>

                                </div>  
                                <div class="clear"></div>
                            </div><!--loginWrap-->

                            </div><!--wrapper-->


                            <div class="footer">
                                Training Management System - Copyright © LITTLE MORE IT
                            </div>

