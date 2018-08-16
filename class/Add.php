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
	function insert_new($lang_code,$entity_type,$full_url,$http_code,$action)
	{
		$parts=explode("/",$full_url);
		array_shift($parts);
		$date=new MongoDB\BSON\UTCDateTime();
		$array=[
			"languageCode" => $lang_code,
			"entityId" =>	parent::get_entyityId($entity_type),
			"entityType" => $entity_type,
			"createdAt" => $date,
			"updatedAt" => $date,
			"FullURL" => $full_url,
			"httpCode" => intval($http_code),
			"action" => $action,
			"parts" => $parts
		];
		parent::insert($array);
	}
}
?>