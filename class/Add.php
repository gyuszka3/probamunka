<?php
require 'SQL.php';
/**
 * 
 */
class Add extends SQL
{
	
	function __construct()
	{
		parent::__construct();
	}
	function insert_new($hostname,$lang_code,$entity_type,$http_code,$action,$parts)
	{
		$full_url=$lang_code.".".$hostname;
		foreach ($parts as $ertek)
		{
			$full_url=$full_url."/".$ertek;
		}
		if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬öüóőúéáűíÖÜÓŐÚÉÁŰÍ]/', $full_url))
		{
			$date=new MongoDB\BSON\UTCDateTime();
			$array=[
				"languageCode" => $lang_code,
				"entityId" =>	parent::count_entyityId($entity_type),
				"entityType" => $entity_type,
				"createdAt" => $date,
				"updatedAt" => $date,
				"fullUrl" => $full_url,
				"httpCode" => intval($http_code),
				"action" => $action,
				"parts" => $parts
			];
			parent::insert($array);
		}
	}
}
?>