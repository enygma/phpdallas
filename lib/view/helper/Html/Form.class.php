<?php

class Form extends Html
{
	public function __construct()
	{
	}
	
	private function _buildAttributes($attributes)
	{
		$attributeList = array();
		foreach($attributes as $attributeName => $attributeValue){
			$attributeList[] = $attributeName.'="'.$attributeValue.'"';
		}
		return implode(" ",$attributeList);
	}

	private function input($type,$name,$value=null,$options=null)
	{
		$default = array(
			'type' => $type,
			'name' => $name
		);
		 // merge the options if there are some
                if($options){
                        $default = array_merge($default,$options);
                }
                return '<input '.$this->_buildAttributes($default).'>';
	}

	public function text($name,$value=null,$options=null)
	{
		$options = ($options!=null) ? array_merge(array('size'=>15),$options) : $options;
		return $this->input('text',$name,$value,$options);
	}	
	
	public function submit($name='submit',$value='submit',$options=null)
	{
		return $this->input('submit',$name,$value,$options);
	}

	public function textarea($name,$value=null,$options=null)
	{
		$defaults = array(
			'cols' => 15,
			'rows' => 10,
			'name' => $name
		);	
		if($options!=null){ $options = array_merge($defaults,$options); }else{ $options=$defaults; }
		return '<textarea '.$this->_buildAttributes($options).'></textarea>';
	}
}

?>
