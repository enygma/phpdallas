<div style="float:left;width:400px">
<h3>Welcome</h3>
<p>
Lone Star PHP is a one-day conference dedicated to bringing you quality PHP-related content from a wide range of speakers. Planning is still going on around the schedule for the event. More details will be posted as soon as we have them.
</p>
<p>
<h3>Important Dates:</h3>
<table cellpadding="3" cellspacing="0" border="0" width="100%" style="border:1px solid #000000;background-color:#EEEEEE">
<tr>
	<td> ??? </td>
	<td>Tickets go on sale</td>
</tr>
<tr>
	<td> ??? </td>
	<td>Last Day to Purchase Tickets Online</td>
</tr>
</table>
</p>
<h3>Get the Latest News</h3>
<p>
If you're interested in the conference and want updates as soon as any new news is released, please leave us your email address and we'll drop you a line when there's something new!
</p>
<p>
<?php if(isset($msg)): ?>
<div class="output-msg"><?php echo $msg; ?></div><br/>
<?php endif; ?>

<?php if(!empty($err)){
	echo '<div class="output-err">';
	$output = '<b>Errors in the following field(s):</b> ';
	foreach($err as $field => $error_msg){
		$output.= str_replace('_',' ',$field).',';
	}
	echo substr($output,0,strlen($output)-1).'</div>';
}

echo $this->html->form->open();
?>

<b>Email:</b> <?php echo $this->html->form->text('email',$posted['email']);  ?>
<?php echo $this->html->form->submit(); 
$this->html->form->close();
?>
</p>
</div>


<div style="float:right;width:200px;border:1px solid #CCCCCC;margin-top:10px;padding:4px">
<p>
<b>Where:</b><br/> Plano Civic Center, Plano Tx
<br/><br/>
<b>When:</b><br/> Saturday, June 11th from 8am - 5pm
</br><br/>
<b>Price:</b><br/> $50 for the full day (<a href="/register">more</a>)
<br/><br/>
<b>Contact:</b><br/> <a href="mailto:info@phpdallas.org">info@phpdallas.org</a>
</p>
<p>
<a href="http://twitter.com/lonestarphp"><img src="/assets/img/lonestarphp/twitter_share_icon.gif" border="0" /></a>
</p>
</div>
