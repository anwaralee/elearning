<div class="h_left"><h2>Course Booked</h2></div>
<h4>The course you choose has been booked successfully. Please pay the amount after appointment in order to activate your course.</h4>
<div class="seperator"></div>
<h3>Appointment Details Here</h3>

<table>
    <tr>
        <td>Appointment Date</td>
        <td><?php echo $appDetails->appointment_date;?></td>
    </tr>
    <tr>
        <td>Appointment Time</td>
        <td><?php echo $this->trainee_model->getAppointmentTimeById($appDetails->timeslot_id)->start_time." to ".
        $this->trainee_model->getAppointmentTimeById($appDetails->timeslot_id)->end_time;?></td>
    </tr>
    <tr>
        <td>Appointment With</td>
        <td><?php $admin = $this->trainee_model->getAdminName($appDetails->branch_id);
            echo $admin->admin_fullname;
        ?></td>
    </tr>
</table>


