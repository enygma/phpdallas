<?php

//echo '<pre>'; var_dump($eventDetail); echo '</pre>';

$byTime = array();

foreach($eventDetail->session_detail->session as $session){

	$byTime[(string)$session->session_start][]=$session;

}

$byTime['08:00'] = array('internalType'=>'sessionBreak','desc'=>'Registration');
$byTime['12:00'] = array('internalType'=>'sessionBreak','desc'=>'Lunch (Provided)');
$byTime['17:30'] = array('internalType'=>'sessionBreak','desc'=>'After-Party');

ksort($byTime);
?>

<table border="1">
	<thead>
		<tr>
			<th></th>
			<th>Track 1</th>
			<th>Track 2</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($byTime as $time => $currentSessions): 
	if(isset($currentSessions['internalType'])): ?>
		<tr class="sessionBreak">
			<td><?php echo $time; ?></td>
			<td colspan="2"><br/><?php echo $currentSessions['desc']?><br/><br/></td>
		</tr>	
	<?php else: ?>
	<tr>
		<td><?php echo $time; ?></td>
		<?php foreach($currentSessions as $session): ?>
			<td>
				<a name="<?php echo str_replace(' ','-',strtolower($session->speaker->name)); ?>"></a>
				<h4><?php echo $session->title; ?> <i><?php echo $session->speaker->name; ?></i></h4>
				<?php echo $session->description; ?>
			</td>	
		<?php endforeach; ?>
	</tr>

	<?php endif; endforeach; ?>
	</tbody>
</table>
