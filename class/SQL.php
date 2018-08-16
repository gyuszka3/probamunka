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
	function get_entyityId($entityType)
	{
		$result=$this->db->probamunka->find(["entityType" => $entityType]);
		$index=0;
		foreach ($result as $key)
		{
			$index++;
		}

		return $index;
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
}
?>