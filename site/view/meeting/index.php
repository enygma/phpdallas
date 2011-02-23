<h2>Meetings</h2>

<?php foreach($meetings as $index => $meeting): 
$date_block_bg = ($meeting['meeting_date']>time()) ? '#001ECB;color:#FFFFFF' : '#CCCCCC;color:#000000';
?>

<table cellpadding="5" cellspacing="0" border="0">
<tr>
	<td rowspan="4" style="background-color:<?php echo $date_block_bg?>;width:50px;vertical-align:top;text-align:right;font-size:15px"><?php echo date('M d, Y',$meeting['meeting_date']); ?>
	<td style="font-size:14px;font-weight:bold"><?php echo $meeting['title'] ?></td>
</tr>
<tr>
	<td><?php echo $meeting['speaker'] ?></td>
</tr>
<tr>
	<td><?php echo nl2br($meeting['detail']) ?></td>
</tr>
<tr>
	<td><a href="<?php echo $meeting['meetup_link'] ?>"><?php echo $meeting['meetup_link'] ?></a>
</tr>
</table>
<br/><br/>
<?php endforeach; ?>