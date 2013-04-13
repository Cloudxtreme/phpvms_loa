<h3>View A Leave of Absence Request</h3>


<?php
if ($info)
{
	foreach($info as $item)
	{
	echo '<p>You are viewing the Leave of Absence Request for pilot'. "<b> " . $item->firstname . "  " . $item->lastname . "</b>  ". 'with <b>ID' . " " .$item->pilotid . "</b><br>";
	echo 'The pilot\'s leave started on the following date:<b>' . " " . date(DATE_FORMAT,$item->start) . "</b><br>";
	echo 'The pilot\'s leave will end on the following date:<b>' . " " . date(DATE_FORMAT,$item->end) . "</b><br></p>";
	echo 'The pilot has specified the following reason for submitting the LoA request:<br><p>';
	echo '<b>'.$item->reason . "</b></p>";
	
	echo "<input type='submit' name='submit' value='Delete' onClick=\"parent.location='".SITE_URL."/admin/index.php/loa/confirmdeleteloa?id=$item->pilotid'\"/>";



}
}else {

	echo 'There are no LoA request for the specified pilot ID. Sorry. :(';
}

