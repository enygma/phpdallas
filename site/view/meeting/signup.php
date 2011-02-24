<h2>Security Badge Signup</h2>
<p>
Because of the security in place at our meeting location at <a href="http://softlayer.com">SoftLayer</a>'s offices on Alpha,
it's required for all attendees to have a security badge to be in the building. To make things simpler (and to help the security guard not get mobbed by a mass of PHPers five minutes before the meeting, we have this form to sign up ahead of time.
</p>
<p>
Even if you're not completely sure you'll be at the meeting, go ahead and put your name on the list! We'd rather have more
badges than not enough!
</p>
<?php if($valid): ?>
	<h3>Thanks for your submission! Your name will be added to the list for the upcoming meeting!</h3>
<?php else:

if(!empty($failureMsg)){
	echo '<span class="error">Error! Invalid ';
	foreach($failureMsg as $fieldName => $msg){ $keys[]=str_replace('_',' ',$fieldName); }
	echo implode(', ',$keys).'</span><br/><br/>';
}
echo $this->html->form->open(); 
?>
<table cellpadding="3" cellspacing="0" border="0">
<tr>
	<td>Attending</td>
	<td><?php echo date('F Y',$dateString); ?></td>
</tr>
<tr>
	<td>Full Name:</td>
	<td><?php echo $this->html->form->text('full_name'); ?>
</tr>
<tr>
	<td>Email Address:</td>
	<td><?php echo $this->html->form->text('email'); ?>
</tr>
<tr>
	<td colspan="2" align="right">
		<?php echo $this->html->form->submit(); ?>
	</td>
</tr>
</table>
<?php 
echo $this->html->form->hidden('meeting_mo',$meeting_mo);
echo $this->html->form->hidden('meeting_yr',$meeting_yr);
?>
<?php echo $this->html->form->close(); ?>
<p>
All information gathered will be kept confiential.
</p>
<?php endif; ?>