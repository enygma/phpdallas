<h2>Login</h2>

<span class="validationErrors">Fail: <?php var_dump($validationErrors); ?></span>

<?php echo $this->html->form->open(); ?>
<table cellpadding="0" cellspacing="0" border="0">
<tr>
	<td>Username:</td>
	<td><?php echo $this->html->form->text('username'); ?></td>
</tr>
<tr>
	<td>Password:</td>
	<td><?php echo $this->html->form->password('password'); ?></td>
</tr>
<tr>
	<td colspan="2" align="right">
		<?php echo $this->html->form->submit(); ?>
	</td>
</tr>
</table>
<?php echo $this->html->form->close(); ?>