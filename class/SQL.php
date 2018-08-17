<?php
require 'Database.php';
/**
 * 
 */
class SQL extends Database
{
	function __construct()
	{
		parent::__construct();
	}
	function insert($array)
	{
		$this->db->probamunka->insertOne($array);
	}
	function count_entyityId($entityType)
	{
		$result=$this->db->probamunka->find(["entityType" => $entityType]);
		$index=0;
		foreach ($result as $key)
		{
			$index++;
		}

		return $index;
	}
	function get_entityId($entityType)
	{
		$result=$this->db->probamunka->find(["entityType" => $entityType]);
	
		return $result->toArray();
	}
	function delete_old()
	{
		$date=new MongoDB\BSON\UTCDateTime();
		$date=$date->toDateTime();
		$date=$date->format(date("Y-m-d H:i:s",strtotime("-3 day")));
		$res=$this->db->probamunka->find();
		foreach ($res as $key => $value ) 
		{
			$old_date=$value["updatedAt"]->toDateTime();
			$old_date=$old_date->format("Y-m-d H:i:s");
			if($date>$old_date && $value["httpCode"] == 301)
			{
				$this->db->probamunka->findOneAndDelete(["_id" => $value["_id"]]);
			}
		}
	}
	function update_check($module_id,$module_type,$lang_code,$action,$full_url)
	{
		$result=$this->db->probamunka->find(["moduleId" => $module_id,"moduleType" => $module_type,"languageCode" => $lang_code,"action" => $action,"fullUrl" => $full_url]);

		return $result;
	}
	function add_update($result)
	{
		print_r($result);
		//$this->db->probamunka->updateOne(["_id"] =>)
	}
	function resolve_find($full_url,$http_code,$sorting)
	{
		$result=$this->db->probamunka->find(["fullUrl" => $full_url,"httpCode" => $http_code],["sort" => ["createdAt" => $sorting]]);
		foreach ($result as $value) 
		{
			return $value;
		}
	}

}
?>