<?php
/**
 * 
 */
class Update extends SQL
{
	
	function __construct()
	{
		parent::__construct();
	}
	function update($module_id,$module_type,$lang_code,$action,$full_url)
	{
		$result=parent::update_check($module_id,$module_type,$lang_code,$action,$full_url);
		if($result)
		{
			return $result;
		}
		else
		{
			add_update($result);
		}
	}

}
?>