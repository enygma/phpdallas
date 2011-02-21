<h2>Create User</h2>

<span class="validationErrors">Fail: <?php var_dump($validationErrors); ?></span>

<?php echo $this->html->form->open(); ?>
<table cellpadding="2" cellspacing="0" border="0">
<tr>
	<td>Username:</td>
	<td><?php echo $this->html->form->text('username'); ?></td>
</tr>
<tr>
	<td>Password:</td>
	<td><?php echo $this->html->form->password('password'); ?></td>
</tr>
<tr>
	<td>Full Name:</td>
	<td><?php echo $this->html->form->text('full_name'); ?></td>
</tr>
<tr>
	<td>Email:</td>
	<td><?php echo $this->html->form->text('email'); ?></td>
</tr>
<tr>
	<td colspan="2" align="right">
		<?php echo $this->html->form->submit(); ?>
	</td>
</tr>
</table>
<?php echo $this->html->form->close(); ?>