<?php

class FormHelper extends Html
{
	public function __construct()
	{
	}
	
	/**
	 * Given an array, builds out the HTML attributes version
	 *
	 * @param array $attributes Attributes array
	 * @return string HTML attributes
	 */
	private function _buildAttributes($attributes)
	{
		$attributeList = array();
		foreach($attributes as $attributeName => $attributeValue){
			$attributeList[] = $attributeName.'="'.$attributeValue.'"';
		}
		return implode(" ",$attributeList);
	}

	/**
	 * Return opening form tag
	 *
	 * @param string $action Form action
	 * @param string $type Form type
	 *
	 * @return string Form open tag string
	 */
	public function open($action=null,$type=null)
	{
		if($action==null){
			$action = '/'.implode('/',Configure::getConfigValue('parseUri'));
		}
		return '<form action="'.$action.'" method="POST">';
	}

	/**
	 * Return form closing tag string
	 *
	 * @return string Form close tag string
	 */
	public function close()
	{
		return '</form>';
	}

	/**
	 * Generic "input" tag handler (since many form tags are input types)
	 *
	 * @param string $type Type attribute (ex. "input" or "password")
	 * @param string $name Name attribute
	 * @param string $value[optional] Value attribute
	 * @param array $options[optional] Additional options
	 *
	 * @return string HTML input tag string
	 */
	private function input($type,$name,$value=null,$options=null,$label=null)
	{
		$default = array(
			'type' => $type,
			'name' => $name,
			'value'=> $value
		);
		 // merge the options if there are some
		if($options){
			$default = array_merge($default,$options);
		}
		$html='<input '.$this->_buildAttributes($default).'>';
		if($label){ $html.=' '.$label; }
		return $html;
	}
	
	public function select($name,$values,$options=null)
	{
		$html = '<select name="'.$name.'">';
		foreach($values as $index => $value){
			$html .= '<option value="'.$value.'">'.$value.'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
	public function checkbox($name,$values,$options=null)
	{
		$html='';
		foreach($values as $value => $label){
			$html.=$this->input('checkbox',$name.'[]',$value,$options,$label).'<br/>';
		}
		return $html;
	}

	/**
	 * Generate input type="text" tag
	 *
	 * @param string $name Name attribute
	 * @param string $value[optional] Value attribute
	 * @param array $options[optional] Additional parameters
	 *
	 * @return string Input tag string
	 */
	public function text($name,$value=null,$options=null)
	{
		$options = ($options!=null) ? array_merge(array('size'=>15),$options) : $options;
		return $this->input('text',$name,$value,$options);
	}
	
	public function password($name,$value=null,$options=null)
	{
		$options = ($options!=null) ? array_merge(array('size'=>15),$options) : $options;
		return $this->input('password',$name,$value,$options);
	}
	
	public function hidden($name,$value=null,$options=null)
	{
		return $this->input('hidden',$name,$value,$options);
	}
	
	/**
         * Generate input type="submit" tag
         *
         * @param string $name Name attribute
         * @param string $value[optional] Value attribute
         * @param array $options[optional] Additional parameters
         *
         * @return string Input tag string
         */
	public function submit($name='submit',$value='submit',$options=null)
	{
		return $this->input('submit',$name,$value,$options);
	}

	/**
         * Generate textarea tag string
         *
         * @param string $name Name attribute
         * @param string $value[optional] Value attribute
         * @param array $options[optional] Additional parameters
         *
         * @return string Input tag string
         */
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
	
	public function multiDateSelect($name,$mo=null,$day=null,$yr=null)
	{	
		return 
			$this->select($name.'_mo',range(1,12)).
			$this->select($name.'_day',range(1,31)).
			$this->select($name.'_yr',range(date('Y'),date('Y')+10));
	}
	
	public function multiTimeSelect($name,$hr=null,$min=null,$sec=null)
	{
		return
			$this->select($name.'_hr',range(0,23)).
			$this->select($name.'_min',range(0,59)).
			$this->select($name.'_sec',range(0,59));
	}
}

?>
