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


                                     
                                            <h1>Thank you your booking an appointment date with us. </h1>
                                            


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

