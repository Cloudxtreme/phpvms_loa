<p>
<h2>Leave of Absence Request</h2>
Welcome to the Leave of Absence Request Form. <br>
Before submitting a Leave of Absence Request, please read our LoA policy in the Policy And Operations Manual. 
</p>
<p>

Your Information: <Br/>
<table border="0px" bordercolor="transparent" style="background-color:none"  cellpadding="3" cellspacing="3">
	<tr>
		<td><strong>Name</strong></td>
		<td><?php echo Auth::$userinfo->firstname;  ?><td>
	</tr>
	<tr>
		<td><strong>Surname</strong></td>
		<td><?php echo Auth::$userinfo->lastname;  ?><td>
	</tr>
	<tr>
		<td><strong>Email</strong></td>
		<td><?php echo Auth::$userinfo->email;  ?><td>
	</tr>
	<tr>
		<td><strong>Pilot ID</strong></td>
		<td><?php echo PilotData::GetPilotCode(Auth::$userinfo->code, Auth::$userinfo->pilotid) ?> <td>
	</tr>
</table>
</p>
<p>
LoA Information: <br/>
The LoA starts on the date the form is submitted and ends on the user selected date provided that the date the leave ob absence is not longer than <?php echo $leave_duration; ?> days. After that time you will agian be subjected to the inactivity policy. <br>
<hr />


<table border="0px" bordercolor="transparent" style="background-color:none"  cellpadding="3" cellspacing="3">
	<form method="post" action="<?php echo url('/loa/submit');?>">
	
		<td><strong>Start Date: </strong></td>
		<td><?php echo date("Y-m-d"); ?><td>
	</tr>
	<tr>
		<td><strong>End Date: </strong></td>
		<td>
			<select name="month">
			<option value='1'>January</option>
			<option value='2'>February</option>
			<option value='3'>March</option>
			<option value='4'>April</option>
			<option value='5'>May</option>
			<option value='6'>June</option>
			<option value='7'>July</option>
			<option value='8'>August</option>
			<option value='9'>September</option>
			<option value='10'>October</option>
			<option value='11'>November</option>
			<option value='12'>December</option>
			</select>
		<select name="day">
			<?php for($i = 1; $i <=31; $i++) {
				echo "<option value='$i'>$i</option>";
			}?>

</select>
<select name='year'>

		<?php $year = date('Y');
			  $year_end = $year + 5;
			 	
				 for($i = $year ; $i < $year_end; $i++) {
				echo "<option value='$i'>$i</option>";
			}?>

	</select>


	</tr>
	<tr>
		<td><strong>Reason: </strong></td>
		<td><textarea name="reason" cols="25" rows="5"></textarea><br></td>
	</tr>
	<tr>
		<td><input type="submit" value="Submit!"/></td>
		
		</tr></table>


</form>


</p>
&copy <?php echo  date(Y) ?> Sava Markovic - All rights reserved 


