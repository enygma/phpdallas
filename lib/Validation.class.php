<?php

class Validation
{
	private $_validationRules = array();
	private $_failureMessages = array();

	public function __construct()
	{
		///nothing to see here
	}

	public function setValidation($ruleset)
	{
		$filter = new Filter();

		// rule format: string|numeric
		if(!is_array($ruleset)){ $ruleset = array($ruleset); }
		foreach($ruleset as $fieldName => $rule){
			$ruleChecks = explode('|',$rule);
			$this->_validationRules[$fieldName]=$ruleChecks;	
		}
	}
	public function validate($userInput)
	{
		$status = true;

		// run through the rules and validate
		foreach($userInput as $fieldName => $data){
			if(isset($this->_validationRules[$fieldName])){
				foreach($this->_validationRules[$fieldName] as $rule){
					$method = '_validate'.ucwords(strtoupper($rule));
					if(method_exists($this,$method)){
						$result = $this->$method($data);
					}else{
						echo 'validation method for "'.$rule.'" does not exist';
					}
				}	
			}else{
				$status = false;
			}
		}
		return $status;
	}

	//------------------
	private function _validateString($data)
	{
		return (gettype($data)=='string') ? true : false;
	}
	private function _validateNumeric($data)
	{
		return is_numeric($data);
	}
	private function _validateEmail($data)
	{
		$filter = new Filter();
		return $filter->filter($data,'email');
	}

}

?>
