<h2>Add Meeting</h2>

<?php echo $this->html->form->open(); ?>
<table cellpadding="3" cellspacing="0" border="0">
<tr>
	<td>Meetup Name:</td>
	<td><?php echo $this->html->form->text('meetup_name',null,array('size'=>40)); ?></td>
</tr>
<tr>
	<td>Speaker:</td>
	<td><?php echo $this->html->form->text('meetup_speaker',null,array('size'=>40)); ?></td>
</tr>
<tr>
	<td valign="top">Description:</td>
	<td><?php echo $this->html->form->textarea('meetup_desc',null,array('cols'=>50,'rows'=>10)); ?></td>
</tr>
<tr>
	<td>Meetup.com Link</td>
	<td><?php echo $this->html->form->text('meetup_link',null,array('size'=>40)); ?></td>
</tr>
<tr>
	<td>Date of Event</td>
	<td>
		<?php echo $this->html->form->multiDateSelect('meetup_date'); ?> @ 
		<?php echo $this->html->form->multiTimeSelect('meetup_time'); ?>
	</td>
</tr>
<tr>
	<td colspan="2" align="right"><?php echo $this->html->form->submit(); ?></td>
</tr>
</table>
<?php echo $this->html->form->close(); ?>