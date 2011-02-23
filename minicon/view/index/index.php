
<h2 style="margin-bottom:2px;text-align:center">Dallas MiniCon</h2>

<?php if($success): ?>

<p>
Thank you for your interest in the DallasPHP MiniCon conference. We're working hard
to set up a great event for the entire web development community in the Dallas/Ft. Worth
area.
</p>
<p>
We're still looking for volunteers and speakers to help out with the event, so if you'd like
to give some of your time, let us know at <a href="mailto:info@phpdallas.org">info@phpdallas.org</a>.
</p>

<?php else: ?>
<p>
Interested in finding out more about the upcoming Dallas MiniCon PHP conference?
</p>
<p>
Enter your email address below and we'll send you the latest as news becomes available!
</p>
<center>
<?php
if(!empty($errors)){
	echo '<span class="error">Error! Invalid ';
	foreach($errors as $fieldName => $msg){ $keys[]=str_replace('_',' ',$fieldName); }
	echo implode(', ',$keys).'</span><br/><br/>';
}
?>
<?php echo $this->html->form->open(); ?>
<table cellpadding="4" cellspacing="0" border="0">
<tr>
	<td>Email Address:</td>
	<td><?php echo $this->html->form->text('email_address',$posted['email_address']); ?></td>
</tr>
<tr>
	<td>Name:</td>
	<td><?php echo $this->html->form->text('full_name',$posted['full_name']); ?></td>
</tr>
<tr>
	<td valign="top">Ways to get involved:</td>
	<td style="font-size:11px">
	<?php echo $this->html->form->checkbox('involvement',array(
		'speak' 	=> "I'd like to speak at the event",
		'volunteer' => "I'd like to volunteer to help at the event",
		'planning'	=> "I'd like to help with the event planning",
		'sponsor'	=> "I'd like more information on sponsoring the event"
	)); ?>
	</td>
</tr>
<tr>
	<td colspan="2" align="right"><?php echo $this->html->form->submit(); ?></td>
</tr>
</table>
<?php 
echo $this->html->form->close();
endif;
?>

<span style="font-size:10px;">
brought to you by DallasPHP :: <a href="mailto:info@phpdallas.org">info@phpdallas.org</a><br/><br/>
join us in <b>#dallasphp</b> on the <a href="http://freenode.net">freenode</a> IRC network - <a href="http://webchat.freenode.net/?channels=dallasphp">webchat</a>!
</span>

</center>
