<h3>Delete A Leave of Absence Request</h3>


	<?php
	if($info)
	{

		foreach($info as $item)
		{
			echo "<p> Are you sure you want to delete a LoA Request for pilot with ID:";
			echo $item->pilotid;
			echo "<br> ";
			echo "<input type='submit' name='submit' value='Yes' onClick=\"parent.location='".SITE_URL."/admin/index.php/loa/deleteloa?id=$item->pilotid'\"/>";
			echo "<input type='submit' name='submit' value='No' onClick=\"parent.location='".SITE_URL."/admin/index.php/loa/'\"/>";

		} 
	} else {
		echo 'There are no LoA requests with specified ID.';
	}

	?>
