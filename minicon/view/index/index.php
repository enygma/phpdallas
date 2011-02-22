
<h2 style="margin-bottom:2px;text-align:center">Dallas MiniCon</h2>

<p>
Interested in finding out more about the upcoming Dallas MiniCon PHP conference?
</p>
<p>
Enter your email address below and we'll send you the latest as news becomes available!
</p>
<center>
<?php
if(!empty($errors)){
	echo '<span class="error">Errors in these fields:<ul>';
	foreach($errors as $fieldName => $error){
		echo '<li>'.str_replace('_','',$fieldName);
	}
	echo '</ul></span>';
}

echo $this->html->form->open();
echo $this->html->form->text('email_address');
echo $this->html->form->submit();
echo $this->html->form->close();
?>

<span style="font-size:9px;">brought to you by DallasPHP</span></center>
