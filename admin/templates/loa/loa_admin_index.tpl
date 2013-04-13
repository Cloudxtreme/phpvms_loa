<h3>Leave of Absence Admin</h3>
<?php echo $error ?>
<?php 
if ($all_leaves)
{
	?>
<table id="grid"></table>
<div id="pager"></div>
<table id="tabledlist" class="tablesorter">
<thead>
<tr>
	<th>Pilot ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Start Date</th>
	<th>End date</th>
	<th>Reason</th>
	<th>View</th>
	
	<th>Delete</th>
</tr>
</thead>
<tbody>

<?php
foreach($all_leaves as $item)
{

	
?>
<tr>
	<td width="1%" nowrap><a href="<?php echo SITE_URL?>/admin/index.php/pilotadmin/viewpilots?action=viewoptions&pilotid=<?php echo $item->pilotid?>"><?php echo $item->pilotid ?></td>
	<td><?php echo $item->firstname ?> </td>
	<td><?php echo $item->lastname ?> </td>
	<td><?php echo date(DATE_FORMAT, $item->start) ?>
	</td>
	<td><?php echo date(DATE_FORMAT,$item->end) ?></td>
	<td><?php echo $item->reason?></td>
	<td><input type="submit" name="submit" value="View"onClick="parent.location='<?php echo SITE_URL?>/admin/index.php/loa/viewloa?id=<?php echo $item->pilotid?>'"/></td>
	
	<td><input type="submit" name="submit" value="Delete" onClick="parent.location='<?php echo SITE_URL?>/admin/index.php/loa/confirmdeleteloa?id=<?php echo $item->pilotid?>'"/></td>

<?php
}
}else{
	echo 'There are no LoA requests.';
}
?>
</tbody>
</table>
