
<h2>Suggest a Topic</h2>
<p>
You can use the form below to suggest a topic you'd like to hear about at an upcoming DallasPHP meeting. If you 
see a topic you're interested in speaking about <a href="mailto:info@phpdallas.org">let us know</a> and we'll
be in touch!
</p>
<?php echo $this->html->form->open(); ?>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
	<td class="form-title">Topic title</td>
	<td><?php echo $this->html->form->text('topic_title'); ?></td>
</tr>
<tr>
	<td class="form-title">Topic Summary</td>
	<td><?php 
		$options = array('cols'=>30,'rows'=>15);
		echo $this->html->form->textarea('topic_summary',null,$options); 
	?></td>
</tr>
<tr>
	<td colspan="2" align="right">
		<?php echo $this->html->form->submit('sub','Submit Suggestion') ?>
	</td>
</tr>
</table>
<?php echo $this->html->form->close(); ?>
