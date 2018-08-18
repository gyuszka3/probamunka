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
	function update($update_id,$module_id,$module_type,$lang_code,$action,$full_url)
	{
		$result=parent::update_check($update_id);
		if($result[0]["moduleId"]==$module_id && $result[0]["moduleType"]==$module_type && $result[0]["languageCode"]==$lang_code && $result[0]["action"]==$action && $result[0]["fullUrl"]==$full_url)
		{
			echo "nem frissül";
			return $result;
		}
		else
		{
			parent::add_update($result,$full_url);
		}
	}
	function list()
	{
		$result=parent::get_id();
		$data =[];
        foreach ($result as $value) 
        {
            array_push($data, $value["_id"]);
        }
        return $data;
	}

}
?>