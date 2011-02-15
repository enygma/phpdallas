<?php

class Html extends ViewHelper
{
	public function __construct()
	{
		//nothing to see here
	}

	public function link($text,$link)
	{
		echo '<a href="'.$link.'">'.$text.'</a>';
	}
}

?>
