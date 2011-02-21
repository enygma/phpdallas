<?php

class Html extends ViewHelper
{
	public $form = null;

	public function __construct()
	{
		//nothing to see here
		$this->form = new FormHelper();
	}

	public function link($text,$link)
	{
		echo '<a href="'.$link.'">'.$text.'</a>';
	}
}

?>
