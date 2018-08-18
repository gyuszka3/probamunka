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
	function get_entityId($entity_id)
	{
		$result=$this->db->probamunka->find(["entityId" => intval($entity_id)]);
	
		return $result->toArray();
	}
	function get_id()
	{
		$result=$this->db->probamunka->find();

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
	function update_check($update_id)
	{
		$result=$this->db->probamunka->find(["_id" => new MongoDB\BSON\ObjectId($update_id)]);

		return $result->toArray();
	}
	function add_update($result,$target_url)
	{
		$date=new MongoDB\BSON\UTCDateTime();
		$array=[
			"languageCode" => $result[0]["languageCode"],
			"entityId" => $this->count_entyityId($result[0]["entityType"]),
			"entityType" => $result[0]["entityType"],
			"createdAt" => $date,
			"updatedAt" => $date,
			"fullUrl" => $result[0]["fullUrl"],
			"httpCode" => intval($result[0]["httpCode"]),
			"action" => $result[0]["action"],
			"parts" => $result[0]["parts"],
			"targetUrl" => $target_url
		];
		$this->db->probamunka->updateOne(["_id" => new MongoDB\BSON\ObjectId($result[0]["_id"])],['$set' => ['httpCode' => 301]]);
		$this->db->probamunka->insertOne($array);
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