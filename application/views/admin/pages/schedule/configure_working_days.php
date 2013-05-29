<style type="text/css">
	.day_span{font-family: sans-serif; font-size: large}
</style>
<div class="h_left"><h2>Configure Working Days</h2></div>
<div class="seperator"></div>
<h3>Days</h3>
<form action="<?php echo base_url();?>schedule/add_working_days" method="post">
<table border="0">
	<tr>
		<th>Day</th>
		<th>Select Active Days</th>
	</tr>
	<tr>
		<td>Sunday</td>
		<td><input type="checkbox" name="day_1" <?php echo ($selectedDays->day_sun==1) ? "checked" : ""?>/></td>
	</tr>
	<tr>
		<td>Monday</td>
		<td><input type="checkbox" name="day_2" <?php echo ($selectedDays->day_mon==1)? "checked" : ""?> /></td>
	</tr>
	<tr>
		<td>Tuesday</td>
		<td><input type="checkbox" name="day_3" <?php echo ($selectedDays->day_tue==1)? "checked" : ""?>/></td>
	</tr>
	<tr>
		<td>Wednesday</td>
		<td><input type="checkbox" name="day_4" <?php echo ($selectedDays->day_wed==1)? "checked" : ""?>/></td>
	</tr>
	<tr>
		<td>Thursday</td>
		<td><input type="checkbox" name="day_5" <?php echo ($selectedDays->day_thu==1)? "checked" : ""?>/></td>
	</tr>
	<tr>
		<td>Friday</td>
		<td><input type="checkbox" name="day_6" <?php echo ($selectedDays->day_fri==1)? "checked" : ""?> /></td>
	</tr>
	<tr>
		<td>Saturday</td>
		<td><input type="checkbox" name="day_7" <?php echo ($selectedDays->day_sat==1)? "checked" : ""?>/></td>
	</tr>

</table>
<div class="add_new"><input type="submit"/></div>
</form>