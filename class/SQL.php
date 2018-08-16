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
}
?>