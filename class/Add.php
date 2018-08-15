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
		$array=[
			"languageCode" => $lang_code,
			"entityId" =>	0,
			"entityType" => $entity_type,
			"createdAt" => 20180101,
			"updatedAt" => "",
			"FullURL" => $full_url,
			"httpCode" => $http_code,
			"action" => $action,
			"parts" => $parts
		];
		parent::insert($array);
	}
}
?>