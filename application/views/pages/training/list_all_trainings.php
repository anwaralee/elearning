<script type="text/javascript">
    function show_confirm()
    {
        return confirm("Are you sure you want to remove the course?");	
    }

</script>

<div class="h_left"><h2>Avaliable Work Experience Sessions</h2></div>
<h4>Opting for Pay and Enroll will redirect you to the PAYPAL payment method. You can also book an appointment and pay using cash/cheque</h4>
<div class="seperator"></div>

<table width="90%">
    <tr>
        <th>S/N</th>
        <th>Course</th>
        <th>Session</th>
        <th>Start Date</th>
        <th>Trainer</th>
        <th>Action</th>
    </tr>



    <?php
    if ($allTrainings) {
        $i = 0;
        foreach ($allTrainings as $training):
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class='c_right'><?php echo $this->trainee_model->getCourseNameById($training->course_id)->course_name; ?></td>
                <td class='c_right'><?php echo $training->session_name; ?></td>
                <td class='c_right'>
                    <?php
                    $trainingDate = $this->trainee_model->getStartDate($training->session_id)->training_date;
                    echo $trainingDate;
                    $dateString = "%Y-%m-%d";
                    $time = time();
                    $today = mdate($dateString, $time);

                    if (strtotime($trainingDate) < strtotime($today)) {
                        $trainingStatus = 0;
                    } else {
                        $trainingStatus = 1;
                    }
                    ?>
                </td>
                <td class='c_right'><?php echo $this->trainee_model->getTrainerNameByCourse($training->course_id)->firstname . " " . $this->trainee_model->getTrainerNameByCourse($training->course_id)->lastname; ?></td>
                <td class='action'>
                    <?php if ($trainingStatus == 1) { ?>
                        <a href ="<?php echo base_url(); ?>enroll/payFee/<?php echo $training->training_id ?>" class='btn btn-info'>Pay and Enroll</a>
                        <a href="<?php echo base_url();?>appointment/enroll/<?php echo $training->training_id ?>" class="btn btn-primary">Book an Appointment</a>
                    <?php } else if ($trainingStatus == 0) { ?>
                        <input disabled class='btn btn-info' value="Session Already Started"/>
                    <?php } else if ($training->status == 2) { ?>
                        <a href ="<?php echo base_url(); ?>course/edit_course/<?php echo $training->session_id; ?>" class='btn btn-info'>Go To Class Archive</a>
                    <?php } ?>

                </td>
            </tr>
            <?php
        endforeach;
    }
    ?>

</table>