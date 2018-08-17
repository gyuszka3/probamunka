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
	function insert_new($lang_code,$entity_type,$http_code,$action,$parts)
	{
		$full_url=$lang_code.".example.com";
		foreach ($parts as $ertek)
		{
			$full_url=$full_url."/".$ertek;
		}
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
?>