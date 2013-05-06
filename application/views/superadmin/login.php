<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Training Management System</title>

        <link href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" rel="stylesheet">
            <link href="<?php echo base_url(); ?>css/landing.css" type="text/css" rel="stylesheet">
                <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
                    <script src='<?php echo base_url(); ?>jquery.js' type="text/javascript"></script>
                    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
                    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

                    </head>
                    <body>
                        <div class='loginForm'>
                            <h2 align="center">Super Administrator Login</h2>
                            <div class="seperator"></div>
                            <div align="center">
                                 <?php
                                                if (isset($error)) {
                                                    echo "<center><font color='red'>" . $error . "</font></center>";
                                                }
                                                ?>
                                <form action= "<?php echo base_url(); ?>superadmin/verifyLogin" method="post">

                                    <ul>

                                        <li>
                                            <span class="floatCenter">Username</span><input type="text" name="un" class="floatCenter">
                                                <div class="clear"></div>
                                        </li>

                                        <li>
                                            <span class="floatCenter">Password</span><input type="password" name="pw" class="floatCenter">
                                                <div class="clear"></div>
                                        </li>
                                        
                                        <li>
                                            <input type="submit" value="Login" class="btn btn-success" style="margin-right:20px;"><a href="<?php echo base_url(); ?>login/forgot_login">Lost Your Password?</a> 

                                        </li>
                                    </ul>
                                </form>
                            </div>

                        </div>
                    </body>