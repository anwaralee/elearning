<div class="h_left"><h2>Enrollment For 
            <?php echo $this->trainee_model->getCourseNameById($traineeDetails->course_id)->course_name;?> 
            (Session: <?php echo $this->trainee_model->getSessionNameById($this->uri->segment('3'))->session_name;?>)
    </h2>
</div>
<div class="seperator"></div>
<form action="<?php echo base_url(); ?>trainee/enroll_trainee" method="post">
    <h3>First Name:</h3>
    <input disabled type="text" name="first_name" value="<?php echo $traineeDetails->first_name;?>"/>

    <h3>Sur Name:</h3>
    <input disabled type="text" name="last_name" value="<?php echo $traineeDetails->last_name;?>"/>

    <h3>Email:</h3>
    <input disabled type="text" name="email" value="<?php echo $traineeDetails->email;?>"/>

    <h3>Country:</h3>
    <select name="country">
                <?php
                    
                    $country=$this->login_model->getCountry();
                    while($co=mysql_fetch_assoc($country))
                    {
                        $countries= $co['countryName'];
                        echo "<option value='".$countries."'>".$countries."</option>";
                    }
                    ?>
   </select>

    <h3>Address:</h3>
    <input type="text" name="address"/>

    <h3>Gender:</h3>
    <input type='radio' name='gender' value="male" class="required"/>
    Male
    <input type="radio" name="gender" value="female" class="required"/>
    Female

    <h3>DOB </h3>
    <?php
    $days = range(1, 31);
    $mm = array(
        'January' => 'Jan',
        'February' => 'Feb',
        'March' => 'Mar',
        'April' => 'Apr',
        'May' => 'May',
        'June' => 'Jun',
        'July' => 'Jul',
        'August' => 'Aug',
        'September' => 'Sep',
        'October' => 'Oct',
        'November' => 'Nov',
        'December' => 'Dec'
    );
    $years = range(1930, 2030);
    echo " <select name='dd' style='width:60px;'>";
    foreach ($days as $value) {


        echo '<option value="' . $value . '">' . $value . '</option>\n';
    }
    echo '</select>';
    //For month
    echo " <select name='mm' style='width:60px;'>";
    foreach ($mm as $value) {

        echo '<option value="' . $value . '">' . $value . '</option>\n';
    }
    echo '</select>';
    /* if(isset($dob_month)){
      if($dob_month)
      echo form_dropdown('mm',$mm,$dob_month);
      }
      else
      echo form_dropdown('mm',$mm); */

    //For year 
    echo "<select name='yyyy' style='width:60px;'>";
    foreach ($years as $value) {
                   echo '<option value="' . $value . '">' . $value . '</option>\n';
    }
    echo '</select>';
    ?>
    <br/>

    <input type="submit" value="Enroll and Pay" class="btn btn-primary"/>
    <a href="<?php echo base_url();?>appointment/enroll" class="btn btn-primary">Book an Appointment</a>
</form>
